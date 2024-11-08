  <!-- Content Wrapper. Contains page content -->

  @extends('layouts.app')
  @section('content')
  
   


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1>Assign Subject list</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
          <a href="{{ url('admin/assign_subject/add')  }}" class="btn btn-primary">Assign new subject </a>
            
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    

    <!-- Main content -->
    <section class="content">
      
      
    <div class="card-body" >
    <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search List </h3>
              </div>
           
              <form method="get" action="">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label >Class Name</label>
                    <input type="text" class="form-control" value="{{Request::get('name')}}" name="class_name" placeholder="Enter Class Name">
                  </div>

                  <div class="form-group col-md-3">
                    <label >Subject Name</label>
                    <input type="text" class="form-control" value="{{Request::get('name')}}" name="subject_name" placeholder="Enter Subject Name">
                  </div>
                   
                </div>
                <div class="form-group col-md-3">
                  <button class="btn btn-primary" type="submit" >Search</button>
                  <a href="{{ url('admin/assign_subject/list')}}" class="btn btn-success">Clear</a>
                </div>
                 </form>
            </div>
            <!-- /.card -->

     
            <!-- /.card -->

            <!-- Input addon -->

          
            <!-- /.card -->
</div>

          </div>
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->
    <div class="card-body">@include('message')</div>
</div>
              
              

            <div class="card">
            

              <div class="card-header">
                <h3 class="card-title">Subjecct List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th >Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->subject_name}}</td>
                      <td>
                        @if($value->status == 0)
                        Active
                        @else
                        Inactive
                        @endif
                      </td>
                      <td>{{$value->created_by_name}}</td>
                      <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                      
                      <td>
                        <a href="{{ url('admin/assign_subject/edit/'.$value->id )}}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/assign_subject/edit_single/'.$value->id )}}" class="btn btn-primary">Edit_Single</a>
                        <a href="{{ url('admin/assign_subject/delete/'.$value->id )}}" class="btn btn-danger">Delete</a>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                <div style="padding: 10px; float:right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

  @endsection