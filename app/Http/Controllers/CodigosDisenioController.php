<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;

class CodigosDisenioController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Códigos de diseño');
        $this->seo()->setDescription('VX Project ofrece diseños de ingeniería con los códigos de diseño más actuales para acero y concreto, así como para la aplicación de cargas de viento y sismo de los manuales y reglamentos más recientes tanto nacionales como internacionales.');
        $this->seo()->setCanonical(route('codigos-disenio.index'));
        $this->seo()->metatags()->addKeyword(['torres de telecomunicación', 'ingeniería estructural', 'códigos de diseño', 'viento', 'sismo', 'acero', 'tornillería y soldadura', 'cimentación']);
        $this->seo()->opengraph()->setUrl(route('codigos-disenio.index'));
        $this->seo()->opengraph()->addProperty('type', 'pages');
        $this->seo()->jsonLd()->setType('Page');
        $this->seo()->opengraph()->addImage(asset('/images/codigos/codigos_cover.jpeg'), ['height' => 300, 'width' => 300]);

        return view('pages.codigos-disenio');
    }
}
