@props(['post' => null])

<article class="bg-white vxproject-border flex flex-col p-5">
    <img src="{{ $post->getFirstMedia('images')->original_url }}"
         alt="{{ $post->title }}"
         class="my-5 w-auto h-48">
    <h3 class="text-vxproject-secondary lg:text-xl uppercase h-24">
        {{ $post->title }}
    </h3>
    <p class="h-40 lg:text-xl text-base">{{ $post->resumen }}</p>
    <a href="{{ route('blog.article.show', [$post->slug]) }}" class="vxproject-button-primary self-end my-2">Leer más</a>
</article>