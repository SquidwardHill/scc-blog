<x-layout>
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {!! $post->title !!}
                </a>
            </h1>
{{--            N+1 problem, accessing relationship that hasn't been loaded, so performing an additional sql query for each item in the loop.--}}
            <p>Category: <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
            <div>Written by: <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a></div>
            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
