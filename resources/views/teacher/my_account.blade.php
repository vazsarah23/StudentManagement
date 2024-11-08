  <!-- Content Wrapper. Contains page content -->

  @extends('layouts.app')
  @section('content')
  
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Faculty Details</h1>
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

                  <!-- <div class="form-group col-md-6">
                    <label >Admission number <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('admission_number')}}" name="admission_number" placeholder="Enter Admission number" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Roll number <span  </label>
                    <input type="text" class="form-control" value="{{old('roll_number')}}" name="roll_number" placeholder="Enter Roll number">
                  </div> -->

                  

                <div class="form-group col-md-6">
                    <label >Gender <span  style="color:red;">*</span></label>
                    <select class="form-control" name="gender"  required>
                        <option value="">Select Gender</option>
                        <option {{(old('gender', $getRecord->gender)=='Male') ? 'selected' : ''}}  value="Male">Male</option>
                        <option  {{(old('gender', $getRecord->gender)=='Female') ? 'selected' : ''}}  value="Female" value="Female">Female</option>
                        <option  {{(old('gender', $getRecord->gender)=='Other') ? 'selected' : ''}}  value="Other"value="Other">Other</option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label >Date of Birth <span  style="color:red;">*<span  </label>
                    <input type="date" class="form-control" value="{{old('date_of_birth'  , $getRecord->date_of_birth)}}" name="date_of_birth" >
                  </div>
                  <!-- <div class="form-group col-md-6">
                    <label >Caste <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('caste')}}" name="caste" placeholder="Enter Caste">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Religion </label>
                    <input type="text" class="form-control" value="{{old('religion')}}" name="religion" placeholder="Enter Religion">
                  </div> -->

                  <div class="form-group col-md-6">
                    <label >Mobile <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('mobile_number' , $getRecord->mobile_number)}}" name="mobile_number" placeholder="Enter mobile">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Address <span  style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('address' , $getRecord->address)}}" name="address" placeholder="Enter Address">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Date of Joining <span  style="color:red;">*</span></label>
                    <input type="date" class="form-control" value="{{old('admission_date' , $getRecord->addmission_date)}}" name="admission_date" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Profile pic </span></label>
                    <input type="file" class="form-control"  name="profile_pic" >
                    @if(!empty($getRecord->getProfile()))
                    <img src="{{$getRecord->getProfile() }}" style="width: auto;height:50px;">
                    @endif

                  </div>
                  <div class="form-group col-md-6">
                    <label >Qualification <span  style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{old('qualification' , $getRecord->qualification)}}" name="qualification" placeholder= "Qualification">
                  </div>

                  <div class="form-group col-md-6">
                    <label >Work Experience <span  style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{old('workexperience' , $getRecord->workexperience)}}" name="workexperience" placeholder= "workexperience">
                  </div>
                  <!-- <div class="form-group col-md-6">
                    <label >graduationpercentage <span  style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{old('graduationpercentage')}}" name="graduationpercentage" placeholder= "weight" >
                  </div> -->

                  


                  </div>
                  <div class="form-group">
                    <label >Email address <span  style="color:red;">*</span></label>
                    <input type="email" class="form-control"value="{{old('email' ,  $getRecord->email)}}" name="email" placeholder="Enter email" required>
                    <div style="color:red">{{$errors->first('email')}}</div>
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