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
    <div class="bg-white overflow-hidden min-h-screen my-20">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section>
                <div class="grid gap-10 lg:grid-cols-3">
                    <article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <img src="{{ asset('images/servicios/VXPFIELD.jpg') }}"
                             alt="VX Project Field"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Encuentra información de suelos de sitios existentes en la republica mexicana para poder pre-diseñar una cimentación.
                        </p>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Iniciar sesión</button>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">suscribete</button>
                    </article>

                    <article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <img src="{{ asset('images/servicios/t6.jpg') }}"
                             alt="Torre de telecomunicación"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Diseños de distintos tipos de torres de telecomunicaciones con los más actuales códigos de diseño aplicados en un modelo matemático tridimensional.
                        </p>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Ver códigos</button>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Contáctanos</button>
                    </article>

                    <article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <img src="{{ asset('images/servicios/CIM_RETENIDA.gif') }}"
                             alt="Cimentación"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Diseños de cimentaciones ya sea de concreto o acero para los distintos tipos de torres de telecomunicaciones con los más actuales códigos de diseño.
                        </p>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Ver códigos</button>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Contáctanos</button>
                    </article>

                    <article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <img src="{{ asset('images/servicios/p1.jpg') }}"
                             alt="Estructura de construcción"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Diseño de elementos estructurales de concreto y/o acero, así como de muros de retención y/o contención de concreto o mampostería que requiera la radio base.
                        </p>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Ver códigos</button>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Contáctanos</button>
                    </article>

                    <article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <img src="{{ asset('images/servicios/DICTAMEN-TORRE-scaled.jpg') }}"
                             alt="Dictámenes de torres de telecomunicación"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Revisión de distintos tipos de torres de telecomunicaciones con los códigos de diseño que se emplearon para el diseño del proyecto original. Se revisa el estado actual. Se revisa con incremento tanto de cargas como de tramos adicionales.
                        </p>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Ver códigos</button>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Contáctanos</button>
                    </article>

                    <article class="p-3 bg-white rounded border border-vxproject-primary dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <img src="{{ asset('images/servicios/PLANOS-CIM-scaled.jpg') }}"
                             alt="Planos estructurales"
                             class="my-5 w-full h-56 object-cover">
                        <p class="h-48 text-xl">
                            Planos estructurales resultantes del cálculo estructural de torre, de cimentación, de elementos de acero y/o concreto, así como de propuestas de reforzamiento.
                        </p>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Ver códigos</button>
                        <button type="button" class="vxproject-button-primary self-end my-2 w-40">Contáctanos</button>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>