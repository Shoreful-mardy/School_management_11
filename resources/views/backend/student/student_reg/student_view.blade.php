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
					<h4 class="box-title">Student <strong>Search</strong></h4>
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
												<option value="{{$item->id}}" {{ $item->year_id == $year_id ? 'selected' : '' }}>{{$item->name}}</option>
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
												<option value="{{$item->id}}" {{ (@$class_id == $item->class_id) ? 'selected' : '' }}>{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4" style="padding-top: 25px;">
									<input type="submit" class="btn btn-dark mb-5" id="search" name="search" value="Search">
								</div><!-- col-md-4  -->
						</div><!-- End Row -->
					</form>
				  </div>
				</div>
			</div><!-- End col-12 -->
			  
 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border d-flex justify-content-between">
				  <h3 class="box-title">Student List</h3>
				  <a href="{{ route('student.registration.add') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Student</i></a>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Image</th>
								<th>Name</th>
								<th>Id No</th>
								<th>Roll</th>
								<th>Year</th>
								<th>Class</th>
								@if(Auth::user()->role == 'Admin')
								<th>Code</th>
								@endif
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>
									<img src="{{ (!empty($item->student->photo))? url('upload/student_images/'.$item->student->photo) : url('upload/no_image.jpg')}}" style="height: 60px; width: 60px;">
								</td>
								<td>{{ $item->student->name}}</td>
								<td>{{ $item->student->id_no}}</td>
								<td>{{ $item->roll}} </td>
								<td>{{ $item->year->name}}</td>
								<td>{{ $item->class->name}}</td>
								<td>{{ $item->student->code}}</td>
								<td>
									<a href="{{ route('student.registration.edit',$item->studetn_id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('delete.exam.type',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th width="5%">Sl</th>
								<th>Image</th>
								<th>Name</th>
								<th>Id No</th>
								<th>Roll</th>
								<th>Year</th>
								<th>Class</th>
								@if(Auth::user()->role == 'Admin')
								<th>Code</th>
								@endif
								<th width="20%">Action</th>
							</tr>
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>


@endsection