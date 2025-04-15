@extends('layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-black fw-bold">Posts</h2>

    <a href="/posts/create" class="btn btn-purple mb-4" style="background-color: #6f42c1; color: #fff;">
        Create New Post
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover border-2 border-black">
            <thead style="background-color: #1a1a1a; color: #fff;">
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
                <tr style="background-color: #f9f5ff;">
                    <td>
                        <a href="/posts/{{ $post['id'] }}" class="text-purple fw-medium text-decoration-none">
                            {{ $post['title'] }}
                        </a>
                    </td>
                    <td class="text-dark">{{ $post['author'] }}</td>
                    <td class="text-dark">{{ \Illuminate\Support\Str::limit($post['content'], 50) }}</td>
                    <td class="text-dark">{{ $post['published_at'] }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-sm" style="background-color: #6f42c1; color: #fff;">
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
