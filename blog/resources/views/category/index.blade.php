@extends('layout')

@section('title', 'Categories')

@section('content')

    <a href="{{ route('category.create') }}">Create Category</a>

    @foreach($categories as $category)
        <span>
            <h1>{{$category->category}}</h1>
            <a href="{{ route('category.edit', $category) }}">Edit</a>
            <a href="{{ route('category.show', $category) }}">Show</a>
        </span>
    @endforeach

@endsection