<h1>{{$post->title}}</h1>
<a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
<br>
<div>Written by: <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a></div>
<p>{{$post->body}}</p>

