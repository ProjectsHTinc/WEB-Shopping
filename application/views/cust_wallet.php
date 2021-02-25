<!-- Page Breadcrumb Start -->
        <div class="sub-breadcrumb" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url(); ?>assets/category/default_banner.png) no-repeat scroll center center / cover;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center ptb-70" >
                            <h1>My Account</h1>
                            <ul class="breadcrumb-list breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">home</a></li>
                                <li>Wallet History</li>
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
                                <li><a href="<?php echo base_url(); ?>cust_orders/">Orders</a></li>
								<li class="active"><a href="<?php echo base_url(); ?>cust_wallet/">Wallet</a></li>
                                <li><a href="<?php echo base_url(); ?>cust_address/">Addresses</a></li>
                                <li><a href="<?php echo base_url(); ?>cust_details/">Account Details</a></li>
                                <li><a href="<?php echo base_url(); ?>cust_change_password/">Change Password</a></li>
                                <li><a href="<?php echo base_url(); ?>logout/">Logout</a></li>
                            </ul>
                        </div>
                        
                        
                        <div class="col-lg-10 col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content mt-all-40">
                              <?php
									if (count($wallet)>0){
										foreach($wallet as $res_wallet){
											$wallet_amt = $res_wallet->amt_in_wallet;
										}
									}else {
											$wallet_amt = '0.00';
									}
								?>
                                <div id="orders" class="tab-pane fade in active">
								<div class="row pb-20">
										<div class="col-md-6"> <h2>Wallet - ₹ <?php echo $wallet_amt; ?></h2></div><div class="col-md-6 text-right"><a class="view" href="<?php echo base_url(); ?>add_wallet/">Add</a></div>
                                 </div>
                                    <div class="table-responsive">
								<?php
									if (count($wallet_history)>0){
								?>
                                        <table class="table">
                                            <thead>
                                                <tr>
													<th>Date</th>
													<th>Amount</th>
													<th>Notes</th>
                                                    <th>Status</th>	
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($wallet_history as $history){ 
											$transaction_amt = $history->transaction_amt;
											$notes = $history->notes;
											$transaction_date = $history->created_at;
											$dispDate = date("d M Y", strtotime($transaction_date));
											$status = $history->status;
											
											?>
                                                <tr>
													<td><?php echo $dispDate; ?></td>
													<td>₹<?php echo $transaction_amt;?></td>
													<td><?php echo $notes; ?></td>
                                                    <td><?php echo $status;?></td>
                                                </tr>
                                           <?php } ?>
                                            </tbody>
                                        </table>
                               <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account Page End Here -->
