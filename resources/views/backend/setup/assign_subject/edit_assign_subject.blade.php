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
			  <h4 class="box-title">Edit Assign Subject</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('update.assign.subject',$editdata['0']->class_id) }}">
						@csrf
					  <div class="row">
						<div class="col-12">
							<div class="add_item">
								<div class="form-group">
									<h5>Class Name<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="class_id" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select Class</option>
											@foreach($student_class as $item)
											<option value="{{$item->id}}" {{ ($editdata['0']->class_id == $item->id ? 'selected' : '') }} >{{ $item->name}}</option>
											@endforeach
										</select>
									</div>
								</div>

@foreach($editdata as $edit)
<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<h5>Student Subject<span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="subject_id[]" id="select" required="" class="form-control">
					<option value="" selected="" disabled="">Select Subject</option>
					@foreach($subject as $item)
					<option value="{{$item->id}}" {{ $edit->subject_id == $item->id ? 'selected' : '' }} >{{ $item->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div><!-- end col-md-4 -->
	<div class="col-md-2">
		<div class="form-group">
			<h5>Full Mark<span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="full_mark[]" id="name" value="{{ $edit->full_mark }}"  class="form-control" required="">
				</div>
		</div>
	</div><!-- end col-md-2 -->
	<div class="col-md-2">
		<div class="form-group">
			<h5>Pass Mark<span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="pass_mark[]" id="name" value="{{ $edit->pass_mark }}" class="form-control" required="">
				</div>
		</div>
	</div><!-- end col-md-2 -->
	<div class="col-md-2">
		<div class="form-group">
			<h5>Subjective Mark<span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="subjective_mark[]" id="name" value="{{ $edit->subjective_mark }}" class="form-control" required="">
				</div>
		</div>
	</div><!-- end col-md-2 -->
	<div class="col-md-2" style="padding-top: 25px;">
		<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
		<span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
	</div><!-- end col-md-2 -->
</div><!-- end row -->
</div><!-- end delete_whole_extra_item_add -->
@endforeach


						</div>
					  </div><!-- end row -->
					  </div><!-- end add_item -->
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

<div style="visibility: hidden;">
	<div class="whole_extra_item_add" id="whole_extra_item_add">
		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
			<div class="form-row">
				<div class="col-md-4">
		<div class="form-group">
			<h5>Student Subject<span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="subject_id[]" id="select" required="" class="form-control">
					<option value="" selected="" disabled="">Select Subject</option>
					@foreach($subject as $item)
					<option value="{{$item->id}}">{{ $item->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div><!-- end col-md-4 -->
	<div class="col-md-2">
		<div class="form-group">
			<h5>Full Mark<span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="full_mark[]" id="name"  class="form-control" required="">
				</div>
		</div>
	</div><!-- end col-md-2 -->
	<div class="col-md-2">
		<div class="form-group">
			<h5>Pass Mark<span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="pass_mark[]" id="name"  class="form-control" required="">
				</div>
		</div>
	</div><!-- end col-md-2 -->
	<div class="col-md-2">
		<div class="form-group">
			<h5>Subjective Mark<span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="subjective_mark[]" id="name"  class="form-control" required="">
				</div>
		</div>
	</div><!-- end col-md-2 -->
				<div class="col-md-2" style="padding-top: 25px;">
					<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
					<span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
				</div><!-- end col-md-2 -->
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var counter = 0;
		$(document).on("click",".addeventmore",function(){
			var whole_extra_item_add = $('#whole_extra_item_add').html();
			$(this).closest(".add_item").append(whole_extra_item_add);
			counter++;
		});
		$(document).on("click",".removeeventmore",function(event){
			$(this).closest(".delete_whole_extra_item_add").remove();
			counter -= 1;
		});
	});
</script>

@endsection