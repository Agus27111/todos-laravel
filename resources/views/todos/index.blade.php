@extends('template.layout')

@section('content')
<div class="container px-4 py-5" id="todo-app">


    <form action="/todos" method="get">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="form-control">
    </form>

    <!-- Tombol Create Task -->
    <div class="mb-4 text-start mt-4">
        <a href="{{ route('todos.create') }}" class="btn btn-primary">
            Create
        </a>
    </div>

    <!-- Tabel Todo List -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Task</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $index => $todo)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $todo->item }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="/todos/{{ $todo->id }}/edit" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <!-- Tombol Delete -->
                    <form action="/todos/{{ $todo->id }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $todos->links() }}

</div>
@endsection
