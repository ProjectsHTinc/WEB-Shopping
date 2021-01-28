
	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">category</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>category/"><span> Category</span></a></li>
						<li class="active"><span>edit</span></li>
					  </ol>
					</div>
			</div>
		</div>
		<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Update  Category </h6>
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
													<?php  foreach($res as $rows){} ?>
													<form action="<?php echo base_url(); ?>category/update_category" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Title <span class="compulsary-text">*</span></label>
																		<input type="text" id="cat_name" name="cat_name" class="form-control" value="<?php echo $rows->category_name; ?>">
																		<input type="hidden" id="cat_id" name="cat_id" class="form-control" value="<?php echo base64_encode($rows->id*9876); ?>">

																	</div>
																</div>
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Description <span class="compulsary-text">*</span></label>
																	<textarea class="form-control" placeholder="" name="cat_desc"><?php echo $rows->category_desc; ?></textarea>
																	</div>
																</div>
																
															</div>
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Cover image </label>
																		<input type="file" class="form-control" name="cat_cover_img" >
																		<input type="hidden" id="cat_cover_img_id" name="cat_cover_img_id" class="form-control" value="<?php echo $rows->category_image; ?>">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Thumbnail image </label>
																		<input type="file" class="form-control" name="cat_thumb_img" >
																			<input type="hidden" id="cat_thumb_img_id" name="cat_thumb_img_id" class="form-control" value="<?php echo $rows->category_thumbnail; ?>">
																	</div>
																</div>
																
																
															</div>
															<div class="row">
																<div class="col-md-6">
																<?php if ($rows->category_image !=""){ ?>
																	<img src="<?php echo base_url(); ?>assets/category/<?php echo $rows->category_image; ?>" style="width:100px;">
																<?php } ?>
																</div>
																<div class="col-md-6">
																<?php if ($rows->category_thumbnail !=""){ ?>
																	<img src="<?php echo base_url(); ?>assets/category/thumbnail/<?php echo $rows->category_thumbnail; ?>" style="width:100px;">
																<?php } ?>
																</div>
																
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Meta Title</label>
																		<input type="text" class="form-control" name="cat_meta_title" value="<?php echo $rows->category_meta_title; ?>">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Meta Desc</label>
																		<input type="text" class="form-control" name="cat_meta_desc" value="<?php echo $rows->category_meta_desc; ?>">
																	</div>
																</div>
																
																
																
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Keywords</label>
																		<input type="text" class="form-control" name="cat_meta_keywords" value="<?php echo $rows->category_keywords; ?>">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Status</label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="cat_status" id="cat_status">
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



	</div>

<script>
$('#cat_status').val('<?php echo $rows->status; ?>');

$('#adminform').validate({ // initialize the plugin
    rules: {
        cat_name: {required: true,
          remote: {
                url: "<?php echo base_url(); ?>category/check_category_exist/<?php echo base64_encode($rows->id*9876); ?>",
                type: "post"
             }
           },
        cat_desc : { required: true },
		cat_status : { required: true}
    },
    messages: {
        cat_name: { required:"Enter Category",remote:"Category name already exist" },
        cat_desc: { required:"Enter Description"}
    }

});
</script>
