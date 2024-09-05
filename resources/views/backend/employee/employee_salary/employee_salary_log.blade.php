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
		  <h3 class="box-title">Employee Salary Log For <span class="text-info">{{ $details->name }}</span></h3>
		</div>



		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
			  <table  class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="5%">Sl</th>
						<th>Previous Salary</th>
						<th>Increement Salary</th>
						<th>Present Salary</th>
						<th>Effected Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($salary_log as $key => $item)
					<tr>
						<td>{{ $key+1}}</td>
						<td>{{ $item->previous_salary}}</td>
						<td>{{ $item->increment_salary}}</td>
						<td>{{ $item->present_salary}}</td>
						<td >{{ date('d-m-Y',strtotime($item->effected_salary))}}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th width="5%">Sl</th>
						<th>Previous Salary</th>
						<th>Increement Salary</th>
						<th>Present Salary</th>
						<th>Effected Date</th>
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