<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Online Shopping App - Forgot Password</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/front/img/icon/favicon.png">
	
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/vendors/dist/js/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/vendors/dist/js/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/vendors/dist/css/style.css" rel="stylesheet" type="text/css">

	<script src="<?php echo base_url(); ?>assets/vendors/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/dist/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/dist/js/additional-methods.min.js"></script>
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
		
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="panel panel-default card-view mb-0">
									<div class="panel-heading"><div style="text-align:center;">
									<a href="<?php echo base_url(); ?>"><img class="brand-img" src="<?php echo base_url(); ?>assets/front/img/logo/logo.png" alt="Little A More" /></a></div>
										<div style="text-align:center;padding:20px;">
											<h6 style="font-size:16px;color:#aeadae;font-weight:bold;">Forgot Password</h6>
										</div>
									</div>
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12 col-xs-12">
													<div class="form-wrap">
														 <form action="#" method="post" enctype="multipart/form-data" id="loginform" name="loginform">
															<div class="form-group">
																<label class="control-label mb-10">Email address</label>
																<div class="input-group">
																	<input type="text" class="form-control" name="email" id="exampleInputEmail_2" placeholder=" Email">
																	<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																</div>
															</div>
															<div class="form-group">
																<a class="capitalize-font txt-danger block pt-5 pull-right" href="<?php echo base_url(); ?>admin/">Login here</a>
																<div class="clearfix"></div>
															</div>
															<div class="form-group mb-0">
																<button type="submit" class="btn btn-success btn-block">reset</button>
															</div>
														</form>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/jquery.slimscroll.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/Counter-Up/jquery.counterup.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/dropdown-bootstrap-extended.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/raphael/raphael.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/morris-data.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/sweetalert2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/init.js"></script>
		<script>
		$('#loginform').validate({ // initialize the plugin
			rules: {
				email: {required: true,email:true },

			},
			messages: {
				email: { required:"Enter valid email id" }

			},
			submitHandler: function(form) {
				$.ajax({
					url: "<?php echo base_url(); ?>admin/resetpassword",
					type: 'POST',
					data: $('#loginform').serialize(),
					success: function(response) {

					if (response == "success") {
						  swal({
						  title: "Success",
						  text: " Password has been sent Register Email ",
						  type: "success"
					  }).then(function() {
						  location.href = '<?php echo base_url(); ?>admin/';
					  });
						} else {
							sweetAlert("Oops...", response, "error");
						}
					}
				});
			}
		});
		</script>
	</body>
</html>