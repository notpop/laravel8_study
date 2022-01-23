<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostSaveRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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

    public function store(PostSaveRequest $request) {
        $data = $request->validated();

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('posts', 'public');
        }

        $request->user()->posts()->create($data);

        return redirect(route('mypage'))->with('message', '新規作成しました。');
    }

    public function edit(Post $post, Request $request) {
        if ($request->user()->isNot($post->user)) {
            abort(403);
        }

        $data = old();
        if (empty($data)) {
            $data = $post;
        }

        return view('mypage.post.edit',[
            'post' => $data
        ]);
    }

    public function update(Post $post, PostSaveRequest $request) {
        if ($request->user()->isNot($post->user)) {
            abort(403);
        }

        $data = $request->validated();

        if ($request->hasFile('picture')) {
            $post->deletePictureFile();
            $data['picture'] = $request->file('picture')->store('posts', 'public');
        }

        $post->update($data);

        return redirect(route('mypage'))->with('message', '更新しました。');
    }

    public function destroy(Post $post, Request $request) {
        if ($request->user()->isNot($post->user)) {
            abort(403);
        }

        $post->delete();

        return redirect(route('mypage'))->with('message', '削除しました。');
    }
}
