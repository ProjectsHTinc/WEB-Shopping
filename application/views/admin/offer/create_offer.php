	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Offer Products</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
						<li><a href="#"><span>Offer Product</span></a></li>
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
										<h6 class="panel-title txt-dark">Offer Products</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">

										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo base_url(); ?>offermaster/create_offer" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
														<div class="form-body">
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Select Product <span class="compulsary-text">*</span></label>
																		<select class="form-control" data-placeholder="Choose a Status" tabindex="1" name="prod_id" id="prod_id">
																			<option value="">Select Product</option>
																		<?php foreach($res_prod as $row_prod){ ?>
																				<option value="<?php echo $row_prod->id ?>"><?php echo $row_prod->product_name ?></option>
																	<?php 	} ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Offer Name <span class="compulsary-text">*</span></label>
																		<input type="text" name="offer_name" id="offer_name" class="form-control" placeholder="">
																	</div>
																</div>
																<!--/span-->

																<!--/span-->
															</div>
															<div class="row">
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Actucal Price <span class="compulsary-text">*</span></label>
																		<input type="text" name="actucal_price" id="actucal_price" class="form-control" placeholder="" readonly>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Offer Percentage (%)<span class="compulsary-text">*</span></label>
																		<input type="text" name="offer_percentage" id="offer_percentage" class="form-control" placeholder="Enter discount in Percentage" onblur="offer_price_cal()">
																	</div>
																</div>
															</div>
															<!-- /Row -->
															<div class="row">
																
																<!--/span-->
																<div class="col-md-6">
																	<input type="hidden" name="prod_actucal_price" id="prod_actucal_price" class="form-control" placeholder="" readonly>
																</div>
																<!--/span-->
															</div>


															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Offer Price <span class="compulsary-text">*</span></label>
																		<input type="text" name="offer_price" id="offer_price" class="form-control" placeholder="" >
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Offer Image <span class="compulsary-text">*</span></label>
																		<input type="file" class="form-control" name="ad_img" id="ad_img" placeholder="">
																	</div>
																</div>
															</div>
															

															
																
																
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
																	<label class="control-label mb-10">&nbsp;</label><br>
																	<input type="checkbox" id="notiication" name="notiication" value="Y" >&nbsp;&nbsp;Send Notification
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
								<h6 class="panel-title txt-dark">List  of Offer products</h6>
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
													<th>Product</th>
													<th>Offer name</th>
													<th>actucal Price</th>
													<th>Offer price</th>
													<th>Percentage</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>

												<?php $i=1; foreach($res_offer_prod as $rows_offer){ ?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $rows_offer->product_name; ?></td>
													<td><?php echo $rows_offer->offer_name; ?></td>
													<td><?php echo $rows_offer->prod_actual_price; ?></td>
													<td><?php echo $rows_offer->offer_price; ?></td>
													<td><?php echo $rows_offer->offer_percentage; ?> %</td>
													<td><?php if($rows_offer->status=='Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
													<td><a href="<?php echo base_url(); ?>admin/edit_offer/<?php  echo base64_encode($rows_offer->id*9876); ?>"><i class="ti-pencil-alt"></i></a>

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

function offer_price_cal(){
  var amd = $('#actucal_price').val();
  var disc = $('#offer_percentage').val();
	var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
 	var mult = amd*dec; // gives the value for subtract from main value
 	var discont = amd-mult;
  $('#offer_price').val(discont);
}
$('#prod_id').change(function(){
		$('#offer_percentage').val("");
		$('#offer_price').val("");
    var prod_id=$(this).val();
		$.ajax({
			 url: "<?php echo base_url(); ?>offermaster/get_product_price",
			 type: 'POST',
			 data:{prod_id:prod_id},
			 dataType: "JSON",
			 cache: false,
			 success: function(response){
					//alert(response[0].prod_actual_price)
						$('#prod_actucal_price').val(response[0].prod_actual_price);
					$('#actucal_price').val(response[0].prod_actual_price);
					// $("#actucal_price").html('<label class="control-label mb-10">Actucal Price</label> : '+response[0].prod_actual_price+'');
				}
		});
})

$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than 1 Mb');

$('#adminform').validate({ // initialize the plugin
    rules: {
        prod_id: {required: true,
          remote: {
                url: "<?php echo base_url(); ?>offermaster/check_offer_product",
                type: "post"
             }
           },
        offer_name : {
           required: true, maxlength: 100
       },
			 offer_percentage : {
					required: true,number:true, maxlength: 2
			},
			actucal_price : {
				 required: true
		 },
		 ad_img : {
				 required: true,accept: "jpg,jpeg,png",filesize: 1048576,
		 },
		 offer_status : {
					required: true
				}
    },
    messages: {
				prod_id: { required:"Select product",remote:"Product already exist" },
				offer_name: { required:"Enter  title",maxlength:"Max length is 100 characters"},
				actucal_price: { required:"Actucal Price required"},
				offer_percentage: { required:"Enter Number", number:"only numbers need"},
				ad_img: { required:"Select Offer image", accept:"Please upload .jpg or .png .",fileSize:"File must be JPG or PNG, less than 1MB"},
				offer_status: { required:"select  status"}
    }

});
</script>
