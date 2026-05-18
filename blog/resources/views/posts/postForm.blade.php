<form action="/posts/{{$user->id}}" method="POST">
    @csrf

    <input type="text" name="title" >
    <textarea name="text" cols="30" rows="10"></textarea>
    <input type="submit">

</form>
