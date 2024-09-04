 @extends('admin.admin_master')
 @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Employee</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('store.employe.registration') }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Employee Name<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" >
											@error('name')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Father Name<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="fname" id="fname" value="{{old('fname')}}" class="form-control" >
											@error('fname')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Mother Name<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="mname" id="mname" value="{{old('mname')}}" class="form-control" >
											@error('mname')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
							</div><!-- end 1st row  -->
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Mobile No<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control" >
											@error('phone')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Address<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="address" id="address" value="{{old('address')}}" class="form-control" >
											@error('address')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Gender<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="gender" id="gender"  class="form-control">
												<option value="" selected="" disabled="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
											@error('gender')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
							</div><!-- end 2nd row  -->
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Religion<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="religion" id="religion"  class="form-control">
												<option value="" selected="" disabled="">Select religion</option>
												<option value="Christian">Christian</option>
												<option value="Islam">Islam</option>
												<option value="Hindu">Hindu</option>
												<option value="Buddho">Buddho</option>
											</select>
											@error('religion')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Date Of Birth<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" >
											@error('dob')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Designation<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="designation_id" id="designation_id"  class="form-control">
												<option value="" selected="" disabled="">Select Designation</option>
												@foreach($designation as $item)
												<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
							</div><!-- end 3rd row  -->
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<h5>Salary<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="salary" id="salary" value="{{old('salary')}}" class="form-control" >
											@error('salary')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-3  -->
								<div class="col-md-3">
									<div class="form-group">
										<h5>Join Date<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="join_date" id="join_date" value="{{old('join_date')}}" class="form-control" >
											@error('join_date')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-3  -->
								<div class="col-md-3">
									<div class="form-group">
										<h5>Employee Image<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="photo" id="photo" class="form-control" >
											</div>
									</div>
								</div><!-- col-md-3  -->
								<div class="col-md-3">
									<div class="form-group">
										<div class="controls">
											<img id="showImage" src="{{  url('upload/no_image.jpg')}}" style="width:100px; border: 1px solid black;">
										</div>
									</div>
								</div><!-- col-md-3  -->
							</div><!-- end 4th row  -->
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
  <script type="text/javascript">
 		$(document).ready(function(){
 			$('#photo').change(function(e){
 				var reader = new FileReader();
 				reader.onload = function(e){
 					$('#showImage').attr('src',e.target.result);
 				}
 				reader.readAsDataURL(e.target.files[0]);
 			});
 		});
 	</script> 

@endsection