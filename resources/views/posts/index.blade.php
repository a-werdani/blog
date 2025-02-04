@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">All Posts</h1>
        <div class="text-center mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-lg">Create New Post</a>
        </div>
        
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm rounded border-0">
                        <!-- Responsive image with fixed size 350x350 -->
                        <img 
                            src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default-thumbnail.jpg') }}" 
                            class="card-img-top img-fluid" 
                            alt="Post Image" 
                            width="350" 
                            height="350"
                        >
                        <div class="card-body">
                            <h4 class="card-title text-primary">{{ $post->title }}</h4>
                            <p class="card-text text-muted">{{ \Str::limit($post->description, 100) }}</p>
                            
                            <!-- Buttons with slightly reduced width -->
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn w-20">View</a>
                                
                                @if(Auth::id() == $post->user_id)
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn w-20">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn w-20">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
