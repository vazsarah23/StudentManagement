<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
  </nav>

  <!-- sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
          <span class="brand-text font-weight-light"><center> <b>_SMS_</b></center> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->user_type==1)
          <li class="nav-item menu-open">
            <a href="{{ url('admin/dashboard')}} " class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> -->
        
            <li class="nav-item">
                <a href="{{ url('admin/admin/list')}}" class="nav-link @if(Request::segment(2)=='admin') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Admin</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/teacher/list')}}" class="nav-link @if(Request::segment(2)=='teacher') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Teacher</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2)=='admin') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Student</p>
                </a>
              </li>

            

          

              <li class="nav-item">
                <a href="{{ url('admin/class/list')}}" class="nav-link @if(Request::segment(2)=='class') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Class</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/subject/list')}}" class="nav-link @if(Request::segment(2)=='subject') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Subject</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2)=='subject') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Assign Subjects</p>
                </a>
              </li>
              

              
          @elseif(Auth::user()->user_type==2)
          <li class="nav-item menu-open">
            <a href="{{ url('teacher/dashboard')}} " class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
                <a href="{{ url('teacher/account')}}" class="nav-link @if(Request::segment(2)=='account') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>My Account</p>
                </a>
              </li>
            
          @elseif(Auth::user()->user_type==3)

          <li class="nav-item menu-open">
            <a href="{{ url('student/dashboard')}} " class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{ url('student/account')}}" class="nav-link @if(Request::segment(2)=='account') active @endif ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>My Account</p>
                </a>
              </li>
          @elseif(Auth::user()->user_type==4)
          <li class="nav-item menu-open">
            <a href="{{ url('parent/dashboard')}} " class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @endif

        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
              <li class="nav-item">
                <a href="{{ url('logout')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
              
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>