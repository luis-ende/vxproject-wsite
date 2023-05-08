<?php

namespace App\Http\Controllers;

use App\Http\Traits\AuthenticateWithAccessTokenTrait;
use App\Mail\ArticuloComentarioNotificacion;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use RyanChandler\Comments\Models\Comment;

class CommentsController extends Controller
{
    use AuthenticateWithAccessTokenTrait;

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'post_id' => 'required|int',
                'parent_comment' => 'nullable|int',
                'nombre' => 'required|string|max:100',
                'comment' => 'required',
            ]);

            $parent = $request->input('parent_comment') ? Comment::find($request->input('parent_comment')) : null;
            $comment = Post::findOrFail($request->input('post_id'))
                                ->comment($request->input('comment'), null, $parent, $request->input('nombre'));

            Carbon::setlocale(config('app.locale'));

            $this->sendMailNotification(
                array_merge(
                    $request->only('comment_id', 'post_id', 'parent_comment', 'nombre', 'comment'),
                    ['comment_id' => $comment->id]
                )
            );

            return response()->json([
                'id' => $comment->id,
                'parent_comment' => $request->input('parent_comment'),
                'guest_name' => $request->input('nombre'),
                'content' => $comment->content,
                'created_at' => Carbon::parse($comment->created_at)
                                        ->translatedFormat('F d, Y'),
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    public function review(Request $request)
    {
        $token = $request->input('token');
        $comment = Comment::find($request->only('comment_id'))->first();
        //$guest_comment = DB::table('guest_comments')->select('guest_name', 'published')->where('id_comment', 18)->first();
        $post = null;
        if ($comment) {
            $post = $comment->commentable;
        }

        return view('pages.comment-review', compact('comment', 'post', 'token'));
    }

    public function commentApproval(Request $request)
    {
        $this->validate($request, [
            'access_token' => 'required|string',
            'comment_id' => 'required|int',
            'action' => 'required|int',
        ]);

        if ($this->authWithAccessToken($request)) {
            $action = (int) $request->input('action');
            if ($action === 1) {
                Comment::where('id', $request->input('comment_id'))
                    ->update(['published' => true]);


                return redirect()->back()->with('success', 'Comentario publicado.');
            } else if ($action === 2) {
                Comment::where('id', $request->input('comment_id'))
                    ->delete();

                return redirect()->back()->with('error', 'Comentario eliminado.');
            } else {
                return redirect()->back()->with('error', 'Acción inválida.');
            }
        } else {
            return redirect()->back()->with('error', 'Usuario no autorizado.');
        }
    }

    private function sendMailNotification(array $commentInfo): void
    {
        try {
            $commentInfo['articulo'] = Post::firstWhere('id', $commentInfo['post_id'])->value('title');
        } catch (\Exception $e) {
            $commentInfo['articulo'] = 'Artículo no encontrado.';
        }

        $commentInfo['url_review'] = url(
            route('comment.review', [
                'access_token' => env('VXPROJECT_ADMIN_AUTH_TOKEN'),
                'comment_id' => $commentInfo['comment_id'],
            ], false)
        );

        $mailable = new ArticuloComentarioNotificacion($commentInfo);

        Mail::to(env('VXPROJECT_EMAIL_CONTACTO'))->send($mailable);
    }
}
