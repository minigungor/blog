You welcome!
<form method="POST" action="/logout">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

<a href="{{route('posts.index')}}">posts</a>
<a href="{{route('posts.create')}}">add posts</a>
