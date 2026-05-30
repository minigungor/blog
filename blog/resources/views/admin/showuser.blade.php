@extends('layout')

@section('title', $user->name)

@section('content')
    <h1>{{$user->name}}</h1>
    <h2>{{$user->id}}</h2>
    <h3>{{$user->email}}</h3>

    <a href="{{ route('users.edit', $user) }}">
        Edit
    </a>
@endsection
