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
			  <h4 class="box-title">Student Promotion <span class="text-danger">{{ $data->student->name}}</span></h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('promotion.student.registration',$data->studetn_id) }}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{ $data->id }}">
					  <div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Discount<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="discount" id="discount" value="{{$data->discount->discount}}" class="form-control" >
										
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Year<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="year_id" id="year_id"  class="form-control">
												<option value="" selected="" disabled="">Select Year</option>
												@foreach($student_year as $item)
												<option value="{{$item->id}}" {{ $data->year_id == $item->id ? 'selected' : '' }} >{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Class<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="class_id" id="class_id"  class="form-control">
												<option value="" selected="" disabled="">Select Class</option>
												@foreach($student_class as $item)
												<option value="{{$item->id}}" {{ $data->class_id == $item->id ? 'selected' : '' }} >{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->

							</div><!-- end 3rd row  -->
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Group<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="group_id" id="group_id"  class="form-control">
												<option value="" selected="" disabled="">Select Group</option>
												@foreach($student_group as $item)
												<option value="{{$item->id}}" {{ $data->group_id == $item->id ? 'selected' : '' }} >{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Shift<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="shift_id" id="shift_id"  class="form-control">
												<option value="" selected="" disabled="">Select Shift</option>
												@foreach($student_shift as $item)
												<option value="{{$item->id}}" {{ $data->shift_id == $item->id ? 'selected' : '' }} >{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-4  -->
								<div class="col-md-4">
									<div class="form-group">
										<div class="controls">
											<img id="showImage" src="{{ (!empty($data->student->photo))? url('upload/student_images/'.$data->student->photo) : url('upload/no_image.jpg')}}" style="width:100px; border: 1px solid black;">
										</div>
									</div>
								</div><!-- col-md-4  -->
							</div><!-- end 5th row  -->
						</div>
					  </div>
						<div class="text-xs-right">
					<input type="submit" class="btn btn-info" value="Promotion">
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