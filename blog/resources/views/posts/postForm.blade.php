@extends('layout')

@section('title', $post ? $post->text : 'Создать пост')


@section('content')

<form action="{{ $post ? route('posts.update', $post) : route('posts.store')}}" method="POST" >
    @csrf

    @if($post)
        @method('PUT')
    @endif

    <input
        type="text"
        name="title"
        value="{{ old('title', $post?->title) }}"
    >

    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $post?->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->category }}
            </option>
        @endforeach
    </select>

    <select name="tags[]" multiple>
        @foreach($tags as $tag)
            <option
                value="{{ $tag->id }}"
                {{ $post && $post->tags->contains($tag->id) ? 'selected' : '' }}
            >
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    <textarea name="text" cols="30" rows="10">{{ old('text', $post?->text) }}</textarea>

    <button type="submit">
        {{ $post ? 'Update' : 'Create' }}
    </button>
</form>

@isset($post)
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>
    </form>
@endisset

@endsection
