@foreach($posts as $post)
    <div class="post">
        <h6>{{$post['user']}}</h6>
        <h3>{{$post['title']}}</h3>
        <p>{{$post['text']}}</p>
    </div>
@endforeach
