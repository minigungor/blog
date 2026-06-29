@extends('layout')

@section('title', 'tags')

@section('content')
<div class="container">
    <h1>Теги</h1>

    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">
        Создать тег
    </a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>

        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>

                <td>
                    <a href="{{ route('tags.edit', $tag) }}"
                       class="btn btn-warning btn-sm">
                        Редактировать
                    </a>

                    <form action="{{ route('tags.destroy', $tag) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection