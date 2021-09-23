	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Promo Codes</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
						<li><a href="<?php echo base_url(); ?>admin/promo"><span>Promo Codes</span></a></li>
						<li class="active"><span>Edit</span></li>
					  </ol>
					</div>
			</div>
		</div>
		<?php if($this->session->flashdata('msg')): ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Yay! <?php echo $this->session->flashdata('msg'); ?>
			</div>
		<?php endif; ?>

		<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit Promo Code</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php foreach($res_promocode as $rows_promo){} ?>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">

										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo base_url(); ?>promomaster/update_promo" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Promo Title <span class="compulsary-text">*</span></label>
																		<input type="text" name="promo_title" id="promo_title" class="form-control" placeholder="Promo Title" value="<?php echo $rows_promo->promo_title; ?>">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Promo Code <span class="compulsary-text">*</span></label>
																		<input type="text" name="promo_code" id="promo_code" class="form-control" placeholder="Promo Code" value="<?php echo $rows_promo->promo_code; ?>">
																	</div>
																</div>

															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Promo Description </label>
																		<input type="text" name="promo_description" id="promo_description" class="form-control" placeholder="Promo Description" value="<?php echo $rows_promo->promo_description; ?>">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Offer Percentage (%)<span class="compulsary-text">*</span></label>
																		<input type="text" name="offer_percentage" id="offer_percentage" class="form-control" placeholder="Enter discount in Percentage" value="<?php echo $rows_promo->promo_percentage; ?>">
																	</div>
																</div>
																
															</div>
															<!-- /Row -->

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Status</label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="offer_status" id="offer_status">
																			<option value="Active">Active</option>
																			<option value="Inactive">Inactive</option>
																		</select><script> $('#offer_status').val('<?php echo $rows_promo->status; ?>');</script>
																	</div>
																</div>
																<div class="col-md-6">
																	
																</div>
															</div>

														</div>
														<div class="form-actions mt-10">
															<input type="hidden" name="promo_id" id="promo_id" class="form-control" value="<?php echo $rows_promo->id; ?>" readonly>
															<button type="submit" class="btn btn-success  mr-10" id="upload">Update</button>

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

					<!-- Row -->


</div>
<script>
$('#adminform').validate({ // initialize the plugin
    rules: {
		promo_title : {required: true},
        promo_code: {required: true, maxlength: 100,
		remote: {
                url: "<?php echo base_url(); ?>promomaster/check_promo_code_exist/<?php echo base64_encode($rows_promo->id*9876);  ?> ",
                type: "post"
             }
         },
		 offer_percentage : {required: true,number:true, maxlength: 2},
		 offer_status : {required: true}
    },
    messages: {
		promo_title: { required:"Enter Promo Title"},
		promo_code: { required:"Enter Promo Code",remote:"Promo Code already exist" },
		offer_percentage: { required:"Enter Offer %", number:"Enter numbers only"},
		offer_status: { required:"Select Status"}
	}

});

</script>
