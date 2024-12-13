@extends('template.layout')

@section('content')
<div class="container px-4 py-5">
    <h1>Edit Task</h1>

    <form action="/todos/{{$todos->id}}" method="POST">
        @csrf
        @method('PUT')
        <!-- Title Field -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Task</label>
            <input
                name="item"
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="Enter blog title"
                value="{{$todos->item}}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
