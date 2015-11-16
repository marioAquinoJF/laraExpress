@extends('app')

@section('content')
<h1>Blog</h1>
@foreach($posts as $post)
    <h2>{{ $post->title }} <i>{{ $post->created_at }}</i></h2>
    <p>{{$post->content }}</p>
    <h2>Tags</h2>
    <ul>
    @foreach($post->tags as $t)
        <li> 
            {{ $t->name }}
        </li>
    @endforeach
    </ul>
    <h2>Comments</h2>
    @foreach($post->comments as $c)
        <div> 
            <p>{{ $c->name }}</p>
            <p>{{ $c->content }}</p>
        </div>
    @endforeach
    <hr/>
@endforeach
@endsection