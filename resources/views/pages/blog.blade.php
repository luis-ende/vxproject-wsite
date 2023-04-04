<x-guest-layout>
    @section('page_title', 'Artículos')
    @section('page_header')
        <div class="w-full max-h-[660px] md:h-[660px] h-96 bg-cover bg-top mt-16" style="background-image: url('{{ asset('images/articulos.jpg') }}')">
            <div class="w-full h-full flex backdrop-brightness-50 flex flex-col justify-end">
                <div class="mx-auto w-1/3 flex justify-start">
                    <span class="text-white text-5xl pb-10">Artículos</span>
                </div>
            </div>
        </div>
    @endsection
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <h2 class="my-10 text-5xl tracking-tight font-montserrat text-vxproject-secondary dark:text-white">Tutoriales</h2>
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section>
                <div class="grid gap-10 lg:grid-cols-3">
                    @foreach($posts as $post)
                        <x-blog.articulo-card :post="$post" />
                    @endforeach
                </div>
            </section>
        </div>
        <h2 class="my-10 text-5xl tracking-tight font-montserrat text-vxproject-secondary dark:text-white">Lo nuevo</h2>
    </div>
</x-guest-layout>