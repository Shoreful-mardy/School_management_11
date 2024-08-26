 @extends('admin.admin_master')
 @section('admin')
 <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border d-flex justify-content-between">
				  <h3 class="box-title">Assign Subject Details</h3>
				  <a href="{{ route('add.assgin.subject') }}" class="btn btn-success" style="float: right;"><i class="ti-plus">Add Assign Subject</i></a>
				</div>



				<!-- /.box-header -->
				<div class="box-body">
					<h4><strong>Assigned Class : </strong><span class="text-danger">{{ $detailsData['0']['class']['name'] }}</span></h4>
					<div class="table-responsive">
					  <table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th width="20%">Subject</th>
								<th width="20%">Full Marks</th>
								<th width="20%">Pass Marks</th>
								<th width="20%">Subjective Marks</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detailsData as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->subject->name}}</td>
								<td>{{ $item->full_mark}}</td>
								<td>{{ $item->pass_mark}}</td>
								<td>{{ $item->subjective_mark}}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th width="5%">Sl</th>
								<th width="20%">Subject</th>
								<th width="20%">Full Marks</th>
								<th width="20%">Pass Marks</th>
								<th width="20%">Subjective Marks</th>
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