<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Bienvenidos a ingeniería estructural para torres de telecomunicación - VX Project');
        $this->seo()->setDescription('Nos dedicamos principalmente al diseño y revisión estructural de torres de telecomunicaciones. La ingeniería creada se refleja en una memoria de cálculo con sus respectivos modelos matemáticos junto con los planos estructurales de torre y cimentación e información específica requerida por el cliente para cada sitio.');
        $this->seo()->setCanonical(route('vxproject-presentacion.show'));
        $this->seo()->metatags()->addKeyword(['torres de telecomunicación', 'ingeniería estructural']);
        $this->seo()->opengraph()->setUrl(route('vxproject-presentacion.show'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->jsonLd()->setType('Article');

        return view('pages.vxproject-presentacion');
    }
}
