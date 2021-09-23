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
										<h6 class="panel-title txt-dark">Create Advertisement</h6>
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
													<form action="<?php echo base_url(); ?>adsmaster/create_ads" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
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
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Adv Title <span class="compulsary-text">*</span></label>
																		<input type="text" id="firstName" name="ad_title" id="ad_title" class="form-control" placeholder="">

																	</div>
																</div>
																<!--/span-->

																<!--/span-->
															</div>
															<div class="row">
																
																<!--/span-->
																<div class="col-md-6">

																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Adv Image <span class="compulsary-text">*</span></label>
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
																	</div>
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

					<!-- Row -->
			<div class="row" id="view">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">List of advertisement</h6>
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
													<th>Sub Category</th>
													<th>Title</th>
													<th>Image</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>

												<?php $i=1; foreach($res_ads as $rows){ ?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $rows->category_name; ?></td>
														<td><?php echo $rows->ad_title; ?></td>

													<td><?php if(empty($rows->ad_img)){ ?>

												<?php 	}else{ ?>
																<img src="<?php echo base_url(); ?>assets/ads/<?php  echo $rows->ad_img; ?>" style="width:100px;">
													<?php	} ?>

														</td>
													<td><?php if($rows->status=='Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
													<td><a href="<?php echo base_url(); ?>admin/edit_ads/<?php  echo base64_encode($rows->id*9876); ?>"><i class="ti-pencil-alt"></i></a>

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
}, 'File size must be less than 1 Mb');

$('#adminform').validate({ // initialize the plugin
    rules: {
        sub_cat_id: {required: true,
          remote: {
                url: "<?php echo base_url(); ?>adsmaster/check_ads",
                type: "post"
             }
           },
        ad_title : {
           required: true, maxlength: 100
       },


			ad_img : {
				 required: true,accept: "jpg,jpeg,png",filesize: 1048576,
		 },
			 ad_status : {
					required: true
				}
    },
    messages: {
        sub_cat_id: { required:"select Category",remote:"Category already exist" },
				ad_title: { required:"Enter the title",maxlength:"Max length is 100 characters"},
				ad_img: { required:"Select ad image", accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"}
    }

});
</script>
