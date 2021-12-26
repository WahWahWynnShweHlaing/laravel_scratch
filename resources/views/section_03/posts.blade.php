<DOCTYPE>
    <head>
        <title>My Blog</title>
        <link href="/app.css" rel="stylesheet">
        <script src="/app.js"></script>
    </head>
    <body>
        <!-- section 03 , part 01 (Blade thhe absolute basic) -->
        @foreach ($posts as $post)
            <article class="{{ $loop->even ? 'foobar' : '' }}">
                <h1>
                    <a href="/posts/{{ $post->slug }} ">
                        {{ $post->title }} 
                    </a>
                </h1>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
        <a href="/">Go Back</a>
    </body>
</DOCTYPE>

<!-- section_03, part 2 (blade layout two ways) -->
<!-- @extends ('section_03/components.layout')

@section ('content')
        @foreach ($posts as $post)
            <article class="{{ $loop->even ? 'foobar' : '' }}">
                <h1>
                    <a href="/posts/{{ $post->slug }} ">
                        {{ $post->title }} 
                    </a>
                </h1>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
@endsection -->


<!-- x-layout way , part 2 (blade layout two ways) -->
    <!-- <x-layout>
        @foreach ($posts as $post)
            <article class="{{ $loop->even ? 'foobar' : '' }}">
                <h1>
                    <a href="/posts/{{ $post->slug }} ">
                        {{ $post->title }} 
                    </a>
                </h1>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
    </x-layout> -->
