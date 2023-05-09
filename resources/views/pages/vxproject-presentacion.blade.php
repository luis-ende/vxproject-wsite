<x-guest-layout>
    @section('page_title', 'Presentación')
    <div class="px-10 md:px-0 flex flex-col items-center">
        <section class="bg-white overflow-hidden min-h-screen my-10 pb-10">
            <div class="mt-20 mb-10 px-10 md:px-0">
                <h1 class="block md:text-5xl text-xl text-vxproject-primary my-10">Bienvenidos</h1>
            </div>
            <article class="px-10 md:px-0">
                <p class="border-t pt-10">
                    Somos un equipo dedicado al diseño y revisión estructural de torres de telecomunicaciones. Cada ingeniería realizada cuenta con memorias de cálculo, modelos matemáticos, planos estructurales de torre y cimentación, además de apegarnos a los requerimientos y necesidades de cada cliente.
                </p>
                <br>
                <p>
                    Las ingenierías más comunes que hemos realizado son las de torres de monopolos, autosoportadas, mástiles y arriostradas. Pero también realizamos diversos trabajos que pueden consultar en nuestro apartado de servicios o bien pueden ponerse en contacto para solicitar información y/o una cotización de algún proyecto de ingeniería estructural.
                </p>
                <br>
                <p>
                    Buscamos que las solicitudes de nuestros clientes sean resueltas en el menor tiempo posible con la mejor calidad en cuanto a diseño estructural como en la presentación.
                </p>
                <br>
                <p>
                    Para lograr esto, aprovechamos al máximo las capacidades de las aplicaciones como: software especializado para diseño estructural, paquetería de MS Office® y AutoCAD®, todo esto en combinación con el lenguaje de programación Visual Basic Applications.
                </p>
                <br>
                <p>
                    En el apartado de <a class="vxproject-link-primary" href="{{ route('blog.show') }}">artículos</a> estaremos publicando información para complementar de mejor manera los tutoriales presentados en nuestro canal de <a class="vxproject-link-primary" href="https://www.youtube.com/channel/UC0I8BpJmOnqHWkullj_Q_Pg" target="_blank">YouTube</a>, y temas relacionados con la ingeniería civil, así como de las telecomunicaciones.
                </p>
                <br>
                <p class="my-10">
                    <span class="text-vxproject-primary font-bold">VX </span><span class="font-bold ">Project</span> agradece tu visita y tu preferencia.
                </p>
            </article>
        </section>
    </div>
</x-guest-layout>