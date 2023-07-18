<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Output\RenderedContentInterface;

class PostController extends Controller
{
    use SEOToolsTrait;

    public function blogPostShow(string $postSlug)
    {
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $this->seo()->setTitle($post->title . ' - VX PRoject');
        $this->seo()->setDescription($post->resumen);
        $this->seo()->setCanonical(route('blog.article.show', [$post->slug]));
        if (!empty($post->seo_keywords)) {
            $keywords = explode(',', $post->seo_keywords);
            $this->seo()->metatags()->addKeyword($keywords);
        }
        $this->seo()->opengraph()->setUrl(route('blog.article.show', [$post->slug]));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->opengraph()->addImage($post->getFirstMedia('images')->original_url, ['height' => 300, 'width' => 300]);

        $post_content = $this->getPostContent($post);
        $comments = $this->getPostComments($post);
        $social_links = $this->getSocialLinks($post);

        Carbon::setlocale(config('app.locale'));

        $user = User::find($post->user_id);
        $post_author = $user?->name;
        $post_date = ucfirst(Carbon::parse($post->created_at)
                            ->translatedFormat('F d, Y'));

        return view('pages.post', compact(
            'post',
            'post_date',
            'post_author',
            'post_content',
            'comments',
            'social_links'));
    }

    private function getPostContent(Post $post): RenderedContentInterface
    {
        return Cache::rememberForever($post->post_template, function() use($post) {
            $config = [];
            $environment = new Environment($config);
            $environment->addExtension(new CommonMarkCoreExtension());
            $environment->addExtension(new AttributesExtension());

            $converter = new MarkdownConverter($environment);
            return $converter->convert(
                file_get_contents(resource_path('views/posts/content/') . $post->post_template . '.md'));
        });
    }

    private function getPostComments(Post $post): array
    {
        $comments = [];
        Carbon::setlocale(config('app.locale'));
        $allComments = $this->getPostModelComments($post);
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

        return $comments;
    }

    private function getSocialLinks(Post $post) {
        return \Share::page(route('blog.article.show', $post->slug), $post->title)
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->linkedin()
            ->getRawLinks();
    }

    private function getPostModelComments(Post $post): Collection
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
