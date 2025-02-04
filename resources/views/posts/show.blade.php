@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Post Details</h4>
                </div>

                <div class="card-body">
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <p class="lead">{{ $post->description }}</p>

                    <!-- Display image if it exists -->
                    @if($post->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="200" height="200">
                        </div>
                    @endif

                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
