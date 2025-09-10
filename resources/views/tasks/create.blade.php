<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('tasks.index') }}">To-Do-List</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center mb-4">Tambah Tugas Baru</h3>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Tugas</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Nama tugas..." required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Deskripsi tugas..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Tugas</button>
        </form>
    </div>
</body>
</html>
