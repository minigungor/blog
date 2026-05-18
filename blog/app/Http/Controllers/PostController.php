<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;

class PostController
{
    public function showPosts()
    {
        return view('posts.showPosts', PostModel::all());
    }

    public function showForm()
    {
        return view('posts.postForm');
    }

    public function addPost(Request $request, User $user)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
        ]);

        $post = PostModel::create([
           'title' => $validate['title'],
           'text' => $validate['text'],
            'user' => $user,
        ]);

        $post->save();

        return redirect()->action(
            [PostController::class, 'showPosts']
        );
    }
}
