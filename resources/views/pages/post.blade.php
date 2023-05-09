<x-guest-layout>
    @section('page_title', $post->title)
    <div class="bg-white overflow-hidden min-h-screen mt-10">
        <div class="px-10 md:px-0 flex flex-col items-center">
            <section class="bg-white dark:bg-gray-900">
                <div class="pt-8 lg:pt-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    <p class="font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl md:text-base border-b border-t py-2">
                        @svg('bx-user-pin', ['class' => 'w-6 h-6 inline-block mr-2'])
                        <span class="mr-5">Arturo</span>
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

            {{-- Sección de comentarios--}}
            <section id="seccion-comentarios"
                     class="bg-white dark:bg-gray-900 py-8 lg:py-16 md:w-full"
                     x-data="commentsSection()"
                     x-init="commentsSectionInit()">

                <div class="max-w-3xl mx-auto md:px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comentarios (<span x-text="comments.length"></span>)</h2>
                    </div>

                    <template id="commentForm" x-teleport="#post-comment">
                        <form x-ref="commentForm"
                              class="mb-6 flex flex-col"
                              method="POST"
                              action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" value="{{ $post['id'] }}" name="post_id">
                            <input type="hidden" :value="activeCommentId" name="parent_comment">

                            <label for="nombre" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                            <input x-ref="inputNombre" type="text" id="nombre" name="nombre"
                                   required
                                   class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-vxproject-secondary focus:border-vxproject-secondary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary dark:shadow-sm-light mb-5">

                            <label for="comment">Comentario</label>
                            <textarea x-ref="inputComment" id="comment" name="comment" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-vxproject-secondary focus:border-vxproject-secondary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vxproject-secondary dark:focus:border-vxproject-secondary"
                                      placeholder="Escribe un comentario..." required></textarea>
                            <span class="block text-xs text-red-600 my-3" x-text="errors"></span>

                            <x-honey/>

                            <div class="flex flex-row justify-end space-x-3">
                                <button type="button"
                                        @click.prevent="closeAnswerComment()"
                                        class="inline-flex items-center py-2.5 px-4 vxproject-button-primary self-end"
                                        x-show="showCommentForm">
                                    Cancelar
                                </button>
                                <button type="button"
                                        @click.prevent="sendComment($refs.commentForm)"
                                        class="inline-flex items-center py-2.5 px-4 vxproject-button-primary self-end">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </template>

                    <div id="post-comment" x-show="!showCommentForm"></div>

                    <div x-show="estatusMessage !== null"
                         class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-bold" x-text="estatusMessage"></span>
                    </div>

                    <template x-for="comment in comments" :key="comment.id">
                        <article class="commentArticle p-6 mb-6 text-base border-t border-gray-200 bg-white rounded-lg dark:bg-gray-900"
                                 :data-comment-id="comment.id">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        @svg('ik-user', ['class' => 'mr-2 w-6 h-6'])
                                        <span x-text="comment.guest_name"></span>
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
                        estatusMessage: null,
                        errorMessage: null,
                        activeCommentId: null,
                        errors: '',
                        comments: @js($comments),
                        commentsSectionInit() {
                            console.log(this.comments)
                        },
                        sendComment(form) {
                            this.estatusMessage = null;
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
                                        // const comment = this.comments.find(c => c.id === this.activeCommentId);
                                        // if (!comment.comments) {
                                        //     comment.comments = {};
                                        // }
                                        //comment.comments[json.id] = { ...json };
                                        this.closeAnswerComment();
                                    } else {
                                        //this.comments.push(json);
                                        this.clearCommentForm();
                                    }

                                    this.estatusMessage = "Tu comentario ha sido enviado.";
                                    document.getElementById('seccion-comentarios').scrollIntoView();
                                })
                        },
                        showAnswerComment(id) {
                            this.estatusMessage = null;
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