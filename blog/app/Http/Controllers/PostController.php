<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController
{

    public function index()
    {
        return view('posts.showPosts', [
            'posts' => PostModel::visible()
                ->with(['user', 'category'])
                ->get(),
        ]);
    }

    public function create()
    {
        return view('posts.postForm', [
            'post' => null,
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validatePost($request);

        $validated['user_id'] = auth()->id();

        PostModel::create($validated);

        return redirect()->route('posts.index');
    }

    public function show(PostModel $post)
    {
        return view('posts.showPost', [
            'post' => $post,
        ]);
    }

    public function edit(PostModel $post)
    {
        return view('posts.postForm', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(PostModel $post, Request $request)
    {
        $validate = $this->validatePost($request);
        $post->update($validate);

        return redirect()->action(
            [PostController::class, 'index']
        );
    }

    public function destroy(PostModel $post)
    {
        $post->delete();

        return redirect()->action(
            [PostController::class, 'index']
        );
    }

    public function validatePost(Request $request)
    {
        return $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required|exists:category,id',
        ]);
    }

}
