@extends('layout')

@section('title', 'EditUser')

@section('content')

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        <button type="submit">
            Save
        </button>
    </form>

    <form action="{{ route('users.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>
    </form>

@endsection
