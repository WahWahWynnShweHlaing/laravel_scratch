<DOCTYPE>
    <head>
        <title>My Blog</title>
        <link href="/app.css" rel="stylesheet">
        <script src="/app.js"></script>
    </head>
    <body>
        <article>
                <h1>
                    {{$post->title}}
                </h1>
                <div>
                    {!! $post->body !!}
                </div>
        </article>
        <a href="/">Go Back</a>
    </body>
</DOCTYPE>


<!-- section_03, part 2 (blade layout two ways) -->
<!-- @extends ('section_03/components.layout')

@section ('content')
        <article>
                <h1>
                    {{$post->title}}
                </h1>
                <div>
                    {!! $post->body !!}
                </div>
        </article>
        <a href="/">Go Back</a>
@endsection -->