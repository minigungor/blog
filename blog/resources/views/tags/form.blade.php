@extends('layout')

@section('title', 'editTag')

@section('content')
<div class="container">

    <h1>
        {{ $tag ? 'Редактирование тега' : 'Создание тега' }}
    </h1>

    <form action="{{ $tag
        ? route('tags.update', $tag)
        : route('tags.store') }}"
        method="POST">

        @csrf

        @if($tag)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">
                Название
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $tag->name ?? '') }}"
            >

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-success">
            Сохранить
        </button>
    </form>

</div>
@endsection