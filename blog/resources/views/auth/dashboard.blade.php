@use App\Http\Controllers\PostController
@end
You welcome!
<form method="POST" action="/logout">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>
<a href="{{redirect()->action([PostController::class, 'showPosts'])}}">Posts</a>
<a href="{{redirect()->action([PostController::class, 'showForm'])}}">AddPosts</a>

