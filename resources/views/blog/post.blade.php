@extends('layouts.blog')

@section('content')
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ $post->image }}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="post-entry text-center">
            <h1 class="mb-4"><a href="#"> {{ $post->title}} </a></h1>
            <div class="post-meta align-items-center text-center">
              <span class="d-inline-block mt-1"> Por: {{ $post->user->name }} </span>
              <span>&nbsp; - &nbsp; Publicado el: {{ $post->date }} </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <section class="site-section py-lg">
    <div class="container">
      <div class="row blog-entries element-animate">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="post-content-body">
            <p> {{ $post->content }} </p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection