@extends('layout')

@section('title', 'Посты')

@section('content')

    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
                <h6>{{$post->user->name}}</h6>
                <h5>{{ $post->created_at->format('d.m.Y H:i') }}</h5>
                <h3>{{ $post->title }}</h3>
                <h5>{{ $post->category->category }}</h5>
                <p>{{ $post->text }}</p>
                <a href="{{ route('posts.show', $post) }}">view post</a>
                <a href="{{ route('posts.edit', $post) }}">edit post</a>     
                <p>{{ $post->likes->count() }} likes</p>

                <form action="{{ route('likes.store', $post) }}" method="POST">
                    @csrf
                    <button type="submit">
                        Like
                    </button>
                </form>

                <form action="{{ route('likes.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Dislike
                    </button>
                </form>

            </div>
        @endforeach
    </div>
    <style>
        .posts {
            display: flex;
            flex-direction: column;
        }

        .post {
            display: inline-block;
            border: 1px solid black;

            padding: 15px;

            margin-bottom: 15px;

            border-radius: 8px;
        }

    </style>

@endsection