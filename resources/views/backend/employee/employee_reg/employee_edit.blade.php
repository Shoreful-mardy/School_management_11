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
			  <h4 class="box-title">Edit Employee</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('update.employe.registration',$user->id) }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Employee Name<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" >
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
											<input type="text" name="fname" id="fname" value="{{$user->fname}}" class="form-control" >
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
											<input type="text" name="mname" id="mname" value="{{$user->mname}}" class="form-control" >
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
											<input type="text" name="phone" id="phone" value="{{$user->phone}}" class="form-control" >
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
											<input type="text" name="address" id="address" value="{{$user->address}}" class="form-control" >
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
												<option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}} >Male</option>
												<option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
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
												<option value="Christian"{{ $user->religion == 'Christian' ? 'selected' : '' }}>Christian</option>
												<option value="Islam" {{ $user->religion == 'Islam' ? 'selected' : '' }} >Islam</option>
												<option value="Hindu"{{ $user->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
												<option value="Buddho"{{ $user->religion == 'Buddho' ? 'selected' : '' }}>Buddho</option>
											</select>
											@error('religion')
											<span class="text-danger"{{ $user->religion == 'Islam' ? 'selected' : '' }}>{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Date Of Birth<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="dob" id="dob" value="{{$user->dob}}" class="form-control" >
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
												<option value="{{$item->id}}" {{ $user->designation_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
							</div><!-- end 3rd row  -->
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Employee Image<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="photo" id="photo" class="form-control" >
											</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<div class="controls">
											<img id="showImage" src="{{  url('upload/employee_images/'.$user->photo)}}" style="width:100px; border: 1px solid black;">
										</div>
									</div>
								</div><!-- col-md-4  -->
							</div><!-- end 4th row  -->
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