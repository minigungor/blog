@foreach($categories as $category)
    <span>
        <h1>{{$category->category}}</h1>
        <a href="{{route('category.edit', $category->id) }}">Edit</a>
        <a href="{{route('category.show', $category->id) }}">Show</a>
    </span>
@endforeach
