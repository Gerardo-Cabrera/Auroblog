@extends('layouts.blog')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2> Posts más recientes </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($recentPosts as $post)
                <div class="col-lg-6 mb-4">
                    <div class="entry2">
                        <a href="{{ route('blog.post', ['slug' => $post->slug])}}"><img src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <h2><a href="{{ route('blog.post', ['slug' => $post->slug])}}"> {{ $post->title }} </a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <span class="d-inline-block mt-1"> Por: <a href="#"> {{ $post->user->name }} </a></span>
                                <span>&nbsp; - &nbsp; Publicado el: {{ $post->date }} </span>
                            </div>
                            <p> {{ Str::limit($post->content, 300) }}</p>
                            <p><a href="{{ route('blog.post', ['slug' => $post->slug])}}"> Leer más </a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            {{ $recentPosts->links() }}
        </div>
    </div>
</div>
@endsection