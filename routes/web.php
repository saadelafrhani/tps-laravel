<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Initialize posts in session if not exists
Route::get('/init-posts', function () {
    $defaultPosts = [
        1 => [
            'id' => 1,
            'title' => 'Post 1',
            'author' => 'Auth 1',
            'content' => 'Content for post 1',
            'published_at' => '2025-01-01',
        ],
        2 => [
            'id' => 2,
            'title' => 'Post 2',
            'author' => 'Auth 2',
            'content' => 'Content for post 2',
            'published_at' => '2025-01-01',
        ],
        3 => [
            'id' => 3,
            'title' => 'Post 3',
            'author' => 'Auth 3',
            'content' => 'Content for post 3',
            'published_at' => '2025-01-01',
        ]
    ];

    if (!Session::has('posts')) {
        Session::put('posts', $defaultPosts);
    }

    return redirect('/posts');
});

// Static pages
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::post('/contact', function (Request $request) {
    // Add validation for contact form
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);
    
    return redirect()->back()->with('success', 'Thank you for your message!');
});

// Posts routes
Route::get('/posts', function () {
    if (!Session::has('posts')) {
        return redirect('/init-posts');
    }
    return view('posts.index', ['posts' => Session::get('posts')]);
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::post('/posts', function (Request $request) {
    // Add validation
    $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:100',
        'content' => 'required',
    ]);
    
    $posts = Session::get('posts') ?? [];
    $newId = !empty($posts) ? max(array_keys($posts)) + 1 : 1;
    
    $posts[$newId] = [
        'id' => $newId,
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'content' => $request->input('content'),
        'published_at' => date('Y-m-d'),
    ];
    
    Session::put('posts', $posts);
    return redirect('/posts')->with('success', 'Post created successfully!');
});

Route::get('/posts/{id}', function ($id) {
    $posts = Session::get('posts');
    if (!isset($posts[$id])) abort(404);
    return view('posts.show', ['post' => $posts[$id]]);
})->where('id', '[0-9]+');

Route::get('/posts/{id}/edit', function ($id) {
    $posts = Session::get('posts');
    if (!isset($posts[$id])) abort(404);
    return view('posts.edit', ['post' => $posts[$id]]);
})->where('id', '[0-9]+');

Route::put('/posts/{id}', function (Request $request, $id) {
    // Add validation
    $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:100',
        'content' => 'required',
    ]);
    
    $posts = Session::get('posts');
    if (!isset($posts[$id])) abort(404);
    
    $posts[$id] = [
        'id' => $id,
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'content' => $request->input('content'),
        'published_at' => $posts[$id]['published_at'],
    ];
    
    Session::put('posts', $posts);
    return redirect('/posts')->with('success', 'Post updated successfully!');
})->where('id', '[0-9]+');

Route::delete('/posts/{id}', function ($id) {
    $posts = Session::get('posts');
    if (!isset($posts[$id])) abort(404);
    unset($posts[$id]);
    Session::put('posts', $posts);
    return redirect('/posts')->with('success', 'Post deleted successfully!');
})->where('id', '[0-9]+');