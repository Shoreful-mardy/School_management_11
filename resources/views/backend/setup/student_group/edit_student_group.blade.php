 @extends('admin.admin_master')
 @section('admin')

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Student Group</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Group</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Student Group</li>
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
			  <h4 class="box-title">Edit Student Group</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('update.student.group') }}">
						@csrf
						<input type="hidden" name="id" value="{{ $data->id }}">
					  <div class="row">
						<div class="col-12">
								<div class="form-group">
									<h5>Student Class Group<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" id="name" value="{{$data->name}}" class="form-control" required="">
										@error('name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
										</div>
								</div>
						</div>
					  </div>
						<div class="text-xs-right">
					<input type="submit" class="btn btn-info" value="Update">
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