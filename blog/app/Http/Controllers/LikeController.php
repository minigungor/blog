<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class LikeController extends Controller
{
    public function store(PostModel $post)
    {
        $post->likes()->syncWithoutDetaching(auth()->id());

        return back();
    }

    public function destroy(PostModel $post)
    {
        $post->likes()->detach(auth()->id());

        return back();
    }
}