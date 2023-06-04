<x-guest-layout>
    @section('page_title', $post->title)
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="pt-8 lg:pt-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-lg md:text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    <p class="font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl md:text-base border-b border-t py-2">
                        @svg('bx-user-pin', ['class' => 'w-6 h-6 inline-block mr-2'])
                        <span class="mr-5">{{ $post_author }}</span>
                        @svg('zondicon-calendar', ['class' => 'w-5 h-5 inline-block mr-2'])
                        {{ $post_date }}
                    </p>
                </div>
            </section>

            {{-- Sección de contenido--}}
            <section>
                <article class="md:p-10 p-2">
                    @include('posts.' . $post->post_template, ['post_content', $post_content])

                    {{-- Sección de enlaces redes sociales--}}
                    <x-social-links
                        :social_links="$social_links"
                    />
                </article>
            </section>

            {{-- Sección de comentarios--}}
            <x-comments.section-comments
                    :post_id="$post['id']"
                    :comments="$comments"
            />
        </div>
    </div>
</x-guest-layout>