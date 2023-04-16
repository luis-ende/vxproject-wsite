<x-guest-layout>
    @section('page_title', $post->title)
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="pt-8 lg:pt-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    <p class="font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl md:text-base border-b border-t py-2">
                        @svg('bx-user-pin', ['class' => 'w-6 h-6 inline-block mr-2'])
                        <span class="mr-5">VX Project</span>
                        @svg('zondicon-calendar', ['class' => 'w-5 h-5 inline-block mr-2'])
                        Marzo 23, 2023
                    </p>
                </div>
            </section>
            <section>
                <article class="md:p-10 p-2">
                    @include('posts.' . $post->post_template, ['post_content', $post_content])
                </article>
            </section>

            {{--<span id="status-message" class="w-full block text-green-400 text-base my-4 font-bold text-center">¡Mensaje enviado!</span>--}}

            {{-- Sección de comentarios--}}
            <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 md:w-1/2"
                     x-data="commentsSection()"
                     x-init="commentsSectionInit()">
                <div class="max-w-2xl mx-auto md:px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comentarios (<span x-text="comments.length"></span>)</h2>
                    </div>

                    <template id="commentForm" x-teleport="#post-comment">
                        <form x-ref="commentForm"
                              class="mb-6"
                              method="POST"
                              action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" value="{{ $post['id'] }}" name="post_id">
                            <input type="hidden" :value="activeCommentId" name="parent_comment">
                            <label for="nombre" class="font-bold">Nombre*</label>
                            <div class="px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <input x-ref="inputNombre" type="text" id="nombre" name="nombre"
                                       required
                                       class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800">
                            </div>

                            <label for="comment" class="font-bold">Comentario*</label>
                            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <textarea x-ref="inputComment" id="comment" name="comment" rows="4"
                                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                          placeholder="Escribe un comentario..." required></textarea>
                            </div>
                            <span class="block text-xs text-red-600 my-3" x-text="errors"></span>
                            <button type="button"
                                    @click.prevent="sendComment($event.target.parentElement)"
                                    class="inline-flex items-center py-2.5 px-4 vxproject-button-primary">
                                Enviar
                            </button>
                            <button type="button"
                                    @click.prevent="closeAnswerComment()"
                                    class="inline-flex items-center py-2.5 px-4 vxproject-button-primary"
                                    x-show="showCommentForm">
                                Cancelar
                            </button>
                        </form>
                    </template>

                    <div id="post-comment" x-show="!showCommentForm"></div>

                    <template x-for="comment in comments" :key="comment.id">
                        <article class="commentArticle p-6 mb-6 text-base border-t border-gray-200 bg-white rounded-lg dark:bg-gray-900"
                                 :data-comment-id="comment.id">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        @svg('ik-user', ['class' => 'mr-2 w-6 h-6'])
                                        <span x-text="comment.guest_name">Usuario test</span>
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate :datetime="comment.created_at" :title="comment.created_at" x-text="comment.created_at">
                                        </time>
                                    </p>
                                </div>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400" x-text="comment.content"></p>
                            <div class="flex items-center my-4 space-x-4">
                                <button type="button"
                                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400"
                                        @click="showAnswerComment(comment.id)">
                                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    Responder
                                </button>
                            </div>

                            <template x-for="child in comment.comments ">
                                <article class="commentArticle p-6 text-base border-t border-gray-200 bg-white rounded-lg dark:bg-gray-900"
                                         :data-comment-id="child.id">
                                    <div class="ml-5">
                                        <footer class="flex justify-between items-center mb-2">
                                            <div class="flex items-center">
                                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                                    @svg('ik-user', ['class' => 'mr-2 w-6 h-6'])
                                                    <span x-text="child.guest_name">Usuario test</span>
                                                </p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    <time pubdate :datetime="child.created_at" :title="child.created_at" x-text="child.created_at">
                                                    </time>
                                                </p>
                                            </div>
                                        </footer>
                                        <p class="text-gray-500 dark:text-gray-400" x-text="child.content"></p>
                                    </div>
                                </article>
                            </template>
                        </article>
                    </template>
                </div>
            </section>

            <script type="text/javascript">
                function commentsSection() {
                    return {
                        showCommentForm: false,
                        activeCommentId: null,
                        errors: '',
                        comments: @js($comments),
                        commentsSectionInit() {
                            console.log(this.comments)
                        },
                        sendComment(form) {
                            const formData = new FormData(form);
                            if (!formData.get('nombre') || !formData.get('comment')) {
                                this.errors = 'Por favor proporciona nombre y comentario.';
                                return;
                            }

                            this.errors = '';
                            fetch('{{ route('comments.store') }}', {
                                method: "POST",
                                credentials: 'same-origin',
                                headers: {
                                    'X-CSRF-Token': '{{ csrf_token() }}',
                                },
                                body: formData,
                            }).then(response => response.json())
                                .then(json => {
                                    if (this.activeCommentId) {
                                        const comment = this.comments.find(c => c.id === this.activeCommentId);
                                        if (!comment.comments) {
                                            comment.comments = [];
                                        }
                                        comment.comments[json.id] = json;
                                        this.closeAnswerComment();
                                    } else {
                                        this.comments.push(json);
                                        this.clearCommentForm();
                                    }

                                    // TODO
                                    // document.getElementById('status-message').scrollIntoView();
                                })
                        },
                        showAnswerComment(id) {
                            if (this.showCommentForm) {
                                this.closeAnswerComment();
                            }

                            this.errors = '';
                            this.activeCommentId = id;
                            this.showCommentForm = true;
                            const commentElement = document.querySelector(`[data-comment-id="${id}"]`);
                            const clone = document.querySelector('#commentForm').content.cloneNode(true);
                            commentElement.appendChild(clone);
                            commentElement.lastElementChild.scrollIntoView(false);
                        },
                        closeAnswerComment() {
                            const commentElement = document.querySelector(`[data-comment-id="${this.activeCommentId}"]`);
                            commentElement.removeChild(commentElement.lastElementChild);
                            this.showCommentForm = false;
                            this.activeCommentId = null;
                        },
                        clearCommentForm() {
                            this.$refs.inputNombre.value = null;
                            this.$refs.inputComment.value = null;
                        }
                    }
                }
            </script>
        </div>
    </div>
</x-guest-layout>