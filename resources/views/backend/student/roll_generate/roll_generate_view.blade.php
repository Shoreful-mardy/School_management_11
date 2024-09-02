 @extends('admin.admin_master')
 @section('admin')
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Roll Generator</strong></h4>
				  </div>

				  <div class="box-body">
					<form method="Get" action="{{ route('student.year.class.wise') }}">
						<div class="row">
							<div class="col-md-4">
									<div class="form-group">
										<h5>Year<span class="text-danger"></span></h5>
										<div class="controls">
											<select name="year_id" id="year_id"  class="form-control">
												<option value="" selected="" disabled="">Select Year</option>
												@foreach($student_year as $item)
												<option value="{{$item->id}}" >{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Class<span class="text-danger"></span></h5>
										<div class="controls">
											<select name="class_id" id="class_id"  class="form-control">
												<option value="" selected="" disabled="">Select Class</option>
												@foreach($student_class as $item)
												<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4" style="padding-top: 25px;">
									<a id="search" class="btn btn-primary" name="search">Search</a>
								</div><!-- col-md-4  -->
						</div><!-- End Row -->
					</form>
				  </div>
				</div>
			</div><!-- End col-12 -->
			  
 
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content  -->
	  
	  </div>
  </div>


@endsection