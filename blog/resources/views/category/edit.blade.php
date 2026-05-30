@extends('layout')

@section('title', 'EditCategory')

@section('content')
    <form action="{{ $category ? route('category.update', $category) : route('category.store') }}" method="POST">
        @csrf

        @if($category)
            @method('PUT')
        @endif

        <input type="text" name="category" value="{{old('category', $category?->category)}}">
        <button type="submit">
            {{ $category ? 'Update' : 'Create' }}
        </button>
    </form>

    @if($category)
        <form action="{{route('category.destroy', $category)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">
                Delete
            </button>
        </form>
    @endif


@endsection