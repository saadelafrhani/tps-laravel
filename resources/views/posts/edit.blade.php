@extends('layout')

@section('content')
<div class="container py-5">
    <h2 class="text-black mb-4 fw-bold">Edit Post</h2>
    
    @if ($errors->any())
        <div class="alert" style="background-color: #1a1a1a; color: #fff;">
            <h5 class="alert-heading">Please fix these errors:</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/posts/{{ $post['id'] }}" method="POST" class="p-4 rounded" style="background-color: #f3f0ff;">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="form-label text-black fw-medium">Title</label>
            <input type="text" id="title" name="title" class="form-control border-dark-subtle" 
                   value="{{ old('title', $post['title']) }}" required>
        </div>
        
        <div class="mb-4">
            <label for="author" class="form-label text-black fw-medium">Author</label>
            <input type="text" id="author" name="author" class="form-control border-dark-subtle" 
                   value="{{ old('author', $post['author']) }}" required>
        </div>
        
        <div class="mb-4">
            <label for="content" class="form-label text-black fw-medium">Content</label>
            <textarea id="content" name="content" class="form-control border-dark-subtle" 
                      rows="5" required>{{ old('content', $post['content']) }}</textarea>
        </div>
        
        <div class="d-flex gap-3">
            <button type="submit" class="btn" style="background-color: #6f42c1; color: white;">Update</button>
            <a href="/posts" class="btn btn-outline-dark">Cancel</a>
        </div>
    </form>
</div>
@endsection
