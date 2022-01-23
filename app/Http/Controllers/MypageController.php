<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index(Request $request) {
        $posts = $request->user()->posts;

        return view('mypage.index',[
            'posts' => $posts,
        ]);
    }

    public function create() {
        return view('mypage.post.create');
    }
}
