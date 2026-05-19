<table>
    <thead>
        <tr>
            <th>UserName</th>
            <th>UserEmail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="/admin/users/{{$user->id}}">show</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
