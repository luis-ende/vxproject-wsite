@extends('mail.email-message')
@section('content')
# ¡Hola!

Has recibido el siguiente mensaje a través del formulario de la página de Contacto del sitio VX Project.

>**Asunto:** {{ $mensajeInfo['mensaje_asunto'] }}<br>
**Nombre:** {{ $mensajeInfo['nombre'] }}<br>
**Email:** {{ $mensajeInfo['email'] }}<br>
**Mensaje:**<br>
{{ $mensajeInfo['mensaje'] }}<br>

<br><br>
Saludos,<br>
**VX Project Admin**
@endsection