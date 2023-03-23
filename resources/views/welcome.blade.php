<x-guest-layout>
    @section('page_title', 'Inicio')
    <div class="flex flex-col">
        <div class="flex flex-row justify-between relative">
            <div class="px-10 py-48 z-10">
                <span class="block text-vxproject-secondary text-lg lowercase">Telecomunicaciones</span>
                <span class="block text-vxproject-primary text-3xl md:text-7xl w-48 md:w-full">Ingeniería Estructural</span>
                <a href="#" class="block w-32 font-montserrat text-center mt-10 vxproject-button-secondary text-base py-1">Leer más</a>
            </div>
            <div class="px-10 px-2 absolute top-0 right-0">
               <img src="{{ asset('images/VXP-IMAIN-08.svg') }}"
                    alt="VX Project Banner"
                    class="w-[722.76px] h-[782.59px]">
            </div>
        </div>
        <div class="flex flex-row mt-96 items-center">
            <div class="basis-1/2 p-10">
                <img src="{{ asset('images/CODIGOSMAC-1024x682.gif') }}"
                     alt="Códigos de diseño actualizados"
                     class="object-scale-down w-full h-full rounded shadow-2xl shadow-vxproject-primary/30">
            </div>
            <div class="basis-1/2 p-10">
               <span class="text-vxproject-secondary md:text-5xl">
                   Códigos de Diseño Actualizados
               </span>
               <a href="#" class="block w-32 font-montserrat text-center mt-10 vxproject-button-primary text-base py-1">Leer más</a>
           </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="basis-1/2 p-10">
               <span class="text-vxproject-secondary md:text-5xl">
                   Respuesta rápida
               </span>
                <a href="#" class="block w-32 font-montserrat text-center mt-10 vxproject-button-primary text-base py-1">Leer más</a>
            </div>
            <div class="basis-1/2 p-10">
                <img src="{{ asset('images/INICIOTEAM.jpg') }}"
                     alt="Códigos de diseño actualizados"
                     class="object-scale-down w-full h-full rounded shadow-2xl shadow-vxproject-primary/30">
            </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="basis-1/2 p-10">
                <img src="{{ asset('images/CANAL-Y.jpg') }}"
                     alt="Códigos de diseño actualizados"
                     class="object-scale-down w-full h-full rounded shadow-2xl shadow-vxproject-primary/30">
            </div>
            <div class="basis-1/2 p-10">
               <span class="text-vxproject-secondary md:text-5xl">
                   Artículos de ingeniería y macros (VBA)
               </span>
                <a href="#" class="block w-32 font-montserrat text-center mt-10 vxproject-button-primary text-base py-1">Leer más</a>
            </div>
        </div>
        <div class="my-24">
            <span class="block md:text-5xl text-vxproject-primary my-10 px-10">Clientes</span>
            <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-4 md:gap-x-4 gap-y-4 px-16">
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/telesitescliente.jpg') }}"
                        alt="Logo telesites"
                        nombre="telesites"
                        actividad="telecomunicaciones"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/atccliente.jpg') }}"
                        alt="Logo American Tower"
                        nombre="American Tower México"
                        actividad="telecomunicaciones"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/altancliente.jpg') }}"
                        alt="Logo Altán"
                        nombre="Altán Redes"
                        actividad="telecomunicaciones"
                />

                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/emcifcliente.jpg') }}"
                        alt="Logo EMCIF"
                        titulo="EMCIF"
                        nombre="EMCIF"
                        actividad="torrero"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/matesacliente.jpg') }}"
                        alt="Logo Matesa"
                        nombre="MATESA"
                        actividad="torrero"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/WESHLERCLIENTE.jpg') }}"
                        alt="Logo Weshler"
                        nombre="WESHLER"
                        actividad="torrero - mantenimiento"
                />

                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/gnmcliente.jpg') }}"
                        alt="Logo GNM"
                        nombre="GNM"
                        actividad="llave en mano"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/TCI-A.jpg') }}"
                        alt="Logo TCI"
                        nombre="TCI"
                        actividad="torrero"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/MTPCLIENTE.jpg') }}"
                        alt="Logo MTP"
                        nombre="MTP"
                        actividad="telecomunicaciones"
                />

                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/CENTERCLIENTE.jpg') }}"
                        alt="Logo Centerline"
                        nombre="CENTERLINE"
                        actividad="telecomunicaciones"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/BALESIACLIENTE.jpg') }}"
                        alt="Logo Balesia Towers"
                        nombre="BALESIA TOWERS"
                        actividad="telecomunicaciones"
                />
                <x-homepage.cliente-tarjeta
                        src="{{ asset('images/clientes_logos/CFE.jpg') }}"
                        alt="Logo CFE"
                        nombre="CFE"
                        actividad="telecomunicaciones"
                />
            </div>
        </div>
    </div>
</x-guest-layout>