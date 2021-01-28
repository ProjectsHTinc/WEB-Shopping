
	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Sub Category</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>category/"><span> Category</span></a></li>
							<li><a href=""><span>Sub Category</span></a></li>
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
										<h6 class="panel-title txt-dark">Create Sub Category </h6>
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
													<form action="<?php echo base_url(); ?>category/create_sub_category" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Title <span class="compulsary-text">*</span></label>
																		<input type="text" id="cat_name" name="cat_name" class="form-control" placeholder="">
																			<input type="hidden" id="sub_cat_id" name="sub_cat_id" class="form-control" value="<?php echo $this->uri->segment(3);  ?>">

																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Description <span class="compulsary-text">*</span></label>
																	<textarea class="form-control" placeholder="" name="cat_desc"></textarea>
																	</div>
																</div>
															</div>
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Cover image </label>
																		<input type="file" class="form-control" name="cat_cover_img" placeholder="">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Thumbnail image</label>
																		<input type="file" class="form-control" name="cat_thumb_img" placeholder="">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 ">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Meta Title</label>
																		<input type="text" class="form-control" name="cat_meta_title">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Meta Desc</label>
																		<input type="text" class="form-control" name="cat_meta_desc">
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Sub Category Keywords</label>
																		<input type="text" class="form-control" name="cat_meta_keywords">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Status</label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="cat_status">
																			<option value="Active">Active</option>
																			<option value="Inactive">Inactive</option>

																		</select>
																	</div>
																</div>

															</div>

														</div>
														<div class="form-actions mt-10">
															<div class="col-md-6"></div>
															<div class="col-md-6">
																<button type="submit" class="btn btn-success  mr-10"> Save</button>
																<button type="button" class="btn btn-default">Cancel</button>
															</div>
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

$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');


$('#adminform').validate({ // initialize the plugin
    rules: {
		cat_name: {required: true,
			remote: {
				url: "<?php echo base_url(); ?>category/check_category",
				type: "post"
			 }
		},
		cat_desc : { required: true },
		//cat_cover_img : { required: true,accept: "jpg,jpeg,png",filesize: 1048576},
		//cat_thumb_img : { required: true,accept: "jpg,jpeg,png",filesize: 1048576},
		cat_status : { required: true}
    },
    messages: {
        cat_name: { required:"Enter Sub Category",remote:"Sub Category already exist" },
        cat_desc: { required:"Enter Sub Category Description"},
		//cat_cover_img: { required:"Select Cover image", accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"},
		//cat_thumb_img: { required:"Select Thumbnail image",accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"},
		cat_status: { required:"Select Status"}
    }

});
</script>
