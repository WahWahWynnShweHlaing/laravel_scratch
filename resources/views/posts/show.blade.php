<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <x-category-button :category="$post->category" />

                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    {{ $post->title }}
                                </h1>

                                <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $post->created_at}}</time>
                                    </span>
                            </div>
                        </header>

                        <div class="text-sm mt-2">
                            {!! $post->body !!}
                        </div>
                        <section class="col-span-8 col-start-5 mt-10">
                            @auth
                                <x-panel>
                                    <form action="/posts/{{ $post->slug }}/comments" method="POST">
                                        @csrf
                                        <header class="flex items-center">
                                            <img src="https://i.pravatar.cc/100?id={{ auth()->id() }}" alt="" width="40" height="60">
                                            <h2 class="ml-4">Want to Participate?</h2>
                                        </header>

                                        <div class="mt-10">
                                            <textarea name="body" class="w-full" cols="30" rows="10" placeholder="Quick , think of something to say!">
                                            </textarea>
                                        </div>

                                        <div class="flex justify-end mt-10 border-t border-gray-200 pt-6">
                                            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-500">
                                                Post
                                            </button>
                                        </div>
                                    </form>

                                </x-panel>
                                @else
                                    <p>
                                    <a href="/register" class="hover:underline"> Register </a> or <a href="/login" class="hover:underline">Log in </a> to Participate in comments
                                    </p>
                            @endauth

                            @foreach ($post->comment as $comment)
                            <x-post-comment :comment="$comment"/>
                            @endforeach
                        </section>


                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                                <div class="ml-3">
                                    <h5 class="font-bold">
                                        <a href="/?author={{$post->author->username}}">{{ $post->author->name }}</a>
                                    </h5>
                                    <h6>Mascot at Laracasts</h6>
                                </div>
                            </div>

                            <div class="hidden lg:block">
                                <a href="#"
                                   class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                >Read More</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
        </main>
    </section>

</x-layout>