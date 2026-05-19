<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;

class PostController
{
    public function showPosts()
    {
        return view('posts.showPosts', [
            'posts' => PostModel::all(),
        ]);
    }

    public function showForm(User $user)
    {
        return view('posts.postForm', [
            'user' => $user,
        ]);
    }

    public function addPost(Request $request, User $user)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
        ]);

        $post = new PostModel([
           'title' => $validate['title'],
           'text' => $validate['text'],
            'user_id' => auth()->id(),
        ]);

        $post->save();

        return redirect()->action(
            [PostController::class, 'showPosts']
        );
    }
}
