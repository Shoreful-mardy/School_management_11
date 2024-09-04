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
				  <a href="{{ route('add.designation') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Employee</i></a>
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
								<th>Join Date</th>
								<th>Salary</th>
								@if(Auth::user()->role == 'Admin')
								<th>Code</th>
								@endif
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alldata as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->name}}</td>
								<td>{{ $item->id_no}}</td>
								<td>{{ $item->designation->name}}</td>
								<td>{{ $item->join_date}}</td>
								<td>{{ $item->salary}}</td>
								<td>{{ $item->code}}</td>
								<td>
									<a href="{{ route('edit.designation',$item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('delete.designation',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
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
								<th>Join Date</th>
								<th>Salary</th>
								@if(Auth::user()->role == 'Admin')
								<th>Code</th>
								@endif
								<th >Action</th>
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