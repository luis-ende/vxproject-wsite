<x-guest-layout>
    @section('page_title', 'Contacto')
    @section('page_header')
        <div class="w-full max-h-[660px] md:h-[660px] h-96 bg-cover bg-top mt-16" style="background-image: url('{{ asset('images/SERVICIOS.jpg') }}')">
            <div class="w-full h-full flex backdrop-brightness-50 flex flex-col justify-end">
                <div class="mx-auto w-1/3 flex justify-start">
                    <span class="text-white text-5xl pb-10">Servicios</span>
                </div>
            </div>
        </div>
    @endsection
    <div class="bg-white overflow-hidden min-h-screen">
    </div>
</x-guest-layout>