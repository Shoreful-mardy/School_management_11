 @extends('admin.admin_master')
 @section('admin')
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Fee Amount</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Fee</li>
								<li class="breadcrumb-item active" aria-current="page">Fee Amount Details</li>
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
				  <h3 class="box-title">Student Fee Amount Details</h3>
				  <a href="{{ route('add.fee.amount') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Fee Amount</i></a>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<h4><strong>Fee Category : </strong><span class="text-danger">{{ $detailsData['0']['feecategory']['name'] }}</span></h4>
					<div class="table-responsive">
					  <table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Class Name</th>
								<th width="25%">Amount</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detailsData as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->class->name}}</td>
								<td>{{ $item->amount}}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th width="5%">Sl</th>
								<th>Class Name</th>
								<th width="25%">Amount</th>
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