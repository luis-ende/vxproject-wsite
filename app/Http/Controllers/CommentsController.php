<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use RyanChandler\Comments\Models\Comment;

class CommentsController extends Controller
{
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
                                ->comment($request->input('comment'), null, $parent);
            DB::table('guest_comments')->insert([
                'id_comment' => $comment->id,
                'guest_name' => $request->input('nombre'),
            ]);

            Carbon::setlocale(config('app.locale'));
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
}
