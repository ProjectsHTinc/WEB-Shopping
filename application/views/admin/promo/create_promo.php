	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Promo Codes</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
						<li><a href="#"><span>Promo Codes</span></a></li>
						<li class="active"><span>Create</span></li>
					  </ol>
					</div>
			</div>
		</div>
		<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Promo Code Offers</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">


										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo base_url(); ?>promomaster/create_promo" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Promo Title <span class="compulsary-text">*</span></label>
																		<input type="text" name="promo_title" id="promo_title" class="form-control" placeholder="Promo Title">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Promo Code <span class="compulsary-text">*</span></label>
																		<input type="text" name="promo_code" id="promo_code" class="form-control" placeholder="Promo Code">
																	</div>
																</div>

															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Promo Description </label>
																		<input type="text" name="promo_description" id="promo_description" class="form-control" placeholder="Promo Description">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Offer Percentage (%)<span class="compulsary-text">*</span></label>
																		<input type="text" name="offer_percentage" id="offer_percentage" class="form-control" placeholder="Enter discount in Percentage">
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

																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	
																</div>
															</div>

														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10" id="upload">Create</button>

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
					<?php if($this->session->flashdata('msg')): ?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('msg'); ?>
						</div>
			<?php endif; ?>

			<div class="row" id="view">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">List  of Promo Offers</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="datable_1" class="table table-hover display  pb-30" >
											<thead>
												<tr>
													<th>S.no</th>
													<th>Title</th>
													<th>Promo Code</th>
													<th>Percentage</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>

												<?php $i=1; foreach($res_promocodes as $rows_promo){ ?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $rows_promo->promo_title; ?></td>
													<td><?php echo $rows_promo->promo_code; ?></td>
													<td><?php echo $rows_promo->promo_percentage; ?> %</td>
													<td><?php if($rows_promo->status=='Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
													<td><a href="<?php echo base_url(); ?>admin/edit_promo/<?php  echo base64_encode($rows_promo->id*9876); ?>"><i class="ti-pencil-alt"></i></a></td>
												</tr>
											<?php	 $i++; }  ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->



	</div>

<script>

$('#adminform').validate({ // initialize the plugin
    rules: {
		promo_title : {required: true},
        promo_code: {required: true, maxlength: 100,
		remote: {
                url: "<?php echo base_url(); ?>promomaster/check_promo_code",
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
