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
					<h4 class="box-title">Employee <strong>Monthly Salary</strong></h4>
				  </div>

				  <div class="box-body">
						<div class="row">
							<div class="col-md-6">
									<div class="form-group">
										<h5>Attendance Date<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="start_date"  class="form-control" required="">
										</div>
									</div>
								</div><!-- col-md-6  -->
								<div class="col-md-6" style="padding-top: 25px;">
									<a id="search" class="btn btn-primary" name="search">Search</a>
								</div><!-- col-md-6  -->
						</div><!-- End Row -->
	<!-- ///// Registration Fee Table Started From Here ///// -->
	<div class="row" >
		<br>
		<div class="col-md-12">
			<div id="DocumentResults">
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



@endsection