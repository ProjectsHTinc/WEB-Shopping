	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Specification</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>admin/specification"><span>Specification</span></a></li>
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
										<h6 class="panel-title txt-dark">Create Specification </h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<?php if($this->session->flashdata('msg')): ?>
											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $this->session->flashdata('msg'); ?>
											</div>
    						<?php endif; ?>

										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="#" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">

															<div class="row" id="">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Specification Name <span class="compulsary-text">*</span></label>
																		<input type="text" id="color_name" name="spec_name" class="form-control" placeholder="">

																	</div>
																</div>
															<div class="col-md-6">
																</div>
															</div>


															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Status</label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="spec_status" id="spec_status">
																			<option value="Active">Active</option>
																			<option value="Inactive">Inactive</option>

																		</select>
																	</div>
																</div>

															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-actions">
																		<button type="submit" class="btn btn-success  mr-10"> Save</button>
																		<button type="button" class="btn btn-default">Cancel</button>
																	</div>
																</div>
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
								<h6 class="panel-title txt-dark">List  of Specification</h6>
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
													<th style="width:65%">Specification </th>
													<th style="width:15%">Status</th>
													<th style="width:10%">Action</th>
												</tr>
											</thead>
											
											<tbody>

												<?php $i=1; foreach($res as $rows){ ?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $rows->spec_name; ?></td>
													<td><?php if($rows->status=='Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
													<td><a href="<?php echo base_url(); ?>admin/specification/<?php  echo base64_encode($rows->id*9876); ?>" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt"></i></a>

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


$('#adminform').validate({
	  ignore: ":hidden",
    rules: {
        spec_name : {
           required: true,
					 remote: {
                 url: "<?php echo base_url(); ?>specification/check_spec_name",
                 type: "post"
              }
       },

			spec_status : {required: true,}
    },
    messages: {
        spec_name: { required:"Enter  Specification",remote:"Specification Name Alreaady Exist" },
		   	spec_status: { required:"Select status"},
    },
    submitHandler: function(form) {
        $.ajax({
            url: "<?php echo base_url(); ?>specification/create_spec_name",
            type: 'POST',
            data: $('#adminform').serialize(),
            success: function(response) {
            if (response == "success") {
                  swal({
                  title: "Success",
                  text: "Added Successfully",
                  type: "success"
              }).then(function() {
                  location.href = '<?php echo base_url(); ?>admin/specification';
              });

                } else{
                    sweetAlert("Oops...", response, "error");
                }
            }
        });
    }

});
</script>
