	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Advertisement</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>admin/ads"><span>Advertisement</span></a></li>
						<li class="active"><span>Edit </span></li>
					  </ol>
					</div>
			</div>
		</div>
		<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Update Advertisement</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<?php if($this->session->flashdata('msg')): ?>
											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('msg'); ?>
											</div>
								<?php endif; ?>

										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">

													<?php  foreach($res_ads as $rows_ads){} ?>

													<form action="<?php echo base_url(); ?>adsmaster/update_ads" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Select Sub Category <span class="compulsary-text">*</span></label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="sub_cat_id" id="sub_cat_id">
																			<option value="">Select Sub Category</option>
																		<?php foreach($res_sub_cat as $row_sub_cat){ ?>
																				<option value="<?php echo $row_sub_cat->id ?>"><?php echo $row_sub_cat->category_name; ?></option>
																	<?php 	} ?>
																		</select>
																			<script> $('#sub_cat_id').val('<?php echo $rows_ads->sub_cat_id; ?>');</script>
																			<input type="hidden" name="ads_token" id="ads_token" class="form-control" placeholder="" value="<?php echo base64_encode($rows_ads->id*9876); ?>">

																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Adv Title <span class="compulsary-text">*</span></label>
																		<input type="text" id="firstName" name="ad_title" id="ad_title" class="form-control" placeholder="" value="<?php echo $rows_ads->ad_title; ?>">
																		<input type="hidden"  name="ads_old_image" id="ads_old_image" class="form-control" placeholder="" value="<?php echo $rows_ads->ad_img; ?>">

																	</div>
																</div>
																

																
															</div>
															<div class="row">
																
																
																<div class="col-md-6">

																</div>
																
															</div>
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Adv Image</label>
																		<input type="file" class="form-control" name="ad_img" id="ad_img" placeholder="">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Status</label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="ad_status" id="ad_status">
																			<option value="Active">Active</option>
																			<option value="Inactive">Inactive</option>

																		</select>
																			<script> $('#ad_status').val('<?php echo $rows_ads->status; ?>');</script>
																	</div>
																</div>
																
																
																
															</div>


															
															<div class="row">
															<div class="col-md-6">
																	<img src="<?php echo base_url(); ?>assets/ads/<?php  echo $rows_ads->ad_img; ?>" style="width:200px;">

																</div>
																
																

																
															</div>
															


															

														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10" id="upload"> Save</button>
															<button type="button" class="btn btn-default">Cancel</button>
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

<script>
$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than 1 Mb');

$('#adminform').validate({ // initialize the plugin
    rules: {
        sub_cat_id: {required: true,
          remote: {
                url: "<?php echo base_url(); ?>adsmaster/check_ads_exist/<?php echo base64_encode($rows_ads->id*9876);  ?>",
                type: "post"
             }
           },
        ad_title : {
           required: true, maxlength: 100
       },

			ad_img : {
				 required: false,accept: "jpg,jpeg,png",filesize: 1048576,
		 },
			 ad_status : {
					required: true
				}
    },
    messages: {
        sub_cat_id: { required:"select Category",remote:"Category already exist" },
				ad_title: { required:"Enter the title",maxlength:"Max length is 100 characters"},
				ad_img: { required:"Select ads image", accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"}
    }

});
</script>
