@props(['comment'])

<article class="flex bg-gray-100">
    <div>
        <img src="https://i.pravatar.cc/100?id={{ $comment->id }}" alt="" width="60" height="60">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="fond-bold">
               {{ $comment->author->username }}
            </h3>
            <p class="text-xs">
                Posted<time>{{ $comment->created_at}}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>

</article>