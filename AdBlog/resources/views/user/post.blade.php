@extends('user/app')


@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('subheading',$post->subtitle)

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('user/css/prism.css') }}">
@endsection()

@section('main-content')

 <!-- Post Content -->
 <!--1st facebook comment start-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=380768179271978&autoLogAppEvents=1"></script>
<!-- end commnets fb-->

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-offset-2 col-md-10 mx-auto">
          <small>Created at {{ $post->created_at->diffForHumans() }}</small>

            @foreach($post->categories as $category)
            <small class=" float-right" style="margin-right: 20px"> 
                <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
            </small>
            @endforeach()
            {!! htmlspecialchars_decode($post->body) !!}

            <!--Tag cloud.-->
            <h3>Tags clouds</h3>
            @foreach($post->tags as $tag)
            <a href="{{ route('tag',$tag->slug) }}"><small class="float-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px"> 
                {{ $tag->name }}
            </small></a>
            @endforeach()
        </div>
        <!--2nd comment scripts-->
        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

      </div>
    </div>
  </article>

  <hr>

@endsection()
@section('footer')
<script src="{{ asset('user/js/prism.js') }}"></script>
@endsection()