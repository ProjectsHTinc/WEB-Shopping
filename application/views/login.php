        <!-- Page Breadcrumb Start -->
        <div class="sub-breadcrumb" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url(); ?>assets/category/default_banner.png) no-repeat scroll center center / cover;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center ptb-70" >
                            <h1>My Account</h1>
                            <ul class="breadcrumb-list breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">home</a></li>
                                 <li><a href="#">account</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Breadcrumb End -->
		
		
        <!-- LogIn Page Start -->
        <div class="log-in pb-100">
            <div class="container-fluid">
                <div class="row">
                    <!-- New Customer Start -->
                    <div class="col-sm-6">
                        <div class="well">
                            <div class="new-customer">
                                <h3>New Customer</h3>
                                <p class="mtb-10"><strong>Register</strong></p>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made</p>
                                <a class="customer-btn" href="<?php echo base_url(); ?>register/">continue</a>
                            </div>
                        </div>
                    </div>
                    <!-- New Customer End -->
                    <!-- Returning Customer Start -->
                    <div class="col-sm-6">
                        <div class="well">
                            <div class="return-customer">
                                <h3 class="mb-10">Returning Customer</h3>
                                <p class="mb-10"><strong>I am a returning customer</strong></p>
                               
							    <form name="login" id="login" method="post" action="">
                                    <div class="form-group">
                                        <label class="control-label">Enter you email address or Mobile</label>
                                        <input type="text" name="username" placeholder="Enter you email address or Mobile" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="pass" placeholder="Password" id="pass" class="form-control">
                                    </div>
                                    <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
    										<strong>Invalid Username or Password </strong>
  									</div>
                                    <p class="lost-password"><a href="<?php echo base_url(); ?>forgotpassword/">Forgot password?</a></p>
                                    <input type="submit" value="Login" class="return-customer-btn">
                                </form>
							   
							   
                            </div>
                        </div>
                    </div>
                    <!-- Returning Customer End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- LogIn Page End -->
		
		
 <script language="javascript">

	$('#login').validate({ // initialize the plugin
    rules: {
		username: {
            required: true,
            remote: {
                   url: "<?php echo base_url(); ?>home/chkusername",
                   type: "post"
                }
        },
		pass: {
            required: true,
        },
    },
    messages: {
		username: { required:"Enter your Email or Mobile",remote:"Email or Mobile Error!"},
		pass: { required:"Enter Password"},
    },
    submitHandler: function(form) {
		$.ajax({
            url: "<?php echo base_url(); ?>home/customer_login",
            type: 'POST',
            data: $('#login').serialize(),
            success: function(response) {
                if (response == "login") {
                        location.href = '<?php echo base_url(); ?>myaccount/';
                } else {
					$('#error').show();
                }
            }
        });
    }
});
</script>