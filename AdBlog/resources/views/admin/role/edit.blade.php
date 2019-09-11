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
              <h3 class="box-title">Edit Roles</h3>
            </div>
           <!-- @if (count($errors) > 0)
              @foreach($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
            @endif -->
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('role.update',$role->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="box-body">
                <div class="col-md-offset-3 col-md-6">  

                        <div class="form-group">
                          <label for="name">Role Title</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Role Title" value="{{ $role->name }}">
                        </div>

                        <div class="row">
                                <div class="col-lg-4">
                                  <label for="name">Posts Permissions</label>
                                  @foreach ($permissions as $permission)
                                    @if ($permission->for == 'post')
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                        @foreach ($role->permissions as $role_permit)
                                          @if ($role_permit->id == $permission->id)
                                            checked
                                          @endif
                                        @endforeach
                                        >{{ $permission->name }}</label>
                                      </div>
                                    @endif
                                  @endforeach
                                </div>
                                <div class="col-lg-4">
                                  <label for="name">User Permissions</label>
                                    @foreach ($permissions as $permission)
                                      @if ($permission->for == 'user')
                                        <div class="checkbox">
                                          <label><input type="checkbox" name='permission[]' value="{{ $permission->id }}"
                                          @foreach ($role->permissions as $role_permit)
                                            @if ($role_permit->id == $permission->id)
                                              checked
                                            @endif
                                          @endforeach
                                          >{{ $permission->name }}</label>
                                        </div>
                                      @endif
                                    @endforeach
                                </div>

                                <div class="col-lg-4">
                                  <label for="name">User Permissions</label>
                                    @foreach ($permissions as $permission)
                                      @if ($permission->for == 'other')
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                          @foreach ($role->permissions as $role_permit)
                                            @if ($role_permit->id == $permission->id)
                                              checked
                                            @endif
                                          @endforeach
                                          >{{ $permission->name }}</label>
                                        </div>
                                      @endif
                                    @endforeach
                                </div>
                              </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-round btn-success">Submit</button>
                        <a href="{{route('role.index')}}" class="btn btn-warning">Back</a>

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