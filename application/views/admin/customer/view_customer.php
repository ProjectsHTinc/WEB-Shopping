	<div class="container-fluid">
          <div class="row">
    				<div class="row heading-bg bg-blue">
    					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    					  <h5 class="txt-dark">Customers</h5>
    					</div>

    					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    					  <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
    							<li><a href="<?php echo base_url(); ?>admin/customers"><span> Customer </span></a></li>
    							<li class="active"><span>View </span></li>
    					  </ol>
    					</div>
    			</div>
    		</div>
				<!-- Row -->
				<div class="row" id="">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"> List of Customer</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display responsive product-overview mb-30" id="myTable">
												<thead>
													<tr>
														<th style="width:100px;">S.no</th>
														<th style="width:100px;">Name</th>
														<th>Mobile</th>
														<th>Email</th>
														<th>Wallet</th>
														<th>Used Wallet</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<?php  $i=1; foreach($res as $row_cus){   
														$amt_in_wallet = $row_cus->amt_in_wallet;
														$total_amt_used = $row_cus->total_amt_used;
													?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $row_cus->name; ?></td>
														<td><?php echo $row_cus->phone_number; ?></td>
														<td><?php echo $row_cus->email; ?></td>
														<td><?php if ($amt_in_wallet != '') { echo $amt_in_wallet; } ?></td>
														<td><a href="<?php echo base_url(); ?>admin/customer_wallet_history/<?php echo base64_encode($row_cus->id*9876); ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Wallet History" ><?php if ($total_amt_used != '') { echo $total_amt_used; } ?></a></td>
														<td><?php if($row_cus->cus_status == 'Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
														<td>
									<a href="<?php echo base_url(); ?>admin/customer_details/<?php echo base64_encode($row_cus->id*9876); ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="View Customer details" ><i class="icon-list"></i></a>
									<!-- <a href="javascript:void(0)" class="text-inverse" title="View product" data-toggle="tooltip"><i class="fa fa-navicon"></i></a> -->
								</td>
													</tr>
												<?php $i = $i+1; } ?>



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
function change_status(rw_id,stat_id){

	var rw_id=rw_id;
	var stat_id=stat_id;
			swal({
    title: "Are you sure?",
    text: "You want to Change status",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes, I am sure!',
    cancelButtonText: "No, cancel it!"
 }).then(
       function () {
				 $.ajax({
						 url: "<?php echo base_url(); ?>customerprofile/change_status",
						 type: 'POST',
						data:{rw_id:rw_id,stat_id:stat_id},
						 success: function(response) {
						 //	alert(response);
						 if (response == "success") {
							 $.toast({
										 heading: 'Updated',
										 text: 'Status Updated Successfully',
										 position: 'top-right',
										 loaderBg:'#3cb878',
										icon: 'success',
										hideAfter: 3500,
										 stack: 6
									 });
									 $("#myTable").load(location.href+" #myTable>*","");
								 } else{
										 sweetAlert("Oops...", response, "error");
								 }
						 }
				 });
			 },
       function () { return false; });
}
</script>
