<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Little A More - Admin</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/front/img/icon/favicon.png">
		
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap Daterangepicker CSS -->
		<link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
		
		<link href="<?php echo base_url(); ?>assets/vendors/dist/js/sweetalert2.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/vendors/dist/js/sweetalert2.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/vendors/dist/css/style.css" rel="stylesheet" type="text/css">
	
		<script src="<?php echo base_url(); ?>assets/vendors/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/dist/js/additional-methods.min.js"></script>

	
	</head>

<body>

    <div class="wrapper">
			<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
				<a href="<?php echo base_url(); ?>"><img class="brand-img pull-left" src="<?php echo base_url(); ?>assets/front/img/logo/logo.png" alt="Little A More" width="150" height="53"/></a>
				<ul class="nav navbar-right top-nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url(); ?>assets/vendors/dist/img/admin.png" alt="user_auth" class="user-auth-img img-circle" /><span class="user-online-status"></span></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/changepassword"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
                <li>
                    <a id="dashboard" href="<?php echo base_url(); ?>admin/home/"><i class="icon-picture mr-10"></i>Dashboard

                    </a>

                </li>
                <li>
                    <a href="javascript:void(0);" id="master" data-toggle="collapse" data-target="#ecom_dr"><i class="icon-basket-loaded mr-10"></i>Masters<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                    <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="<?php echo base_url(); ?>category/">Category</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/specification">Specification</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>attribute">Attribute</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/tags">Tags</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/zipcode">Zip Code</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a id="products" href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><i class="icon-grid mr-10"></i>Products <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                    <ul id="app_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/products">Create Products</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/view_products">View Products</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_tr"><i class="icon-vector mr-10"></i>Tracking <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                    <ul id="ui_tr" class="collapse collapse-level-1">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/tracking">View orders</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>admin/list_of_orders">List of orders</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><i class="icon-vector mr-10"></i>Promotional <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                    <ul id="ui_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/banner">Banners</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/ads">Adv Banner</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/offers">Offer Products</a>
                        </li>
						 <li>
                            <a href="<?php echo base_url(); ?>admin/promo">Promo Code Offers</a>
                        </li>

                    </ul>
                </li>
                <?php 	$user_role=$this->session->userdata('role_type_id');
                if($user_role=='1'){?>
                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><i class=" icon-flag mr-10"></i>Customer<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                      <ul id="form_dr" class="collapse collapse-level-1">
                          <li>
                              <a href="<?php echo base_url(); ?>admin/customers">View Customers</a>
                          </li>

                      </ul>
                  </li>
                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#sales_menu"><i class=" icon-flag mr-10"></i>Sales<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                      <ul id="sales_menu" class="collapse collapse-level-1">
                          <li>
                              <a href="<?php echo base_url(); ?>admin/sales">Sales Report</a>
                          </li>

                      </ul>
                  </li>

                <?php } ?>




            </ul>
			</div>
			<!-- /Left Sidebar Menu -->

			
<!-- Main Content -->
		<div class="page-wrapper">