<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoFormularioRequest;
use App\Mail\ContactoMensajeNotificacion;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function show ()
    {
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
