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
			  <h4 class="box-title">Add Attendance</h4>
			</div>
			<!-- /.box-header -->
<div class="box-body">
  <div class="row">
	<div class="col">
		<form method="POST" action="{{ route('store.designation') }}">
			@csrf
		  <div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<h5>Attendance Date<span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="date" name="date" class="form-control" required="">
							</div>
						</div>
					</div><!-- End col-md-5 -->
				</div><!-- End Row -->

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-striped" width="100%">
			<thead>
				<tr>
					<th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
					<th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
					<th colspan="3" class="text-center" style="vertical-align: middle; width: 30%;">Attendance Status</th>
				</tr>
				<tr>
					<th class="text-center btn present_all" style="display: table-cell; background-color:black ;">Present</th>
					<th class="text-center btn leave_all" style="display: table-cell; background-color:black ;">Leave</th>
					<th class="text-center btn absent_all" style="display: table-cell; background-color:black ;">Absent</th>
				</tr>
			</thead>
			<tbody>
				@foreach($employee as $key => $item)
				<tr id="div{{$item->id}}" class="text-center">
					<input type="hidden" name="employee_id[]" value="{{ $item->id }}">
					<td>{{ $key+1}}</td>
					<td>{{$item->name}}</td>
					<td colspan="3">
						<div class="switch-toggle switch-3 switch-candy">
							<input type="radio" checked="checked" id="present{{$key}}" value="Present" name="attend_status{{$key}}">
							<label for="present{{$key}}">Present</label>
							<input type="radio"  id="leave{{$key}}" value="Leave" name="attend_status{{$key}}">
							<label for="leave{{$key}}">Leave</label>
							<input type="radio"  id="Absent{{$key}}" value="Absent" name="attend_status{{$key}}">
							<label for="Absent{{$key}}">Absent</label>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div><!-- End col-12 -->
</div><!-- End Row -->








			</div>
		  </div><!-- End Row -->

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