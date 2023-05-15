<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Servicios de ingeniería estructural para torres de telecomunicación  - VX PRoject');
        $this->seo()->setDescription('Nuestros servicios de ingeniería estructural para diseño de torres de telecomunicación.');
        $this->seo()->metatags()->addKeyword(['ingeniería estructural', 'torres de telecomunicación', 'estructuras de acero y concreto', 'códigos de diseño']);
        $this->seo()->opengraph()->setUrl(route('servicios.show'));
        $this->seo()->opengraph()->addProperty('type', 'pages');
        $this->seo()->jsonLd()->setType('Page');

        return view('pages.servicios');
    }
}
