@extends('layout')

@section('title', $post->title)

@section('content')
	<h1>{{ $post->title }}</h1>
	<h2>{{$post->user->name}}</h2>
	<h3>{{ $post->created_at->format('d.m.Y H:i') }}</h3>
	<h5>{{ $post->category->category }}</h5>
	<p>{{ $post->text }}</p>
	<p>{{ $post->likes()->count() }} likes</p>
    @foreach($post->tags as $tag)
        <span>{{ $tag->name }}</span>
    @endforeach
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
@endsection