<x-guest-layout>
    @section('page_title', 'Contacto')
    @section('page_header')
        <div class="w-full max-h-96 h-96 bg-cover bg-top mt-16" style="background-image: url('{{ asset('images/SERVICIOS.jpg') }}')">
            <div class="w-full h-full backdrop-brightness-75 flex flex-col justify-end">
                <div class="mx-auto w-1/3 flex justify-start">
                    <span class="text-white text-5xl pb-10">Servicios</span>
                </div>
            </div>
        </div>
    @endsection
    <div class="bg-white overflow-hidden min-h-screen my-20 pb-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section>
                <div class="grid gap-10 lg:grid-cols-3">
                    <article class="bg-white vxproject-border flex flex-col p-5">
                        <img src="{{ asset('images/servicios/VXPFIELD.jpg') }}"
                             alt="VX Project Field"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Encuentra información de suelos de sitios existentes en la republica mexicana para poder pre-diseñar una cimentación.
                        </p>
                        <a href="https://field.vxproject.com.mx"
                           target="_blank"
                           class="vxproject-button-primary self-end my-2 w-40">Iniciar sesión</a>
                        <a href="{{ route('contacto.show') . '?asunto=3#contacto_form' }}"
                           class="vxproject-button-primary self-end my-2 w-40">suscribete</a>
                    </article>

                    <article class="bg-white vxproject-border flex flex-col p-5">
                        <img src="{{ asset('images/servicios/t6.jpg') }}"
                             alt="Torre de telecomunicación"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Diseños de distintos tipos de torres de telecomunicaciones con los más actuales códigos de diseño aplicados en un modelo matemático tridimensional.
                        </p>
                        <a href="{{ route('codigos-disenio.index') }}"
                           class="vxproject-button-primary self-end my-2 w-40">Ver códigos</a>
                        <a href="{{ route('contacto.show') . '?asunto=2#contacto-opciones' }}"
                           class="vxproject-button-primary self-end my-2 w-40">Contáctanos</a>
                    </article>

                    <article class="bg-white vxproject-border flex flex-col p-5">
                        <img src="{{ asset('images/servicios/CIM_RETENIDA.gif') }}"
                             alt="Cimentación"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Diseños de cimentaciones ya sea de concreto o acero para los distintos tipos de torres de telecomunicaciones con los más actuales códigos de diseño.
                        </p>
                        <a href="{{ route('codigos-disenio.index') }}"
                           class="vxproject-button-primary self-end my-2 w-40">Ver códigos</a>
                        <a href="{{ route('contacto.show') . '?asunto=2#contacto-opciones' }}"
                           class="vxproject-button-primary self-end my-2 w-40">Contáctanos</a>
                    </article>

                    <article class="bg-white vxproject-border flex flex-col p-5">
                        <img src="{{ asset('images/servicios/p1.jpg') }}"
                             alt="Estructura de construcción"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-56 text-xl">
                            Diseño de elementos estructurales de concreto y/o acero, así como de muros de retención y/o contención de concreto o mampostería que requiera la radio base.
                        </p>
                        <a href="{{ route('codigos-disenio.index') }}"
                           class="vxproject-button-primary self-end my-2 w-40">Ver códigos</a>
                        <a href="{{ route('contacto.show') . '?asunto=2#contacto-opciones' }}"
                           class="vxproject-button-primary self-end my-2 w-40">Contáctanos</a>
                    </article>

                    <article class="bg-white vxproject-border flex flex-col p-5">
                        <img src="{{ asset('images/servicios/DICTAMEN-TORRE-scaled.jpg') }}"
                             alt="Dictámenes de torres de telecomunicación"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-56 text-xl">
                            Revisión de distintos tipos de torres de telecomunicaciones con los códigos de diseño que se emplearon para el diseño del proyecto original. Se revisa el estado actual. Se revisa con incremento tanto de cargas como de tramos adicionales.
                        </p>
                        <a href="{{ route('codigos-disenio.index') }}"
                           class="vxproject-button-primary self-end my-2 w-40">Ver códigos</a>
                        <a href="{{ route('contacto.show') . '?asunto=2#contacto-opciones' }}"
                           class="vxproject-button-primary self-end my-2 w-40">Contáctanos</a>
                    </article>

                    <article class="bg-white vxproject-border flex flex-col p-5">
                        <img src="{{ asset('images/servicios/PLANOS-CIM-scaled.jpg') }}"
                             alt="Planos estructurales"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-56 text-xl">
                            Planos estructurales resultantes del cálculo estructural de torre, de cimentación, de elementos de acero y/o concreto, así como de propuestas de reforzamiento.
                        </p>
                        <a href="{{ route('codigos-disenio.index') }}"
                           class="vxproject-button-primary self-end my-2 w-40">Ver códigos</a>
                        <a href="{{ route('contacto.show') . '?asunto=2#contacto-opciones' }}"
                           class="vxproject-button-primary self-end my-2 w-40">Contáctanos</a>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>