@extends('layout')

@section('content')
<div class="container py-5">
    <div class="card border-purple-700 shadow-sm">
        <div class="card-header bg-purple-700 text-white py-3">
            <h1 class="h4 mb-0 text-black">{{ $post['title'] }}</h1>
        </div>
        <div class="card-body bg-light">
            <p class="text-muted mb-3">
                <span class="fw-medium text-dark">Author:</span> {{ $post['author'] }} | 
                <span class="fw-medium text-dark">Published:</span> {{ $post['published_at'] }}
            </p>
            <hr class="my-4">
            <div class="post-content text-dark">
                {{ $post['content'] }}
            </div>
        </div>
        <div class="card-footer bg-purple-100 py-3">
            <div class="d-flex flex-wrap gap-2">
                <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-outline-purple-700 text-purple-700">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <form action="/posts/{{ $post['id'] }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-purple-700 text-white" 
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
                </form>
                <a href="/posts" class="btn btn-outline-purple-700 text-purple-700">
                    <i class="bi bi-arrow-left me-1"></i> Back to all posts
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
