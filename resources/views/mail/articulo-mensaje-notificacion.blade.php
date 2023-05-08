@extends('mail.email-message')
@section('content')
# ¡Hola!

Has recibido el siguiente comentario en un artículo del sitio VX Project.

>**Artículo:** {{ $comentarioInfo['articulo'] }}<br>
**Nombre:** {{ $comentarioInfo['nombre'] }}<br>
**Comentario:**<br>
{{ $comentarioInfo['comment'] }}<br>

Para revisar el comentario y aprobarlo o eliminarlo haz clic en:

@component('mail::button', ['url' => $comentarioInfo['url_review']])
Revisar
@endcomponent

<br><br>
Saludos,<br>
**VX Project Admin**
@endsection