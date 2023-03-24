<x-guest-layout>
    @section('page_title', 'Artículo')
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl md:text-base border-b border-t py-2">
                        @svg('zondicon-calendar', ['class' => 'w-5 h-5 inline-block mr-2'])
                        Marzo 23, 2023
                    </p>
                </div>
            </section>
            <section>
                <article>
                    @include('posts.' . $post->post_template)
                </article>
            </section>
        </div>
    </div>
</x-guest-layout>