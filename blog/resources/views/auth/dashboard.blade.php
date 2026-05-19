You welcome!
<form method="POST" action="/logout">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

<a href="/posts">posts</a>
<a href="/posts/{{auth()->user()->id}}">add posts</a>
