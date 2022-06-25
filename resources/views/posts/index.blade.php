@extends('layouts.app')


@section('content')
<h1>All Posts</h1>

    @foreach ($posts as $post)
        <a href="{{ url('/posts', $post->id) }}"><h2>{{ $post->title }}</h2></a>
        <p>{{ $post->description }}</p>
        <a href="{{ url('/posts', $post->id) }}/edit"><h4>Edit</h4></a>
    @endforeach
    {{ $posts->links() }}

@endsection
