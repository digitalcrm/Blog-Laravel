@extends('admin.layouts.app')

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
            @endif -->
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('tag.store') }}" method="post">
              {{ csrf_field() }}
                <div class="box-body">
              	<div class="col-md-offset-3 col-md-6">  

                      	<div class="form-group">
                          <label for="name">Tag Title</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Tag Title">
                        </div>              
                    
                        <div class="form-group">
                          <label for="slug">Post Slug</label>
                          <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-round btn-success">Submit</button>
                        <a href="{{route('tag.index')}}" class="btn btn-warning">Back</a>

                       	</div>

              	</div>    

            	 </div>

              </form>
            	 
          </div>
              <!-- /.box-body -->            
       </div>                   
      <!-- /.box -->
     </div>
        <!-- /.col-->
  </section>

</div>
@endsection()