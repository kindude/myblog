<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>
    <section>
    <h1> {!! $post->title !!}</h1>
    <div> {!! $post->body !!}</div>
    </section>
    <a href="/posts">Go back</a>
</body>
</html>