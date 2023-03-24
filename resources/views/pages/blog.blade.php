<x-guest-layout>
    @section('page_title', 'Área de descargas')
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Artículos</h2>
                    <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Consulta nuestros artículos con información útil sobre dibujo.</p>
                </div>
            </section>
            <section>
                <div class="grid gap-8 lg:grid-cols-2">
                    @foreach($posts as $post)
                        <x-blog.articulo-card :post="$post" />
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>