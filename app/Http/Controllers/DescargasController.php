<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;

class DescargasController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Página de descargas sobre ingeniería estructural para torres de telecomunicación - VX Project');
        $this->seo()->setDescription('En nuestra página de descargas sobre ingeniería estructural para torres de telecomunicación encontrarás diversos materiales relacionados con nuestros tutoriales en Youtube y artículos del blog.');
        $this->seo()->metatags()->addKeyword(['torres de telecomunicación', 'ingeniería estructural', 'tutoriales', 'descargas']);
        $this->seo()->opengraph()->setUrl(route('area-descargas.show'));
        $this->seo()->opengraph()->addProperty('type', 'pages');
        $this->seo()->jsonLd()->setType('Page');

        return view('pages.descargas');
    }
}
