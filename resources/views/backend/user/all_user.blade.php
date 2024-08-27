 @extends('admin.admin_master')
 @section('admin')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">User</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">User</li>
								<li class="breadcrumb-item active" aria-current="page">All User</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border d-flex justify-content-between">
				  <h3 class="box-title">All User</h3>
				  <a href="{{ route('add.user') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add User</i></a>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Code</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($user as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->role}}</td>
								<td>{{ $item->name}}</td>
								<td>{{ $item->email}}</td>
								<td>{{ $item->code}}</td>
								<td>
									<a href="{{ route('edit.user',$item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('delete.user',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Sl</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Code</th>
								<th>Action</th>
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