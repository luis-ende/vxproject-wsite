<x-guest-layout>
    @section('page_title', 'Contacto')
    @section('page_header')
        <div class="w-full max-h-96 h-96 bg-cover bg-center mt-16" style="background-image: url('{{ asset('images/CONTACT.jpg') }}')">
            <div class="w-full h-full backdrop-brightness-50 flex flex-col justify-end">
                <div class="mx-auto w-1/3 flex justify-start">
                    <span class="text-white text-5xl pb-10">Contacto</span>
                </div>
            </div>
        </div>
    @endsection
    <div class="bg-white overflow-hidden min-h-screen">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 lg:py-8 px-4 mx-auto max-w-screen-md">
                    <div class="font-light text-left text-gray-900 dark:text-gray-400 sm:text-xl my-8">
                        <p class="mb-8">
                            Contáctanos y con gusto te ofreceremos una pronta respuesta para los siguientes temas:
                        </p>
                        @php($asunto = request()->query('asunto') ?? 1)
                        {{--<label for="subject" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Asunto</label>--}}
                        <div class="md:pl-5 flex flex-col space-y-2 text-base md:text-lg">
                            <div>
                                <input type="radio" id="cotizaciones"
                                       name="mensaje_asunto" value="1"
                                       @checked($asunto == 1)
                                       class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full">
                                <label for="cotizaciones" class="ml-3">Cotizaciones de nuestros servicios</label>
                            </div>

                            <div>
                                <input type="radio" id="info"
                                       name="mensaje_asunto" value="2"
                                       @checked($asunto == 2)
                                       class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full">
                                <label for="info" class="ml-3">Información o dudas sobre nuestros servicios</label>
                            </div>

                            <div>
                                <input type="radio" id="vxproject_field"
                                       name="mensaje_asunto" value="3"
                                       @checked($asunto == 3)
                                       class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full">
                                <label for="vxproject_field" class="ml-3">Suscripción a VX Project - Field</label>
                            </div>

                            <div>
                                <input type="radio" id="dudas"
                                       name="mensaje_asunto" value="4"
                                       @checked($asunto == 4)
                                       class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full">
                                <label for="dudas" class="ml-3">Dudas sobre nuestros artículos</label>
                            </div>

                            <div>
                                <input type="radio" id="comentarios"
                                       name="mensaje_asunto" value="5"
                                       @checked($asunto == 5)
                                       class="w-5 h-5 text-vxproject-secondary border-vxproject-secondary focus:ring-vxproject-primary rounded-full">
                                <label for="comentarios" class="ml-3">Sugerencias y comentarios</label>
                            </div>
                        </div>
                    </div>
                    <form id="contacto_form" action="#" class="space-y-8">
                        <div>
                            <label for="sender_name" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Tu nombre</label>
                            <input type="text"
                                   id="sender_name"
                                   autofocus
                                   class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-vxproject-secondary focus:border-vxproject-secondary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary dark:shadow-sm-light"
                                   required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Tu correo electrónico</label>
                            <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vxproject-secondary focus:border-vxproject-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary dark:shadow-sm-light"
                                   placeholder="nombre@email.com" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">Tu mensaje</label>
                            <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-vxproject-secondary focus:border-vxproject-secondary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary"
                                      placeholder="Mensaje..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="vxproject-button-primary">Envíar mensaje</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>