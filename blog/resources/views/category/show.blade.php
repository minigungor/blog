@extends('layout')

@section('title', $category->category)

@section('content')

<h1>{{$category->category}}</h1>
<a href="{{ route('category.edit', $category) }}">Edit</a>

@endsection