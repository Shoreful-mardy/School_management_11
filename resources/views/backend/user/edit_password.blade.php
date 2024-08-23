 @extends('admin.admin_master')
 @section('admin')

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">User</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">User</li>
								<li class="breadcrumb-item active" aria-current="page">Change Password</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">User Change Password</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('update.password') }}">
						@csrf
					  <div class="row">
						<div class="col-12">

								<div class="form-group">
									<h5>Current Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="oldpassword" id="update_password_current_password" class="form-control" required="">
										@error('oldpassword')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<div class="form-group">
									<h5>New Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" id="update_password_password" class="form-control" required="">
										@error('password')
										<span class="text-danger">{{ $message }}</span>
										@enderror
										</div>
								</div>

								<div class="form-group">
									<h5>Confirm Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password_confirmation" id="update_password_password_confirmation" class="form-control" required="">
										@error('password_confirmation')
										<span class="text-danger">{{ $message }}</span>
										@enderror
										</div>
								</div>
						</div>
					  </div>
						<div class="text-xs-right">
					<input type="submit" class="btn btn-info" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

@endsection