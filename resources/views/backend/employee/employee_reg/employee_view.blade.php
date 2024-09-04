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
		  <h3 class="box-title">Employee List</h3>
		  <a href="{{ route('add.employee.registration') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Employee</i></a>
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
						<th>Mobile</th>
						<th>Designation</th>
						<th width="15%" >DOJ</th>
						<th>Salary</th>
						@if(Auth::user()->role == 'Admin')
						<th>Code</th>
						@endif
						<th width="30%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($alldata as $key => $item)
					<tr>
						<td>{{ $key+1}}</td>
						<td>{{ $item->name}}</td>
						<td>{{ $item->id_no}}</td>
						<td>{{ $item->phone}}</td>
						<td>{{ $item->designation->name}}</td>
						<td style="font-size: 10px;">{{ date('d-m-Y',strtotime($item->join_date))}}</td>
						<td>{{ $item->salary}}</td>
						<td>{{ $item->code}}</td>
						<td>
							<a title="Edit" href="{{ route('employee.registration.edit',$item->id) }}" class="badge badge-warning">Edit</a>
							<a title="Details" href="{{ route('employee.registration.details',$item->id) }}" target="_blank" class="badge badge-success">Details</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th width="5%">Sl</th>
						<th>Name</th>
						<th>ID No</th>
						<th>Mobile</th>
						<th>Designation</th>
						<th width="15%">DOJ</th>
						<th>Salary</th>
						@if(Auth::user()->role == 'Admin')
						<th>Code</th>
						@endif
						<th width="30%">Action</th>
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