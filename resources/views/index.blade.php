<!DOCTYPE html>
<html>
<head>
    <title>Početna stranica</title>
</head>
<body style="text-align: center;">
    @include('partials.navbar')

    <h1 style="text-align: center;">Dobrodošao na Home komponentu u Laravelu!</h1>

    
        <a href="{{ url('/welcome') }}">
        <button>Povratak na Welcome</button>
    </a>
</body>
</html>
