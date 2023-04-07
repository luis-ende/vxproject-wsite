<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

class PostController extends Controller
{
    public function blogPostShow(string $postSlug)
    {
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $config = [];
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new AttributesExtension());

        $converter = new MarkdownConverter($environment);
        $post_content = $converter->convert(
            file_get_contents(resource_path('views/posts/content/') . $post->post_template . '.md'));

        return view('pages.post', compact('post', 'post_content'));
    }
}
