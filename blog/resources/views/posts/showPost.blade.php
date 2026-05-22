<h1>{{ $post->title }}</h1>
<h2>{{$post->user->name}}</h2>
<h3>{{ $post->created_at->format('d.m.Y H:i') }}</h3>
<h5>{{ $post->category->category }}</h5>
<p>{{ $post->text }}</p>
