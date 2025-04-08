@extends('layout')

@section('content')
<div class="container py-5">
    <div class="card border-gray-300 shadow-sm">
        <div class="card-header bg-gray-800 text-black py-3">
            <h1 class="h4 mb-0">{{ $post['title'] }}</h1>
        </div>
        <div class="card-body bg-gray-50">
            <p class="text-gray-600 mb-3">
                <span class="fw-medium">Author:</span> {{ $post['author'] }} | 
                <span class="fw-medium">Published:</span> {{ $post['published_at'] }}
            </p>
            <hr class="border-gray-300 my-4">
            <div class="post-content text-gray-700">
                {{ $post['content'] }}
            </div>
        </div>
        <div class="card-footer bg-white py-3">
            <div class="d-flex flex-wrap gap-2">
                <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-outline-gray-700">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <form action="/posts/{{ $post['id'] }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark" 
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
                </form>
                <a href="/posts" class="btn btn-outline-gray-700">
                    <i class="bi bi-arrow-left me-1"></i> Back to all posts
                </a>
            </div>
        </div>
    </div>
</div>
@endsection