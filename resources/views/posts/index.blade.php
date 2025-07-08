<!DOCTYPE html>
<html>
<head>
    <title>Lista postova</title>
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
    <button onclick="openCreateModal()">Dodaj novi post</button>

    <!-- Modal (za create i update) -->
    <div id="postModal" class="custom-modal-backdrop" style="display: none;">
        <div class="custom-modal-content">
            <h2 id="modalTitle">Dodaj novi post</h2>

            <form id="postForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <label for="title">Naslov</label><br>
                <input type="text" id="title" name="title" required><br><br>

                <label for="content">Sadržaj</label><br>
                <textarea id="content" name="content" rows="4" required></textarea><br><br>

                <button type="submit">Sačuvaj</button><br>
                <button style="margin-top:3%" type="button" onclick="closePostModal()">Otkaži</button>
            </form>
        </div>
    </div>

    <!-- Lista postova -->
    @foreach ($posts as $post)
        <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc; text-align: left; max-width: 600px; margin-left: auto; margin-right: auto;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <button style="margin-bottom: 3%" onclick="openDeleteModal({{ $post->id }})">Obriši post</button><br>
            <button style="margin-bottom: 3%" onclick="openEditModal({{ $post->id }}, '{{ addslashes($post->title) }}', '{{ addslashes($post->content) }}')">Izmijeni</button>
        </div>
    @endforeach

    <!-- Modal za potvrdu brisanja -->
    <div id="deleteModal" class="custom-modal-backdrop" style="display: none;">
        <div class="custom-modal-content">
            <h2>Da li želite obrisati post?</h2>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">Da, obriši</button><br>
                <button type="button" onclick="closeDeleteModal()" style="margin-top:3%;">Otkaži</button>
            </form>
        </div>
    </div>

    <!-- JS logika -->
    <script>
        function openCreateModal() {
            document.getElementById('modalTitle').innerText = 'Dodaj novi post';
            document.getElementById('postForm').action = '/posts';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('title').value = '';
            document.getElementById('content').value = '';
            document.getElementById('postModal').style.display = 'flex';
        }

        function openEditModal(postId, title, content) {
            document.getElementById('modalTitle').innerText = 'Izmijeni post';
            document.getElementById('postForm').action = `/posts/${postId}`;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('title').value = title;
            document.getElementById('content').value = content;
            document.getElementById('postModal').style.display = 'flex';
        }

        function closePostModal() {
            document.getElementById('postModal').style.display = 'none';
        }

        function openDeleteModal(postId) {
            const form = document.getElementById('deleteForm');
            form.action = `/posts/${postId}`;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
</body>
</html>
