
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
