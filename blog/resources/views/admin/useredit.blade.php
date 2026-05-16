<form action="/admin/users/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{$user->name}}">
    <input type="text" name="email" value="{{$user->email}}">
    <input type="submit" value="save">
</form>

<form action="/admin/users/{{$user->id}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete">
</form>
