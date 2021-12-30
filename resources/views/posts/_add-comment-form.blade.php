@auth
        <x-panel>
            <form action="/posts/{{ $post->slug }}/comments" method="POST">
                 @csrf
                    <header class="flex items-center">
                         <img src="https://i.pravatar.cc/100?id={{ auth()->id() }}" alt="" width="40" height="60">
                         <h2 class="ml-4">Want to Participate?</h2>
                    </header>

                    <div class="mt-10">
                        <textarea name="body" class="w-full" cols="30" rows="10" placeholder="Quick , think of something to say!" required>
                        </textarea>

                        @error('body')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-10 border-t border-gray-200 pt-6">
                       <x-primary-button>Post</x-primary-button>
                    </div>
            </form>

        </x-panel>
     @else
        <p>
            <a href="/register" class="hover:underline"> Register </a> or <a href="/login" class="hover:underline">Log in </a> to Participate in comments
        </p>
@endauth
