<x-guest-layout>
    @section('page_title', 'Revisar comentarios')
    <div class="bg-white overflow-hidden min-h-screen pt-24">
        <div class="px-10 md:px-0 flex flex-col">
            @if (!$comment)
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-bold">El comentario a revisar no existe o fue eliminado.</span>
                </div>
            @else
                <form action="{{ route('comment.status.update') }}"
                      method="POST">
                    @csrf

                    <input type="hidden" name="access_token" value="{{ request()->route('access_token') }}">
                    <input type="hidden" name="comment_id" value="{{ request()->input('comment_id') }}">
                    <p>Nuevo comentario para el artículo:
                        <a href="{{ route('blog.article.show', [$post->slug]) . '#seccion-comentarios' }}" class="vxproject-link-primary">
                            <strong>{{ $post->title }}</strong>
                        </a>
                    </p>
                    <br>
                    <p>El siguiente comentario requiere revisión:</p>
                    <br>
                    <p>Fecha: {{ $comment->created_at }}</p>
                    <p>De: {{ $comment->guest_name }}</p>
                    <p>Publicado: {{ $comment->published ? 'Sí' : 'No' }}</p>
                    @if($comment->parent)
                        <p>Respuesta a comentario: {{ $comment->parent->content }}</p>
                    @endif
                    <p>Comentario: {{ $comment->content }}</p>
                    <br>
                    <p>Acción:</p>
                    <label for="aprobar">Aprobar</label>
                    <input id="aprobar" type="radio" name="action" value="1"
                           class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full"
                           checked>
                    <label for="eliminar" class="ml-5">Eliminar</label>
                    <input id="eliminar" type="radio" name="action" value="2"
                           class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full">
                    <div class="mt-10 flex flex-row space-x-4">
                        <button type="submit" class="vxproject-button-primary">Enviar</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-guest-layout>