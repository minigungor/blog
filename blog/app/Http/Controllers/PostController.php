<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;


class PostController
{

    public function index()
    {
        return view('posts.showPosts', [
            'posts' => PostModel::visible()
                ->with(['user', 'category', 'tags'])
                ->get()
        ]);

    }

    public function create()
    {
        return view('posts.postForm', [
            'post' => null,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validatePost($request);

        $validated['user_id'] = auth()->id();

        $post = PostModel::create($validated);


        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index');
    }

    public function show(PostModel $post)
    {
        $post->load([
            'user',
            'category',
            'tags',
        ]);

        return view('posts.showPost', [
            'post' => $post,
        ]);
    }

    public function edit(PostModel $post)
    {
        return view('posts.postForm', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function update(Request $request, PostModel $post)
    {
        $validated = $this->validatePost($request);

        $post->update($validated);

        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index');
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
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
            'category_id' => ['required','exists:category,id',],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);
    }

}
