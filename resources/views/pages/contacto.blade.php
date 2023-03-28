<x-guest-layout>
    @section('page_title', 'Contacto')
    @section('page_header')
        <div class="w-full max-h-96 h-96 bg-cover bg-top mt-16" style="background-image: url('{{ asset('images/CONTACT.jpg') }}')">
            <div class="w-full h-full flex backdrop-brightness-50 flex flex-col justify-end">
                <div class="mx-auto w-1/3 flex justify-start">
                    <span class="text-white text-5xl pb-10">Contacto</span>
                </div>
            </div>
        </div>
    @endsection
    {{--<h1 class="block text-vxproject-primary text-2xl uppercase text-center">Contáctanos</h1>--}}
    <div class="bg-white overflow-hidden min-h-screen">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    {{--<h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contáctanos</h2>--}}
                    <div class="font-light text-left text-gray-900 dark:text-gray-400 sm:text-xl my-8">
                        <p class="mb-8">
                            Contáctanos y con gusto te ofreceremos una pronta respuesta para los siguientes temas:
                        </p>
                        <ul class="list-disc list-inside lg:pl-10">
                            <li>Cotizaciones de nuestros servicios.</li>
                            <li>Información o dudas sobre nuestros servicios.</li>
                            <li>Suscripción a VX Project - Field.</li>
                            <li>Dudas sobre nuestros artículos.</li>
                            <li>Sugerencias y comentarios.</li>
                        </ul>
                    </div>
                    <form action="#" class="space-y-8">
                        <div>
                            <label for="sender_name" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Tu nombre</label>
                            <input type="text"
                                   id="sender_name"
                                   class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-vxproject-secondary focus:border-vxproject-secondary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary dark:shadow-sm-light"
                                   required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Tu correo electrónico</label>
                            <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vxproject-secondary focus:border-vxproject-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary dark:shadow-sm-light"
                                   placeholder="nombre@email.com" required>
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Asunto</label>
                            <input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-vxproject-secondary focus:border-vxproject-secondary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary dark:shadow-sm-light"
                                   placeholder="Háznos saber cómo podemos ayudarte" required>
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