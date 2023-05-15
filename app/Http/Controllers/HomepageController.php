<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HomepageController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Ingeniería estructural para torres de telecomunicación - VX Project');
        $this->seo()->setDescription('Diseño de ingeniería estructural integrada. Creamos memorias de calculo de diseños y/o revisiones estructurales de torres de telecomunicaciones para implementación en sitios nuevos y reforzamiento a torres existentes para colocación de nuevos operadores.');
        $this->seo()->metatags()->addKeyword(['torres de telecomunicación', 'ingeniería estructural', 'vxproject']);
        $this->seo()->opengraph()->setUrl(route('homepage'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->opengraph()->addImage(asset('images/servicios/t6.jpg'), ['height' => 300, 'width' => 300]);
        $this->seo()->twitter()->addImage(asset('images/servicios/t6.jpg'));
        //$this->seo()->setCanonical()

        return view('welcome');
    }
}
