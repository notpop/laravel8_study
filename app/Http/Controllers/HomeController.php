<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::with('user')
            ->withCount('comments')
            ->onlyNotDelete()
            ->orderByDesc('comments_count')
            ->latest('updated_at')
            ->get();

        return view('home', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post) {
        if ($post->is_delete) {
            abort(403);
        }

        return view('post.show', [
            'post' => $post
        ]);
    }
}
