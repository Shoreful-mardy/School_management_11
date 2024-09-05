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
		  <h3 class="box-title">Employee Salary List</h3>
		  <a href="{{ route('add.employee.registration') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Employee Salary</i></a>
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
						<td>
							<a title="Increment" href="{{ route('employee.registration.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
							<a title="Details" href="{{ route('employee.registration.details',$item->id) }}" target="_blank" class="btn btn-danger"><i class="fa fa-eye"></i></a>
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