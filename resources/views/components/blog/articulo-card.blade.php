@props(['post' => null])

<article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
    <img src="{{ $post->getFirstMedia('images')->original_url }}"
         alt="{{ $post->title }}"
         class="my-5">
    <h3 class="text-vxproject-secondary text-xl uppercase h-20">
        {{ $post->title }}
    </h3>
    <p class="h-40 text-xl">{{ $post->resumen }}</p>
    <button type="button" class="vxproject-button-primary self-end my-2">Leer más</button>
</article>