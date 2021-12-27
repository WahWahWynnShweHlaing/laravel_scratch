<DOCTYPE>
    <head>
        <title>My Blog</title>
        <link href="/app.css" rel="stylesheet">
        <script src="/app.js"></script>
    </head>
    <body>
        <?php foreach ($posts as $post) : ?> 
        <article>
                <!-- section 2 , 06 (include css and javascript) --> 
                <h1>
                    <a href="/posts/<?= $post->id; ?>">
                        <?= $post->title ?>
                    </a>
                </h1>
                <div><?= $post->body ?></div>
        </article>
        <?php endforeach; ?>
        <a href="/">Go Back</a>
    </body>
</DOCTYPE>