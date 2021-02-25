<!-- Page Breadcrumb Start -->
        <div class="sub-breadcrumb" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url(); ?>assets/category/default_banner.png) no-repeat scroll center center / cover;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center ptb-70" >
                            <h1>My Account</h1>
                            <ul class="breadcrumb-list breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">home</a></li>
                                <li>Add Money to Wallet</li>
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
                       
							<div class="col-lg-8 col-md-8">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content mt-all-40">
      
                                <div id="account-details" class="tab-pane fade in active">
                                    <h3>Add Money to Wallet </h3>
                                    <div class="register-form login-form clearfix">
                                      <fieldset>
                                        <div class="form-group row">
                                            <label for="f-name" class="col-lg-4 col-md-4 col-form-label">Amount: <span class="require"></span></label>
                                            <div class="col-lg-4 col-md-4"><?php echo number_format((float)$wallet_amount, 2, '.', '');?></div>
											<div class="col-lg-4 col-md-4"><form method="post" name="customerData"  class="confirm_process" action="<?php echo base_url(); ?>ccavenue/walletRequestHandler.php">
											<input type="hidden" name="merchant_id" value="216134"/>
											<input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>
											<input type="hidden" name="amount" value="<?php echo number_format((float)$wallet_amount, 2, '.', '');?>"/>
											<input type="hidden" name="currency" value="INR"/>
											<input type="hidden" name="redirect_url" value="<?php echo base_url(); ?>ccavenue/adding_money_to_wallet.php"/>
											<input type="hidden" name="cancel_url" value="<?php echo base_url(); ?>"/>
											<input type="hidden" name="language" value="EN"/>
											<input type="submit" value="Add Money" class="btn btn-primary">
										</form></div>
                                        </div>
                                    </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-2 pro-img">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account Page End Here -->
<script language="javascript">

	$('#review_wallet').validate({ // initialize the plugin
    rules: {
		wallet_amount: {
            required: true,
        }
    },
    messages: {
		wallet_amount: { required:"Enter Amount"}
    },
    
});
</script>