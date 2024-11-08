  <!-- Content Wrapper. Contains page content -->

  @extends('layouts.app')
  @section('content')
  
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
             
           
              <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">

                <div class="row">
                <div class="form-group col-md-6">
                    <label >First Name <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('name' , $getRecord->name)}}" name="name" placeholder="Enter First Name" required>
                  </div>
                
                <div class="form-group col-md-6">
                    <label >Last Name <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('last_name' , $getRecord->last_name)}}" name="last_name" placeholder="Enter Last Name" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Admission number <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('admission_number' , $getRecord->admission_number)}}" name="admission_number" placeholder="Enter Admission number" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Roll number <span  </label>
                    <input type="text" class="form-control" value="{{old('roll_number' , $getRecord->roll_number)}}" name="roll_number" placeholder="Enter Roll number">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Class <span  style="color:red;">*</span></label>
                    <select class="form-control" name="class_id"  required>
                        <option value="">Select Class</option>
                        @foreach($getClass as $value)
                            <option {{(old('class_id', $getRecord-> class_id) == $value->id) ? 'selected':''}} value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label >Gender <span  style="color:red;">*</span></label>
                    <select class="form-control" name="gender"  required>
                        <option  value="">Select Gender</option>
                        <option  {{(old('gender', $getRecord-> gender) == 'Male') ? 'selected':''}} value="Male">Male</option>
                        <option {{(old('gender', $getRecord-> gender) == 'Female') ? 'selected':''}} value="Female">Female</option>
                        <option {{(old('gender', $getRecord-> gender) == 'Other') ? 'selected':''}} value="Other">Other</option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label >Date of Birth <span  style="color:red;">*<span  </label>
                    <input type="date" class="form-control" value="{{old('date_of_birth',  $getRecord->date_of_birth)}}" name="date_of_birth" >
                  </div>
                  <div class="form-group col-md-6">
                    <label >Caste <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('caste'  ,  $getRecord->caste)}}" name="caste" placeholder="Enter Caste">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Religion </label>
                    <input type="text" class="form-control" value="{{old('religion' ,  $getRecord->religion)}}" name="religion" placeholder="Enter Religion">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Mobile <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('mobile_number'  ,  $getRecord->mobile_number)}}" name="mobile_number" placeholder="Enter mobile">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Admission Date <span  style="color:red;">*</span></label>
                    <input type="date" class="form-control" value="{{old('admission_date' ,  $getRecord->admission_date)}}" name="admission_date" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Profile pic </span></label>
                    <input type="file" class="form-control"  name="profile_pic" >
                    @if(!empty($getRecord->getProfile()))
                    <img src="{{$getRecord->getProfile()}}" style="width: auto;height:50px;">
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label >ssc percentage <span  style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{old('sscpercentage' ,  $getRecord->sscpercentage)}}" name="sscpercentage" placeholder= "hsscpercentage">
                  </div>

                  <div class="form-group col-md-6">
                    <label >SSC Marksheet </span></label>
                    <input type="file" class="form-control"  name="sscmarksheet" >
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label >hssc percentage <span  style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{old('hsscpercentage' ,  $getRecord->hsscpercentage)}}" name="hsscpercentage" placeholder= "hsscpercentage">
                   
                </div>

                  <div class="form-group col-md-6">
                    <label >HSSC Marksheet </span></label>
                    <input type="file" class="form-control"  name="hsscmarksheet" >
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label >graduationpercentage <span  style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{old('graduationpercentage' ,  $getRecord->graduationpercentage)}}" name="graduationpercentage" placeholder= "weight" >
                  </div>

                  <div class="form-group col-md-6">
                    <label >Graduation Marksheet</span></label>
                    <input type="file" class="form-control"  name="graduationmarksheet" >
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label >Status <span  style="color:red;">*</span></label>
                    <select class="form-control" name="status" id="" required>
                        <option value="">Select Status</option>
                        <option {{(old('status', $getRecord-> status) == 0) ? 'selected':''}} value="0">Active</option>
                        <option {{(old('status', $getRecord-> status) == 1) ? 'selected':''}} value="1">Inactive</option>
                        

                    </select>
                    
                </div>


                  </div>
                  <div class="form-group">
                    <label >Email address <span  style="color:red;">*</span></label>
                    <input type="email" class="form-control" value="{{old('email' , $getRecord-> email)}}" name="email" placeholder="Enter email" required>
                    <div style="color:red">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label  >Password <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('password')}}" name="password" placeholder="Password" >
                    <p>do you want to change password</p>
                  </div>
                  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

     
            <!-- /.card -->

            <!-- Input addon -->

          
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection