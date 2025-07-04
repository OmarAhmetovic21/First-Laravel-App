<!DOCTYPE html>
<html>
<head>
    <title>Lista postova</title>
</head>
<body style="text-align: center;">
    @include('partials.navbar')

    <h1>Lista postova</h1>

    @foreach ($posts as $post)
        <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc; text-align: left; max-width: 600px; margin-left: auto; margin-right: auto;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach

</body>
</html>
