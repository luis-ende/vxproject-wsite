<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoFormularioRequest;
use App\Mail\ContactoMensajeNotificacion;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    use SEOToolsTrait;

    public function show ()
    {
        $this->seo()->setTitle('Contacto diseño estructural para torres de telecomunicación');
        $this->seo()->setDescription('Pónte en contacto para solicitar mayor información, cotizaciones, dudas sobre diseño estructural para torres de telecomunicación en general.');
        $this->seo()->metatags()->addKeyword(['contacto', 'informes', 'dseño estructural', 'torres de telecomunicación']);
        $this->seo()->opengraph()->setUrl(route('contacto.show'));
        $this->seo()->opengraph()->addProperty('type', 'pages');
        $this->seo()->jsonLd()->setType('Page');

        return view('pages.contacto');
    }

    public function store(ContactoFormularioRequest $request)
    {
        $mailable = new ContactoMensajeNotificacion(
            $request->only('mensaje_asunto', 'nombre', 'email', 'mensaje')
        );

        Mail::to(env('VXPROJECT_EMAIL_CONTACTO'))->send($mailable);

        return redirect()->back()->with('success', 'Gracias por tu mensaje, en breve nos pondremos en contacto.');
    }
}
