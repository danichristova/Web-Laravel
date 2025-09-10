<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Edit Tugas</h3>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Nama Tugas</label>
                <input type="text" id="title" name="title" class="form-control" 
                       value="{{ $task->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" id="is_done" name="is_done" class="form-check-input" 
                       {{ $task->is_done ? 'checked' : '' }}>
                <label for="is_done" class="form-check-label">Tandai selesai</label>
            </div>

            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">⬅ Kembali</a>
        </form>
    </div>
</body>
</html>
