@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/select2/select2.min.css')}}">

@endsection()

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @include('admin.layouts.pageHead')
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
			
			   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Titles</h3>
            </div>
           <!-- @if (count($errors) > 0)
              @foreach($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
            @endif  or to write this code we can create a separate file and include it -->
           @include('includes.messages')
            <!-- form start -->
            <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">              
              {{ csrf_field() }}

              
              <div class="box-body">
              	<div class="col-md-6">  

              	<div class="form-group">
                  <label for="title">Post-Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>              
            
                <div class="form-group">
                  <label for="subtitle">Post-Sub-Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
                </div>
            
                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                </div>

              	</div>  

            <div class="col-md-6">
                <div class="form-group">
                  <div class="pull-right">
                  <label for="image">File input</label>
                  <input type="file" name="image" id="image">
                  </div>
                  <div class="checkbox" class="pull-left">
                    <label>
                  <input type="checkbox" name="status" value="1">Publish
                   
                    </label>
                  </div>
                </div>
              <br>
    
              <div class="form-group" style="margin-top:18px;">
                <label>Select Tags</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                  @foreach($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name}}</option>
                  @endforeach
                  </select>
              </div>  
                <!--for categories -->
              <div class="form-group" style="margin-top:18px;">
                <label>Select Categories</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                 @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                  </select>
              </div>  

              </div>
            	 
              </div>
              <!-- /.box-body -->
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Write Post
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
            
            </div>
          </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-round btn-success">Submit</button>
                <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>

              </div>
          </form>
            
          </div>
                   
          <!-- /.box -->

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection()

@section('footerSection')

<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<!--<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script> -->
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
    });
</script>
<script>
  
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>

@endsection()