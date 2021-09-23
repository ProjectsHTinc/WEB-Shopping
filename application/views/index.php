<?php  if (count($home_banner)>0){ ?>
        <!-- Slider Area Start -->
        <div class="slider-area pb-50 home-2-slider">
            <!-- Main Slider Area Start -->
            <div class="slider-wrapper theme-default">
                <!-- Slider Background  Image Start-->
                 
                <div id="slider" class="nivoSlider">
                <?php foreach($home_banner as $imglist){ 
						$img_id = $imglist->id;
						$picture = $imglist->banner_image;
						$banner_title  = $imglist->banner_title ;
						$disp_banner_title = wordwrap($banner_title, 22, "<br />");
						$banner_desc  = $imglist->banner_desc ;
						$disp_banner_desc  = wordwrap($banner_desc, 25, "<br />");
						$sproduct_id  = $imglist->product_id;
						//$sproduct_id = $prod->product_id;
						$product_id = $imglist->id * 663399;
						$enc_product_name = strtolower(preg_replace("/[^\w]/", "-", $imglist->product_name));
						$enc_product_id = base64_encode($product_id);
				?>
                    <a href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/"><img src="<?php echo base_url(); ?>assets/banner/<?php echo $picture; ?>" data-thumb="<?php echo base_url(); ?>assets/banner/<?php $picture; ?>" alt="" title="#htmlcaption<?php echo $img_id;?>" /></a>
                <?php } ?>
                </div>
               
                <!-- Slider htmlcaption End -->
                <?php } ?>
            </div>
            <!-- Main Slider Area End -->
        </div>
        <!-- Slider Area End -->


		<div class="home-home-2-banner pb-50">
            <div class="container-fluid">
                <div class="row">
                    <!-- Single Banner Start -->
                    <div class="col-sm-4">
                        <div class="single-banner zoom">
                             <a href="<?php echo base_url(); ?>home/categories/4/baby/"><img src="<?php echo base_url(); ?>assets/offers/offer_add1.jpg" alt="Offers"></a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                    <!-- Single Banner Start -->
                    <div class="col-sm-4">
					
					<?php  if (count($home_offers)>0){ 
					
						foreach($home_offers as $noffer){ 
									$sproduct_id = $noffer->product_id;
									$product_id = $noffer->product_id * 663399;
									$disp_product_name = $noffer->product_name;
									$enc_product_name = strtolower(preg_replace("/[^\w]/", "-", $noffer->product_name));
									$enc_product_id = base64_encode($product_id);
									$disp_offer_name = $noffer->offer_name;
									$offer_pic = $noffer->offer_image;
						}
					?>
                        <div class="single-banner zoom">
                            <img src="<?php echo base_url(); ?>assets/offers/<?php echo $offer_pic; ?>" alt="single-banner">
                            <div class="banner-content">
                                <h5><?php echo $disp_product_name; ?></h5>
                                <h3><?php echo $disp_offer_name; ?></h3>
                                <a href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/">shop now</a>
                            </div>
                        </div>
					<?php } ?>
                    </div>
                    <!-- Single Banner End -->
                    <!-- Single Banner Start -->
                    <div class="col-sm-4">
                        <div class="single-banner zoom">
                            <a href="<?php echo base_url(); ?>home/categories/7/clothing/"><img src="<?php echo base_url(); ?>assets/offers/offer_add2.jpg" alt="Offers"></a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        
		<?php  if (count($home_newproducts)>0){ ?>
        <!-- New Products Selection Start -->
        <div class="new-products-selection pb-80">
            <div class="container-fluid">
                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col-xs-12">
                        <div class="section-title text-center mb-40">
                            <span class="section-desc mb-15">Top new in this week</span>
                            <h3 class="section-info colour_blue">New Products</h3>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- New Products Activation Start -->
                        <div class="new-products owl-carousel">
                        
                        <?php foreach($home_newproducts as $npro){ 
								$sproduct_id = $npro->id;
								$product_id = $npro->id * 663399;
								$enc_product_name = strtolower(preg_replace("/[^\w]/", "-", $npro->product_name));
								$enc_product_id = base64_encode($product_id);
								$combined_status = $npro->combined_status;
								$offer_status = $npro->offer_status;
								$prod_actual_price = $npro->prod_actual_price;
								$stocks_left = $npro->stocks_left;
								$posteddate = date("d-m-Y",strtotime($npro->created_at));
								$check_date = date("d-m-Y",strtotime("-15 day"));
								
								
								if ($offer_status =='1'){
									$offer_details = $this->homemodel->get_offer_details($sproduct_id);
								if (count($offer_details)>0){
									foreach($offer_details as $offer){ 
										$offer_percentage = $offer->offer_percentage;
									}
								}
									$soffer_price = ($offer_percentage / 100) * $prod_actual_price;
									$doffer_price = $prod_actual_price - $soffer_price;
									$offer_price = number_format((float)$doffer_price, 2, '.', '');
								}
                            ?>                    
                            <!-- Double Product Start -->
                            <div class="double-products">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/">
                                            <img class="primary-img" src="<?php echo base_url(); ?>assets/products/<?php echo $npro->product_cover_img; ?>" alt="single-product">
                                            <!--<img class="secondary-img" src="<?php echo base_url(); ?>assets/front/img/new-products/1_2.jpg" alt="single-product">-->
                                        </a>
                                        <!--<div class="quick-view">
                                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                        </div>-->
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content text-center">
                                        <h4><a href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/"><?php echo $npro->product_name; ?></a></h4>
                                        <?php if ($offer_status == '1'){ ?>
                                        <p class="price"><span class="mrp">₹<?php echo $prod_actual_price;?></span> <span>₹<?php echo $offer_price;?></span></p>
										<?php } else { ?>
                                        <p class="price"><span>₹<?php echo $prod_actual_price;?></span></p>
                                        <?php } ?>
                                        <div class="action-links2">
                                         <?php 
										 if ($stocks_left>0){
											 if ($combined_status == '1'){ ?>
												<a data-toggle="tooltip" title="View Products" href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/" style="background:#ffb23c;">View product</a>
											<?php } else { ?>
												<a data-toggle="tooltip" title="Add to Cart" href="<?php echo base_url(); ?>home/addcart/<?php echo $sproduct_id; ?>/">Add to Cart</a>
											 <?php }
										 } else {
										?>
											 <a data-toggle="tooltip" title="Out of Stock" style="background:#e11313;">Out of Stock</a>
										 <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Double Product End -->
                            <?php } ?>
                                                       
                        </div>
                        <!-- New Products Activation End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- New Products Selection End -->
<?php } ?>
        

 
        
<?php  if (count($home_advertisement)>0){ 
		foreach($home_advertisement as $nadv){ 
			$scat_id = $nadv->sub_cat_id;
			$cat_id = $nadv->sub_cat_id * 663399;
			$enc_cat_name = strtolower(preg_replace("/[^\w]/", "-", $nadv->category_name));
			$enc_cat_id = base64_encode($cat_id);
			$adv_title = $nadv->ad_title;
			$adv_img = $nadv->ad_img;
}
?>
        <!-- home-2 Big Banner Start -->
        <div class="h2-big-banner pb-100">
            <div class="container-fluid">
                <div class="row">
                    <!-- Big Banner Start -->
                    <div class="col-sm-12">
					<div class="single-banner zoom">
                             <a href="<?php echo base_url(); ?>home/subcategories/<?php echo $scat_id; ?>/<?php echo $enc_cat_name ; ?>/"><img src="<?php echo base_url(); ?>assets/ads/<?php echo $adv_img; ?>" alt="Offers"></a>
                        </div>
						
                        <!--<div class="big-banner text-center" style="background: url(<?php echo base_url(); ?>assets/ads/<?php echo $adv_img; ?>) no-repeat center center / cover;">
                            <div class="big-banner-desc">
                                <h2><?php echo $adv_title; ?></h2>
                                <a href="<?php echo base_url(); ?>home/subcategories/<?php echo $scat_id; ?>/<?php echo $enc_cat_name ; ?>/">view more</a>
                            </div>
                        </div>-->
                    </div>
                    <!-- Big Banner End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- home-2 Big Banner End -->
<?php } ?>




<?php  if (count($home_popularproducts)>0){ ?>       
        <!-- Best Seller Products Start -->
        <div class="best-seller-products pb-50">
            <div class="container-fluid">
                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col-xs-12">
                        <div class="section-title text-center mb-40">
                            <span class="section-desc mb-20">Most Viewed from customers</span>
                            <h3 class="section-info colour_blue">Popular Products</h3>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Best Seller Product Activation Start -->
                        <div class="best-seller new-products owl-carousel">
                        
                            <?php foreach($home_popularproducts as $vpro){ 
								$sproduct_id = $vpro->id;
				
								$product_id = $vpro->id * 663399;
								$enc_product_name = strtolower(preg_replace("/[^\w]/", "-", $vpro->product_name));
								$enc_product_id = base64_encode($product_id);
								$combined_status = $vpro->combined_status;
								$offer_status = $vpro->offer_status;
								$prod_actual_price = $vpro->prod_actual_price;
								$stocks_left = $vpro->stocks_left;
								
								if ($offer_status =='1'){
									$offer_details = $this->homemodel->get_offer_details($sproduct_id);
								if (count($offer_details)>0){
									foreach($offer_details as $offer){ 
										$offer_percentage = $offer->offer_percentage;
									}
								}
									$soffer_price = ($offer_percentage / 100) * $prod_actual_price;
									$doffer_price = $prod_actual_price - $soffer_price;
									$offer_price = number_format((float)$doffer_price, 2, '.', '');
								}
                            ?>                    
                            <!-- Double Product Start -->
                            <div class="double-products">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/">
                                            <img class="primary-img" src="<?php echo base_url(); ?>assets/products/<?php echo $vpro->product_cover_img; ?>" alt="single-product">
                                            <!--<img class="secondary-img" src="<?php echo base_url(); ?>assets/front/img/new-products/1_2.jpg" alt="single-product">-->
                                        </a>
                                        <!--<div class="quick-view">
                                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="pe-7s-look"></i>quick view</a>
                                        </div>
                                        <span class="sticker-new">new</span>-->
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content text-center">
                                        <h4><a href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/"><?php echo $vpro->product_name; ?></a></h4>
                                         <?php if ($offer_status == '1'){ ?>
                                        <p class="price"><span class="mrp">₹<?php echo $prod_actual_price;?></span> <span>₹<?php echo $offer_price;?></span></p>										<?php } else { ?>
                                        <p class="price"><span>₹<?php echo $prod_actual_price;?></span></p>
                                        <?php } ?>
                                        <div class="action-links2">
                                        <?php 
										 if ($stocks_left>0){
											 if ($combined_status == '1'){ ?>
												<a data-toggle="tooltip" title="View Products" href="<?php echo base_url(); ?>home/product_details/<?php echo $sproduct_id; ?>/<?php echo $enc_product_name ; ?>/" style="background:#ffb23c;">View Product</a>
											<?php } else { ?>
												<a data-toggle="tooltip" title="Add to Cart" href="<?php echo base_url(); ?>home/addcart/<?php echo $sproduct_id; ?>/">Add to Cart</a>
											 <?php }
										 } else {
										?>
											 <a data-toggle="tooltip" title="Out of Stock" style="background:#e11313;">Out of Stock</a>
										 <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Double Product End -->
                            <?php } ?>
                                               

                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Best Seller Products End -->
		</div>
<?php } ?>



