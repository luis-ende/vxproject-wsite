<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

class PostController extends Controller
{
    public function blogPostShow(string $postSlug)
    {
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $post_content = Cache::rememberForever($post->post_template, function() use($post) {
            $config = [];
            $environment = new Environment($config);
            $environment->addExtension(new CommonMarkCoreExtension());
            $environment->addExtension(new AttributesExtension());

            $converter = new MarkdownConverter($environment);
            return $converter->convert(
                file_get_contents(resource_path('views/posts/content/') . $post->post_template . '.md'));
        });

        Carbon::setlocale(config('app.locale'));
        $comments = [];
        $allComments = $this->getPostComments($post);
        foreach ($allComments as $comment) {
            if (is_null($comment->parent_id)) {
                $childComments = $allComments->where('parent_id', $comment->id)
                                             ->map(function($child) {
                                                 return [
                                                     'id' => $child->id,
                                                     'guest_name' => $child->guest_name,
                                                     'content' => $child->content,
                                                     'created_at' => Carbon::parse($child->created_at)
                                                         ->translatedFormat('F d, Y'),
                                                 ];
                                             });
                $comments[] = [
                    'id' => $comment->id,
                    'guest_name' => $comment->guest_name,
                    'content' => $comment->content,
                    'created_at' => Carbon::parse($comment->created_at)
                        ->translatedFormat('F d, Y'),
                    'comments' => $childComments,
                ];
            }
        }

        return view('pages.post', compact('post', 'post_content', 'comments'));
    }

    public function getPostComments(Post $post): Collection
    {
        return DB::table('comments AS c')
                    ->select('c.id', 'c.parent_id', 'c.content', 'c.created_at', 'c.guest_name')
                    ->where([
                        ['c.commentable_type', Post::class],
                        ['c.commentable_id', $post->id],
                        ['c.published', true],
                        ['deleted_at', null],
                    ])
                    ->get();
    }
}
