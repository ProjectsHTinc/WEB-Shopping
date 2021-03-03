<!-- Page Breadcrumb Start -->
        <div class="sub-breadcrumb" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url(); ?>assets/category/default_banner.png) no-repeat scroll center center / cover;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center ptb-70" >
                            <h1>Cart Process</h1>
                            <ul class="breadcrumb-list breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">home</a></li>
                                <li>Cart Process</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Breadcrumb End -->
        
        <!-- checkout-area start -->
        <div class="checkout-area pt-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                     <?php
                        if (count($res_orders)>0){
							foreach($res_orders as $olist){ }
						?>
                             <h3>Delivery Details</h3>
                             		<div class="col-md-12">
                                     <div class="checkout-form-list mtb-20">
                                            <label>Order ID : <?php echo $olist->order_id; ?></label>
                                                <p><?php echo $olist->full_name; ?></p>
                                                <p><?php echo $olist->house_no; ?>, <?php echo $olist->street; ?></p>
                                                <p><?php echo $olist->city; ?>, <?php echo $olist->state; ?></p>
                                                <p><?php echo $olist->country_name; ?></p>
                                                <p><?php echo $olist->pincode; ?></p>
                                                <p>Mobile Number  : <?php echo $olist->mobile_number ; ?> <?php if ($olist->alternative_mobile_number !=''){ echo $olist->alternative_mobile_number; } ?></p><br />
                                                <?php if ($olist->landmark !=''){ ?>
                                                <p>Landmark : <?php echo $olist->landmark; ?></p>
                                                <?php } ?>
                                        </div>
                                    </div>
                                    
                         <?php } ?>
                   </div>
                     <div class="col-lg-6 col-md-6">
                         <?php
                        if (count($res_cart_list)>0){
						?>
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                 
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total"  style="text-align:right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
<?php 
									$total_amount = '0';
									foreach($res_cart_list as $clist){ 
										$cart_id = $clist->id;
										$sproduct_id = $clist->product_id;
										$product_combined_id = $clist->product_combined_id;
										$product_name = $clist->product_name;
										$product_id = $clist->product_id * 663399;
										$enc_product_name = strtolower(preg_replace("/[^\w]/", "-", $clist->product_name));
										$enc_product_id = base64_encode($product_id);
										$quantity = $clist->quantity;
										$stotal = $clist->total_amount;
										$price = $clist->price;;
										
										
										if ($product_combined_id >0){
											$cproduct_details = $this->homemodel->get_colour_size($product_combined_id);
											if (count($cproduct_details)>0){
												foreach($cproduct_details as $cprod){ 
													 $product_size = $cprod->size;
													 $product_colour = $cprod->attribute_name;
												}
											} 
										}else {
												$product_size = '';
												$product_colour = '';
											}
									?>
                                        
                                            <tr class="cart_item">
                                                <td class="product-name"><?php echo $product_name;?> <strong class="product-quantity"> × <?php echo $quantity;?></strong>
                                                </td>
                                                <td class="product-total" style="text-align:right">
                                                    <span class="amount">₹<?php echo $stotal;?></span>
                                                </td>
                                            </tr>
                                      <?php $total_amount = $total_amount + $stotal;
									  } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td  style="text-align:right"><span class="amount">₹<?php echo number_format((float)$total_amount, 2, '.', ''); ?></span></td>
                                            </tr>
											<?php foreach($res_orders as $olist){ 
											
											$promo_amount = $olist->promo_amount;
											$wallet_amount = $olist->wallet_amount;
											$paid_amount = $olist->paid_amount;
											
											} ?>
											<?php if ($promo_amount != '0.00'){ ?>
											<tr >
                                                <th style="color:#d50303;">Promo Amount <a href="<?php echo base_url(); ?>home/remove_promo/" onclick="return confirm('Are you sure?')"><i class="fa fa-times" aria-hidden="true"></i></a></th>
                                                <td  style="text-align:right"><span class="amount" style="color:#d50303;">₹<?php echo number_format((float)$promo_amount, 2, '.', ''); ?></span></td>
                                            </tr>
											<?php } ?>
											<?php if ($wallet_amount != '0.00'){ ?>
											<tr >
                                                <th style="color:#d50303;">Wallet Amount <a href="<?php echo base_url(); ?>home/remove_wallet/" onclick="return confirm('Are you sure?')"><i class="fa fa-times" aria-hidden="true"></i></a></th>
                                                <td  style="text-align:right"><span class="amount" style="color:#d50303;">₹<?php echo number_format((float)$wallet_amount, 2, '.', ''); ?></span></td>
                                            </tr>
											<?php } ?>												
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td  style="text-align:right"><strong><span class="amount">₹<?php echo number_format((float)$paid_amount, 2, '.', ''); ?></span></strong>
                                                </td>
                                            </tr>
											
                                        </tfoot>
                                    </table>
									
									
									
									<form method="post" name="customerData" id="customerData" class="confirm_process">
									<?php if ($promo_amount == '0.00'){ ?>
									<table>
										<tbody>
										<tr>
											<td><input placeholder="Apply Promo Code" type="text" name="promo_code" id="promo_code" value="" style="width:150px;background: #ffffff; color:#ccc;border: 1px solid #ccc;padding:5px;font-size: 15px;font-weight: 600;height: 40px;">&nbsp;<input type="button" value="Apply" onclick="promo_apply()" name="promo_btn" id="promo_btn" style="width:150px;background: #797979; color:#ffffff;border: 1px solid #ccc;padding:5px;font-size: 15px;font-weight: 600;height: 40px;text-transform: uppercase;" ></td>
										</tr>
										</tbody>
									</table>
									<div id="res_message"></div>
									<?php } ?>		
									<table>
										<tbody>
										<tr>
											<td><input type="radio" name="payment_tupe" id="payment_tupe" value="One" checked>Cash on Delivery</td>
											<?php
												if (count($wallet_status)>0){
													foreach($wallet_status as $wallet){ 
														$wallet_amt = $wallet->amt_in_wallet;
												}
							
											?>
											<?php if ($wallet_amt !='0.00'){ ?>
											<td><input type="radio" name="payment_tupe" id="payment_tupe" value="Two">Wallet</td>
											<?php } 
											
											} ?>
											<td><input type="radio" name="payment_tupe" id="payment_tupe" value="Three">CCAvenue</td>
										</tr>
										</tbody>
									</table>
									</form>
                                </div>

								<div id="showOne" class="myDiv">
                                    <div class="payment-accordion">
                                        <div class="order-button-payment" name="COD" id="COD">
										<form method="post" name="frmCOD" id="frmCOD" class="confirm_process" action="<?php echo base_url(); ?>home/cod_apply/">
											<input type="hidden" name="order_id" id="order_id" value="<?php echo $olist->order_id;;?>"/>
											<input type="submit" value="Cash on Delivery" class="btn btn-primary">
											</form>
			                          </div>
                                    </div>
                                </div>
								
								<div id="showTwo" class="myDiv">
                                    <div class="payment-accordion">
                                        <div class="order-button-payment" name="Wallet"  id="Wallet">
										<form method="post" name="frmWallet" id="frmWallet" class="confirm_process" action="<?php echo base_url(); ?>home/wallet_apply/">
											<input type="hidden" name="order_id" id="order_id" value="<?php echo $olist->order_id;;?>"/>
											<input type="submit" value="Use Wallet" class="btn btn-primary">
											</form>
			                          </div>
                                    </div>
                                </div>
								
                                <div id="showThree" class="myDiv">
                                    <div class="payment-accordion">
                                        <div class="order-button-payment" name="CCAvenue" id="CCAvenue">
										<form method="post" name="CCAvenueData" id="CCAvenueData" class="confirm_process" action="<?php echo base_url(); ?>ccavenue/ccavRequestHandler.php">
											<input type="hidden" name="merchant_id" value="216134"/>
											<input type="hidden" name="order_id" id="order_id" value="<?php echo $olist->order_id;;?>"/>
											<input type="hidden" name="amount" value="<?php echo number_format((float)$paid_amount, 2, '.', '');?>"/>
											<input type="hidden" name="currency" value="INR"/>
											<input type="hidden" name="redirect_url" value="<?php echo base_url(); ?>ccavenue/ccavResponseHandler.php"/>
											<input type="hidden" name="cancel_url" value="<?php echo base_url(); ?>"/>
											<input type="hidden" name="language" value="EN"/>
											<input type="submit" value="CCAvenue Payment" class="btn btn-primary">
											</form>
			                          </div>
                                    </div>
                                </div>


                            </div>
                            <?php } ?>
                        </div>

                </div>
            </div>
        </div>
<script type="text/javascript">

$(document).ready(function(){
	$("#showTwo").hide();
	$("#showThree").hide();
	
	 $("#CCAvenueData").submit(function() {
			$(this).submit(function() {
				return false;
			});
			return true;
		}); 
		
	$('input[type="radio"]').click(function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
}); 

function promo_apply() {
	if($("#customerData").validate()){
            var promo_code = document.getElementById("promo_code").value;
			var order_id = document.getElementById("order_id").value;
		if ( promo_code == ""){
			$("#res_message").html("Please enter promo code!..");
		}else {
			$.ajax({
				type:"POST",
				cache:false,
				data:{"promo_code": promo_code,"order_id": order_id},
				url:'<?php echo base_url(); ?>/home/apply_promo',
				success: function (message) {
					console.log(message);
					if (message == 'Already'){
						$("#res_message").html("Promocode Already Used");
					}
					if (message == 'Added'){
						//$("#res_message").html("Promocode Added");
						window.location = "<?php echo base_url(); ?>home/promo_review/";
					}
					if (message == 'Error'){
						$("#res_message").html("Promocode Error");
					} 
				  //$('#add').val('data sent');
				  //$('#msg').html(html);
				  // $('#pprice').html("Price: $"+html);
				}
			});
		}
	}
}


</script>