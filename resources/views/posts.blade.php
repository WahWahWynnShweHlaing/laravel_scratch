<DOCTYPE>
    <head>
        <title>My Blog</title>
        <link href="/app.css" rel="stylesheet">
        <script src="/app.js"></script>
    </head>
    <body>
        <?php foreach ($posts as $post) : ?> 
        <article>
                <h1>
                    <a href="/posts/<?= $post->slug; ?>">
                        {!! $post->title !!}
                    </a>
                </h1>
                <p>
                    By<a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->author->id }}">{{ $post->author->name }}</a>
                </p>
                <div>{!! $post->body !!}</div>
        </article>
        <?php endforeach; ?>
        <a href="/">Go Back</a>
    </body>
</DOCTYPE>