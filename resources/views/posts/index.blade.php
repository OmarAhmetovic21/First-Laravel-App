<!DOCTYPE html>
<html>
<head>
    <title>Lista postova</title>
    <!-- Bootstrap 5 CSS -->

</head>
<body style="text-align: center;">
    @include('partials.navbar')
    @if (session('success'))
    <div class="alert alert-success text-center mt-3">
        {{ session('success') }}
    </div>
@endif

    <h1>Lista postova</h1>

<!-- Dugme za otvaranje modala -->
<button onclick="openModal()">Dodaj novi post</button>

<!-- Modal -->
<div id="customModal" class="custom-modal-backdrop">
  <div class="custom-modal-content">
    <h2>Dodaj novi post</h2>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <label for="title">Naslov</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Sadržaj</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>

        <button type="submit">Sačuvaj</button> <br>
        <button style="margin-top:3%" type="button" onclick="closeModal()">Otkaži</button>
    </form>
  </div>
</div>


    @foreach ($posts as $post)
        <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc; text-align: left; max-width: 600px; margin-left: auto; margin-right: auto;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <button style="margin-bottom:3%" type="button">Obriši post</button>
        </div>
    @endforeach
<!-- Bootstrap 5 JS -->
<script>
function openModal() {
    document.getElementById('customModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('customModal').style.display = 'none';
}
</script>


</body>
</html>
