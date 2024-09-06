 @extends('admin.admin_master')
 @section('admin')
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border d-flex justify-content-between">
				  <h3 class="box-title">Employee Attendance Details</h3>
				  <a href="{{ route('add.employee.attendacne') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Attendance</i></a>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
<thead>
	<tr>
		<th width="5%">Sl</th>
		<th>Name</th>
		<th>ID No</th>
		<th>Date</th>
		<th>Status</th>
	</tr>
</thead>
<tbody>
	@foreach($details as $key => $item)
	<tr>
		<td>{{ $key+1}}</td>
		<td>{{ $item->employee->name}}</td>
		<td>{{ $item->employee->id_no}}</td>
		<td>{{  date('d-m-Y',strtotime($item->date)) }}</td>
		<td>{{  $item->attend_status }}</td>
	</tr>
	@endforeach
</tbody>
<tfoot>
	<tr>
		<th width="5%">Sl</th>
		<th>Name</th>
		<th>ID No</th>
		<th>Date</th>
		<th>Status</th>
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