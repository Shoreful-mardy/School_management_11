 @extends('admin.admin_master')
 @section('admin')

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employee Leave Add</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="">
						@csrf
					  <div class="row">
					  	<div class="col-md-6">
							<div class="form-group">
								<h5>Employee Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="employee_id" required="" class="form-control">
										<option value="" selected="" disabled="">Select Employee</option>
										@foreach($employee as $item)
										<option value="{{ $item->id}}">{{ $item->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div><!--End col-md-6-->
						<div class="col-md-6">
							<div class="form-group">
								<h5>Leave Purpose<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="leave_purpose_id" required="" class="form-control">
										<option value="" selected="" disabled="">Select Purpose</option>
										@foreach($leave_purpose as $item)
										<option value="{{ $item->id}}">{{ $item->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div><!--End col-md-6-->


						<div class="col-md-6">
							<div class="form-group">
								<h5>Start Date<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="start_date"  class="form-control" required="">
								</div>
							</div>
						</div><!--End col-md-6-->
						<div class="col-md-6">
							<div class="form-group">
								<h5>End Date<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="end_date"  class="form-control" required="">
								</div>
							</div>
						</div><!--End col-md-6-->
					  </div><!--End row-->
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