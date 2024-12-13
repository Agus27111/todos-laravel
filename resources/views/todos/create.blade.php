@extends('template.layout')

@section('content')
<div class="container px-4 py-5">
    <h1>Create New Task</h1>

    <form action="/todos" method="POST">
        @csrf
        <!-- Title Field -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Task</label>
            <input
                name="item"
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="Enter blog title">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
