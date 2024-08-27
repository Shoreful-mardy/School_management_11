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
								<li class="breadcrumb-item active" aria-current="page">Add User</li>
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
			  <h4 class="box-title">Add User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('store.user') }}">
						@csrf
					  <div class="row">
						<div class="col-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>User Role<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="role" id="role" required="" class="form-control">
											<option value="" selected="" disabled="">Select Role</option>
											<option value="Admin">Admin</option>
											<option value="Operator">Operator</option>
										</select>
									</div>
								</div>
							</div><!--End col-md-6 -->
							<div class="col-md-6">
								<div class="form-group">
									<h5>User Name<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required="">
										@error('name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
										</div>
								</div>
							</div><!--End col-md-6 -->
						 </div>	<!--End Row -->
						 <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>User Email<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required="">
										@error('email')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div><!--End col-md-6 -->
							<div class="col-md-6">
							</div><!--End col-md-6 -->
						 </div>	<!--End Row -->
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