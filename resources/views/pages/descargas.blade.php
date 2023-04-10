<x-guest-layout>
    @section('page_title', 'Área de descargas')
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Área de descargas</h2>
                    <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">En este apartado podrás descargar la información que trabajamos en los videos tutoriales o aquellos que mencionemos en alguno de nuestros artículos.</p>
                </div>
            </section>
            <section>
                <div class="flex flex-row flex-wrap md:space-x-10 space-x-0 md:space-y-0 space-y-5 items-center justify-center">
                    <article class="vxproject-border flex flex-col p-10 space-y-2 items-center">
                        <span class="font-bold">Excel a AutoCAD</span>
                        <span class="text-sm text-gray-500">2.50 MB</span>
                        <a href="{{ Storage::url('downloads/Macro_Excel_a_AutoCAD.zip') }}" download class="vxproject-button-primary">Descargar</a>
                    </article>
                    <article class="vxproject-border flex flex-col p-10 space-y-2 items-center">
                        <span class="font-bold">Excel a Staad</span>
                        <span class="text-sm text-gray-500">13.91 KB</span>
                        <a href="{{ Storage::url('downloads/MACRO_EXCEL_A_STAAD.rar') }}" class="vxproject-button-primary">Descargar</a>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>