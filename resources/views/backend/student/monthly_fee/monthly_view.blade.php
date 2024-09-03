 @extends('admin.admin_master')
 @section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js" integrity="sha512-E1dSFxg+wsfJ4HKjutk/WaCzK7S2wv1POn1RRPGh8ZK+ag9l244Vqxji3r6wgz9YBf6+vhQEYJZpSjqWFPg9gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Monthly Fee</strong></h4>
				  </div>

				  <div class="box-body">
						<div class="row">
							<div class="col-md-3">
									<div class="form-group">
										<h5>Year<span class="text-danger"></span></h5>
										<div class="controls">
											<select name="year_id" id="year_id"  class="form-control">
												<option value="" selected="" disabled="">Select Year</option>
												@foreach($student_year as $item)
												<option value="{{$item->id}}" >{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-3  -->
								<div class="col-md-3">
									<div class="form-group">
										<h5>Class<span class="text-danger"></span></h5>
										<div class="controls">
											<select name="class_id" id="class_id"  class="form-control">
												<option value="" selected="" disabled="">Select Class</option>
												@foreach($student_class as $item)
												<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div><!-- col-md-3  -->
								<div class="col-md-3">
									<div class="form-group">
										<h5>Month<span class="text-danger"></span></h5>
										<div class="controls">
											<select name="month" id="month"  class="form-control">
												<option value="" selected="" disabled="">Select Month</option>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="Jun">Jun</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
										</div>
									</div>
								</div><!-- col-md-3  -->
								<div class="col-md-3" style="padding-top: 25px;">
									<a id="search" class="btn btn-primary" name="search">Search</a>
								</div><!-- col-md-3  -->
						</div><!-- End Row -->
	<!-- ///// Registration Fee Table Started From Here ///// -->
	<div class="row" >
		<br>
		<div class="col-md-12">
			<div id="DocumentResults">
				<script id="document-template" type="text/x-handlebars-template">
				
				<table class="table table-bordered table-striped" style="widows: 100%;">
					<thead>
						<tr>
							@{{{thsource}}}
						</tr>
					</thead>
					<tbody>
						@{{#each this}}
						<tr>
							@{{{tdsource}}}
						</tr>
						@{{/each}}
					</tbody>
				</table>
				</script>
			</div>
		</div><!-- End col-md-12 -->
	</div><!-- End Row d-none -->


				  </div>
				</div>
			</div><!-- End col-12 -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content  -->
	  
	  </div>
  </div>
<!--// Get Registration Fee  ===========-->

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var month = $('#month').val();
     $.ajax({
      url: "{{ route('student.monthly.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'month':month},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>


@endsection