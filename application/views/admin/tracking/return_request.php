<style>
.form-control .error{
	border:1px solid red;
}
</style>

	<div class="container-fluid">
      <div class="row">
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Return Request</h5>
					</div>

					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>admin/tracking"><span>Orders</span></a></li>
						<li class="active"><span>Return Request</span></li>
					  </ol>
					</div>
			</div>
		</div>


					<!-- Row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Return Requests</h6>
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
													<th>Name</th>
													<th>Order id </th>
													<th>Question</th>
													<th>Answer</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach($res_request as $rows){ ?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $rows->name; ?></td>
													<td><?php echo $rows->order_id; ?></td>
													<td><?php echo $rows->question; ?></td>
													<td><?php echo $rows->answer_text; ?></td>
													<td><a href="<?php echo base_url(); ?>admin/invoice/<?php echo base64_encode($rows->order_id); ?>" target="_blank" data-toggle="tooltip" title="view items & Invoice" ><i class="ti-align-justify"></i></a></td>
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

			<div class="modal fade open-AddBookDialog" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h5 class="modal-title" id="exampleModalLabel1">Update status</h5>
							</div>
								<form action="#" method="post" id="order_form" name="order_form" enctype="multipart/form-data">
							<div class="modal-body">

									<div class="form-group">
										<label for="message-text" class="control-label mb-10">Current status</label>
										<input type="text" class="form-control" id="current_order_status" name="current_order_status" value="" readonly>
									</div>
									<div class="form-group">
										<label for="recipient-name" class="control-label mb-10">Change status</label>
										<select class="form-control" id="order_status" name="order_status" >
											<option value="">Select Status</option>
											<option value="Processing">Processing</option>
											<option value="Shipped">Shipped</option>
											<option value="Out for Delivery">Out for Delivery</option>
											<option value="Delivered">Delivered</option>
										</select>
											<script> </script>
										<input type="hidden" id="order_id" name="order_id" value="">

									</div>
									<div class="form-group">
										<label for="message-text" class="control-label mb-10">This message will sent to Customer:</label>
										<textarea class="form-control" id="msg_to_customer" rows="6" name="msg_to_customer"></textarea>
									</div>

							</div>
							<div class="modal-footer">

								<button type="submit" class="btn btn-success">Update Status</button>
							</div>
								</form>
						</div>
					</div>
				</div>



	</div>

<script>

$('#order_status').change(function(){
	var status_name=$(this).val();
		$('#msg_to_customer').val("");
	$.ajax({
		 url: "<?php echo base_url(); ?>tracking/get_status_msg",
		 type: 'POST',
		 data:{status_name:status_name},
		 dataType: "JSON",
		 cache: false,
		 success: function(response){

				$('#msg_to_customer').val(response[0].msg);

			}
	});
});
$('#exampleModal').on('show.bs.modal', function(e) {
		 	var bookId = $(e.relatedTarget).data('id');
			$(e.currentTarget).find('input[name="order_id"]').val(bookId);
			var order_status = $(e.relatedTarget).data('order-status');
			$(e.currentTarget).find('input[name="order_status"]').val(order_status);
			var order_status = $(e.relatedTarget).data('order-status');
			$(e.currentTarget).find('input[name="current_order_status"]').val(order_status);
		//	$('#order_status').val(order_status);
});
jQuery.validator.addMethod("notEqual", function(value, element, param) {
 return this.optional(element) || value != $(param).val();
}, "This is the current status");

$("#order_form").validate({
	ignore: ":hidden",
rules: {
		order_status:{required:true,notEqual: "#current_order_status" },
		msg_to_customer:{required:true}

},
	messages: {
		order_status:{required:"Select status"},
		msg_to_customer:{required:"Enter Message"}
	},
submitHandler: function (form) {
	swal('Please wait')
	swal.showLoading();
	$.ajax({
			url: "<?php echo base_url(); ?>tracking/get_update_status",
			type: 'POST',
			data: $('#order_form').serialize(),
			success: function(response) {
				if (response == "success") {
					swal('Please wait')
					swal.showLoading();
					window.setTimeout(function () {
					 location.href = "<?php echo base_url(); ?>admin/tracking";
			 }, 2000);
				}else{
						sweetAlert("Oops...", response, "error");
				}
			}
	});
}
});


</script>
