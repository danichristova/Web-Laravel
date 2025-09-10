<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .task-done {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">To-Do-List</a>
            <div class="ms-auto">
                <a href="{{ route('tasks.create') }}" class="btn btn-light">Tambah Tugas</a>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center mb-4">Daftar Tugas</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Daftar Tugas --}}
        <div class="card shadow-sm">
            <div class="card-body">
                @if($tasks->count() > 0)
                    <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">

                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm {{ $task->is_done ? 'btn-success' : 'btn-outline-success' }}">
                                            ✓
                                        </button>
                                    </form>

                                    {{-- Judul dan Deskripsi --}}
                                    <div class="flex-fill mx-3">
                                        <strong class="{{ $task->is_done ? 'task-done' : '' }}">{{ $task->title }}</strong>
                                        <p class="mb-1 text-muted">{{ $task->description }}</p>
                                        <small class="text-secondary">
                                            Dibuat: {{ $task->created_at->format('d M Y H:i') }}
                                            @if($task->completed_at)
                                                | Selesai: {{ \Carbon\Carbon::parse($task->completed_at)->format('d M Y H:i') }}
                                            @endif
                                        </small>
                                    </div>

                                    {{-- Tombol selesai --}}
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm {{ $task->is_done ? 'btn-success' : 'btn-outline-success' }}">
                                            Selesai
                                        </button>
                                    </form>

                                    {{-- Tombol Edit --}}
                                    <form action="{{ route('tasks.updateDetail', $task->id) }}" method="POST" class="d-inline ms-2">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </form>

                                    {{-- Tombol Selesai --}}
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                @else
                    <p class="text-center text-muted">Belum ada tugas nih...<br>Klik <a
                            href="{{ route('tasks.create') }}">disini</a> untuk menambahkan tugas</p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>