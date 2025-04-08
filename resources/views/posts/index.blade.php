@extends('layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-dark fw-bold">Posts</h2>
    
    
    <a href="/posts/create" class="btn btn-dark mb-4">
        Create New Post
    </a>
    
    
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <a href="/posts/{{ $post['id'] }}" class="text-blue-600 text-decoration  fw-medium  ">
                                {{ $post['title'] }}
                            </a>
                        </td>
                        <td class="text-secondary">{{ $post['author'] }}</td>
                        <td class="text-secondary">{{ \Illuminate\Support\Str::limit($post['content'], 50) }}</td>
                        <td class="text-secondary">{{ $post['published_at'] }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-sm btn-secondary">
                                    Edit
                                </a>
                                <form action="/posts/{{ $post['id'] }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-dark"
                                            onclick="return confirm('Are you sure you want to delete this post?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   
</div>
@endsection