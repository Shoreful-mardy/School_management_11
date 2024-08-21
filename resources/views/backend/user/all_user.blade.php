 @extends('admin.admin_master')
 @section('admin')

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
				  <button class="btn btn-info" type="button"> <span><i class="ti-plus"></i> Add User</span> </button>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sl</th>
								<th>Name</th>
								<th>Email</th>
								<th>Created Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach($user as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->name}}</td>
								<td>{{ $item->email}}</td>
								<td>{{ $item->created_at->format('d/m/Y') }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Sl</th>
								<th>Name</th>
								<th>Email</th>
								<th>Created Date</th>
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