<form action="/admin/{{$user->email}}" method="POST">
    @csrf
    <input type="text" name="name" value="{{$user->name}}">
    <input type="text" name="email" value="{{$user->email}}">
    <input type="submit" value="save">
    <input type="button" value="delete">
</form>
