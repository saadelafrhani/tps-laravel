<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    private function getPosts()
    {
        return Session::get('posts') ?? [];
    }

    private function savePosts($posts)
    {
        Session::put('posts', $posts);
    }

    public function initPosts()
    {
        if (!Session::has('posts')) {
            $this->savePosts([
                1 => ['id' => 1, 'title' => 'Post 1', 'author' => 'saad', 'content' => 'Pc', 'published_at' => '2025-01-01'],
                2 => ['id' => 2, 'title' => 'Post 2', 'author' => 'salah', 'content' => '33', 'published_at' => '2025-01-01'],
                3 => ['id' => 3, 'title' => 'Post 3', 'author' => 'houssam', 'content' => 'tracer', 'published_at' => '2025-01-01'],
            ]);
        }
        return redirect('/posts');
    }

    public function index()
    {
        return Session::has('posts') ? view('posts.index', ['posts' => $this->getPosts()]) : redirect('/init-posts');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'content' => 'required',
        ]);

        $posts = $this->getPosts();
        $id = $posts ? max(array_keys($posts)) + 1 : 1;
        $data['id'] = $id;
        $data['published_at'] = date('Y-m-d');

        $posts[$id] = $data;
        $this->savePosts($posts);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $posts = $this->getPosts();
        abort_if(!isset($posts[$id]), 404);
        return view('posts.show', ['post' => $posts[$id]]);
    }

    public function edit($id)
    {
        $posts = $this->getPosts();
        abort_if(!isset($posts[$id]), 404);
        return view('posts.edit', ['post' => $posts[$id]]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'content' => 'required',
        ]);

        $posts = $this->getPosts();
        abort_if(!isset($posts[$id]), 404);

        $data['id'] = $id;
        $data['published_at'] = $posts[$id]['published_at'];
        $posts[$id] = $data;

        $this->savePosts($posts);
        return redirect('/posts')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $posts = $this->getPosts();
        abort_if(!isset($posts[$id]), 404);
        unset($posts[$id]);
        $this->savePosts($posts);
        return redirect('/posts')->with('success', 'Post deleted successfully!');
    }
}