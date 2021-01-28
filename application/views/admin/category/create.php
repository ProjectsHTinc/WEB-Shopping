
	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">category</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
						<li><a href="#"><span>Category</span></a></li>
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
										<h6 class="panel-title txt-dark">Create Category </h6>
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
													<form action="<?php echo base_url(); ?>category/create_category" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Title <span class="compulsary-text">*</span></label>
																		<input type="text" id="cat_name" name="cat_name" class="form-control" placeholder="">

																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Description <span class="compulsary-text">*</span></label>
																	<textarea class="form-control" placeholder="" name="cat_desc"></textarea>
																	</div>
																</div>
															</div>
															<!-- /Row -->
															<div class="row">
															<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Cover image </label>
																		<input type="file" class="form-control" name="cat_cover_img" placeholder="">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Thumbnail image </label>
																		<input type="file" class="form-control" name="cat_thumb_img" placeholder="">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Meta Title</label>
																		<input type="text" class="form-control" name="cat_meta_title">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Meta Desc</label>
																		<input type="text" class="form-control" name="cat_meta_desc">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Category Keywords</label>
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
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">List  of Categories</h6>
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
													<th style="width:10%">S.no</th>
													<th style="width:65%">Category Title</th>
													<th style="width:15%">Status</th>
													<th style="width:10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
												<tr>
													<td>1</td>
													<td>Home</td>
													<td><span class="text-green">Active</span></td>
													<td></td>
												</tr>
												<?php $i=2; foreach($res as $rows){ ?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $rows->category_name; ?></td>
													<td><?php if($rows->status=='Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
													<td><a href="<?php echo base_url(); ?>category/edit_cat/<?php  echo base64_encode($rows->id*9876); ?>" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt"></i></a>
														&nbsp;
														<a href="<?php echo base_url(); ?>category/view_sub/<?php  echo base64_encode($rows->id*9876); ?>" data-toggle="tooltip" title="Sub Categories"><i class="ti-menu-alt"></i></a>
														&nbsp;
														<a href="<?php echo base_url(); ?>category/add_sub/<?php  echo base64_encode($rows->id*9876); ?>" data-toggle="tooltip" title="Add Sub Category"><i class="ti-plus"></i></a>
												</td>
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
        cat_name: { required:"Enter Category",remote:"Category name already exist" },
        cat_desc: { required:"Enter Description"},
		//cat_cover_img: { required:"Select Cover image", accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"},
		//cat_thumb_img: { required:"Select Thumbnail image",accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"},
		cat_status: { required:"Select Status"}
    }

});
</script>
