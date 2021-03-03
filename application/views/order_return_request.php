<!-- Page Breadcrumb Start -->
        <div class="sub-breadcrumb" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url(); ?>assets/category/default_banner.png) no-repeat scroll center center / cover;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center ptb-70" >
                            <h1>My Account</h1>
                            <ul class="breadcrumb-list breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">home</a></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Breadcrumb End -->
		
		
        <!-- My Account Page Start Here -->
        <div class="my-account white-bg pb-100">
            <div class="container-fluid">
                <div class="account-dashboard">
                   <div class="dashboard-upper-info">
                       <div class="row no-gutters align-items-center">
                           <div class="col-lg-3 col-md-3 col-sm-6">
                               <div class="d-single-info">
                                   <p class="user-name">Hello <span><?php echo $this->session->userdata('cust_email')?></span></p>
                                   <p>(not yourmail@info? <a href="<?php echo base_url(); ?>logout/">Log Out</a>)</p>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-3 col-sm-6">
                               <div class="d-single-info">
                                   <p>Need Assistance? Customer service at.</p>
                                   <p>admin@example.com.</p>
                               </div>
                           </div>
                           <div class="col-lg-2 col-md-3 col-sm-6">
                               <div class="d-single-info">
                                   <p>E-mail them at </p>
                                   <p>support@example.com</p>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-2 col-sm-6">
                               <div class="d-single-info text-center">
                                   <?php
                               if (count($count_cart_session) >0) { ?>
                                   <a class="view-cart" href="<?php echo base_url(); ?>viewcart/"><i class="fa fa-cart-plus" aria-hidden="true"></i>view cart</a>
                                   <?php } ?>
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <!-- Nav tabs -->
                            <ul class="nav flex-column dashboard-list" role="tablist">
                                <li><a href="<?php echo base_url(); ?>myaccount/">Dashboard</a></li>
                                <li class="active"><a href="<?php echo base_url(); ?>cust_orders/">Orders</a></li>
								<li><a href="<?php echo base_url(); ?>cust_wallet/">Wallet</a></li>
                                <li><a href="<?php echo base_url(); ?>cust_address/">Addresses</a></li>
                                <li><a href="<?php echo base_url(); ?>cust_details/">Account Details</a></li>
                                <li><a href="<?php echo base_url(); ?>cust_change_password/">Change Password</a></li>
                                <li><a href="<?php echo base_url(); ?>logout/">Logout</a></li>
                            </ul>
                        </div>
                        
                        
                        <div class="col-lg-10 col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content mt-all-40">
                                
                                <div id="orders" class="tab-pane fade in active">
                                    <h3>Retun Request</h3>
                                    <div class="table-content table-responsive">
                       
                        <?php
                       if (count($address_details)>0){
						   foreach($address_details as $order_address){ 
							$timestamp = strtotime($order_address->purchase_date);
							$print_total_amount = $order_address->total_amount;
							$print_paid_amount = $order_address->paid_amount;
							$print_promo_amount = $order_address->promo_amount;
							$print_wallet_amount = $order_address->wallet_amount;
							$print_payment_status = $order_address->payment_status;
						   }
					   }
						?>
						
                         <table width="100%" class="table" style="border:0px;">
                          <tr>
						   
                            <td style="text-align:left;line-height:30px;width:75%">
							<form name="return" id="return" method="post" action="<?php echo base_url(); ?>home/return_request_add/">
							 <table  class="table">
							<?php
								if (count($retun_questions)>0){
									$i=1;
									foreach($retun_questions as $questions){
							?>
								<tr>
									<td><input type="radio" name="question_id" value="<?php echo $questions->id; ?>" style="height:10px;" <?php if ($i == '1') echo "checked"; ?>   /></td>
									<td style="text-align:left;line-height:30px;"><p><?php echo $questions->question;?><p></td>
								</tr>
						<?php
									$i = $i+1;
								}
							}
						?>
								<tr> 
									<td></td>
									<td style="text-align:left;"><p style="font-weight:bold;">Notes</p><textarea id="return_notes" name="return_notes" rows="3" cols="50" style="margin-top:20px;"></textarea></td>
								</tr>
								<tr> 
									<td></td>
									<td style="text-align:left;">
									<input type="hidden" name="pruchase_order_id" id="pruchase_order_id" value="<?php echo $order_address->pruchase_order_id;?>"/>
									<button type="submit" class="return-customer-btn">Submit</button></td>
								</tr>
							
							</table>
							</form>
							</td>
							
							<td style="text-align:left;line-height:30px;width:25%;">
								Order ID : <?php echo $order_address->order_id; ?><br>
								Order Date : <?php echo date('d/m/Y', $timestamp); ?><br>
								Order Status : <?php echo $order_address->order_stauts; ?><br>
								Payment Mode : <?php echo $print_payment_status; ?>
							</td>
							
                          </tr>
                        </table>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account Page End Here -->
