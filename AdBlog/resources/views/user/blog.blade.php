@extends('user/app')


@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','digitalCRM')
@section('subheading','Never give up')
@section('head')
  <style>
      .fa-thumbs-u:hover{
        color:red;
      }
  </style>
@endsection

@section('main-content')

<!-- Main Content -->
  <div class="container">
    <div class="row" id="app">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach ($posts as $post)
        <div class="post-preview">
          <a href="{{ route('post',$post->slug) }}"> <!-- link with post page -->
            <h2 class="post-title">
              {{ $post->title }}
            </h2>
            <h3 class="post-subtitle">
              {{ $post->subtitle }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Welcome TO Blog</a>{{ $post->created_at->diffForHumans() }}
            <a href="">
              <small>1</small>
              <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
          </p>
        </div>
        @endforeach() 
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          {{ $posts->links() }}
          
          
        </div>
      </div>
    </div>
  </div>

  <hr>

@endsection()