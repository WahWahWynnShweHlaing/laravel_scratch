<DOCTYPE>
    <head>
        <title>My Blog</title>
        <link href="/app.css" rel="stylesheet">
        <script src="/app.js"></script>
    </head>
    <body>
        <!-- section 04 , (Eloquent Updates and HTML Escaping) --> 
        <article>
                <h1>
                    {!! $post->title !!}
                </h1>
                <div>
                    {!! $post->body !!}
                </div>
        </article>
        <a href="/">Go Back</a>
    </body>
</DOCTYPE>