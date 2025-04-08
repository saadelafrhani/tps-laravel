@extends('layout')

@section('content')
<div class="container py-5">
    <h2 class="text-dark mb-4">Create New Post</h2>
    
    @if ($errors->any())
        <div class="alert alert-dark text-white mb-4">
            <h5 class="alert-heading">Please fix these errors:</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/posts" method="POST" class="bg-light p-4 rounded">
        @csrf
        <div class="mb-4">
            <label for="title" class="form-label text-dark fw-medium">Title</label>
            <input type="text" id="title" name="title" class="form-control bg-white border-gray-300" 
                   value="{{ old('title') }}" required>
        </div>
        
        <div class="mb-4">
            <label for="author" class="form-label text-dark fw-medium">Author</label>
            <input type="text" id="author" name="author" class="form-control bg-white border-gray-300" 
                   value="{{ old('author') }}" required>
        </div>
        
        <div class="mb-4">
            <label for="content" class="form-label text-dark fw-medium">Content</label>
            <textarea id="content" name="content" class="form-control bg-white border-gray-300" 
                      rows="5" required>{{ old('content') }}</textarea>
        </div>
        
        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-dark">Submit</button>
            <a href="/posts" class="btn btn-outline-dark">Cancel</a>
        </div>
    </form>
</div>
@endsection