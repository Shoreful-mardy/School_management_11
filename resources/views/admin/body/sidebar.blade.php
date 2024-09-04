 @php

 @endphp

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Easy</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ Route::currentRouteName() === 'user.view' || Route::currentRouteName() === 'add.user' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view')}}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('add.user')}}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 

        

		  
        <li class="treeview {{ Route::currentRouteName() === 'profile.view' || Route::currentRouteName() === 'password.view' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{ route('password.view')}}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li>

        <li class="treeview {{ Route::currentRouteName() === 'student.class' || Route::currentRouteName() === 'student.year' || Route::currentRouteName() === 'student.group' || Route::currentRouteName() === 'student.shift' || Route::currentRouteName() === 'fee.category' || Route::currentRouteName() === 'fee.category.amount' || Route::currentRouteName() === 'exam.type' || Route::currentRouteName() === 'subject' || Route::currentRouteName() === 'assign.subject.view' || Route::currentRouteName() === 'designation.view' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.class')}}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{ route('student.year')}}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{ route('student.group')}}"><i class="ti-more"></i>Student Group</a></li>
            <li><a href="{{ route('student.shift')}}"><i class="ti-more"></i>Student Shift</a></li>
            <li><a href="{{ route('fee.category')}}"><i class="ti-more"></i>Student Fee Category</a></li>
            <li><a href="{{ route('fee.category.amount')}}"><i class="ti-more"></i>Fee Category Amount</a></li>
            <li><a href="{{ route('exam.type')}}"><i class="ti-more"></i>Exam Type</a></li>
            <li><a href="{{ route('subject')}}"><i class="ti-more"></i>Subject</a></li>
            <li><a href="{{ route('assign.subject.view')}}"><i class="ti-more"></i>Assign Subject</a></li>
            <li><a href="{{ route('designation.view')}}"><i class="ti-more"></i>Designation</a></li>
          </ul>
        </li> 
         <li class="treeview {{ Route::currentRouteName() === 'student.registration.view' || Route::currentRouteName() === 'roll.generate.view'|| Route::currentRouteName() === 'registration.fee.view'  || Route::currentRouteName() === 'exam.fee.view' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.registration.view')}}"><i class="ti-more"></i>Student Registration</a></li>
            <li><a href="{{ route('roll.generate.view')}}"><i class="ti-more"></i>Roll Generate</a></li>
            <li><a href="{{ route('registration.fee.view')}}"><i class="ti-more"></i>Registration Fee</a></li>
            <li><a href="{{ route('monthly.fee.view')}}"><i class="ti-more"></i>Monthly Fee</a></li>
            <li><a href="{{ route('exam.fee.view')}}"><i class="ti-more"></i>Exam Fee</a></li>
          </ul>
        </li>

        <li class="treeview {{ Route::currentRouteName() === 'employe.registration.view' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employe.registration.view')}}"><i class="ti-more"></i>Employee Registration</a></li>
          </ul>
        </li>
			  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
          </ul>
        </li>
		
	
		 		  		  
		  
		  
		<li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>