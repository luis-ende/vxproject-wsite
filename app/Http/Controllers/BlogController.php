<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Blog sobre ingeniería estructural para torres de telecomunicación - VX Project');
        $this->seo()->setDescription('En nuestro blog encontrarás diversos artículos y referencias de gran utilidad acerca de ingeniería estructural para torres de telecomunicación.');
        $this->seo()->setCanonical(route('blog.show'));
        $this->seo()->metatags()->addKeyword(['torres de telecomunicación', 'ingeniería estructural', 'blog']);
        $this->seo()->opengraph()->setUrl(route('blog.show'));
        $this->seo()->opengraph()->addProperty('type', 'blog');
        $this->seo()->jsonLd()->setType('Blog');
        $this->seo()->opengraph()->addImage(asset('/images/articulos/blog_cover.png'), ['height' => 300, 'width' => 300]);

        $posts = Post::all()->sortBy('secuencia');

        return view('pages.blog', compact('posts'));
    }
}
