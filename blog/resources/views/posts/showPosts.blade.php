<div class="posts">
    @foreach($posts as $post)
        <div class="post">
            <h6>{{$post->user->name}}</h6>
            <h5>{{$post->created_at}}</h5>
            <h3>{{$post['title']}}</h3>
            <p>{{$post['text']}}</p>
        </div>
    @endforeach
</div>
<style>
    .posts {
        display: flex;
        flex-direction: column;
    }

    .post {
        display: inline-block;
        border: 1px solid black;

        padding: 15px;

        margin-bottom: 15px;

        border-radius: 8px;
    }

</style>
