<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Name</th>
								<th>ID No</th>
								<th>Date</th>
								<th>Status</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alldata as $key => $item)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $item->employee->name}}</td>
								<td>{{ $item->employee->id_no}}</td>
								<td>{{  date('d-m-Y',strtotime($item->date)) }}</td>
								<td>{{  $item->attend_status }}</td>
								<td>
									<a href="{{ route('edit.employee.leave',$item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('delete.employee.leave',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
								</td>
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
								<th width="20%">Action</th>
							</tr>
						</tfoot>
					  </table>