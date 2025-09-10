<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">To-Do-List</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h3 class="mb-4">Edit Tugas</h3>

        <form action="{{ route('tasks.updateDetail', $task->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Nama Tugas</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="form-control">{{ $task->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">⬅ Kembali</a>
        </form>
    </div>
</body>

</html>