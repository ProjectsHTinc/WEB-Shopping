        <!-- Footer Start -->
        <footer>
           <!-- Footer Middle Start -->
            <div class="footer-middle">
                <div class="container-fluid">
                    <div class="container-footer ptb-50">
                         <div class="row">
                            <!-- Single Footer Start -->
                            <div class="single-footer col-md-3 col-sm-6">
                                <div class="footer-logo">
                                    <a href="#"><img class="img" src="<?php echo base_url(); ?>assets/front/img/logo/logo.png" alt="logo-img"></a>
                                </div>
                                <div class="footer-content">
                                    <p>Little Amore is a conscious bespoke baby store. We handpick the best, softest cotton fabrics and organic muslin in modern and whimsical prints, and hope to bring more warmth and care to wrap your little bundle of joy! </p>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                            <!-- Single Footer Start -->
                            <div class="single-footer col-md-3 col-sm-6 pl-50">
                                <h4 class="footer-title">Quick Links</h4>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                    	<li><a href="<?php echo base_url(); ?>aboutus/">About Us</a></li>
                                        <li><a href="<?php echo base_url(); ?>contactus/">Contact Us</a></li>
                                        <li><a href="<?php echo base_url(); ?>offers/">Offer Zone</a></li>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">warranty</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                            <!-- Single Footer Start -->
                            <div class="single-footer col-md-3 col-sm-6">
                               
                                <div class="footer-content" style="margin-top:40px;">
                                    <ul class="footer-list">
                                    	<li><a href="#">delivery information</a></li>
                                        <li><a href="<?php echo base_url(); ?>privacy/">Privacy Policy</a></li>
                                        <li><a href="#">terms & conditions</a></li>
                                        
                                        <li><a href="#">returns</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                            <!-- Single Footer Start -->
                            <div class="single-footer col-md-3 col-sm-6">
                                <h4 class="footer-title">Contact Info</h4>
								<div class="footer-content">
                                 <ul class="footer-list first-content">
                                        <li><i class="pe-7s-map-marker"></i>No 28, 3rd cross west Acedata Building</li>
										<li style="margin-left:30px;">Bharathi Colony, Peelamedu</li>
										<li style="margin-left:30px;">Coimbatore - 641004</li>
                                        <li><i class="pe-7s-mail"></i>love@littleamore.in</li>
                                        <li><i class="pe-7s-call"></i>+91 87540 32022</li>
                                    </ul>
								</div>
                            </div>
                            <!-- Single Footer Start -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Container Footer End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom">
                <div class="container-fluid">
                    <div class="container-footer ptb-30">
                        <div class="row">
                            <div class="col-sm-7">
                                <p class="text-left copyright-text">Copyright ©  <a target="_blank" href="#">Little A More</a> All Rights Reserved.</p>
                            </div>
                            <div class="col-sm-5">
                                <!-- Footer Social List Start -->
                                <div class="socila-footer">
                                    <ul class="social-footer-list list-inline text-right">
                                        <li><a href="#"><i class="fa fa-facebook-square" style="color:#4267B2"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true" style="color:#833ab4"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true" style="color:#db4a39" ></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true" style="color:#0e76a8" ></i></a></li>
                                    </ul>
                                </div>
                                <!-- Footer Social List End --><i class="fab fa-instagram-square"></i>
                            </div>
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Container Footer End -->
                </div>
                 <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer End -->
 
    </div>
      <!-- Wrapper End -->

    <!-- mobile menu js  -->
    <script src="<?php echo base_url(); ?>assets/front/js/jquery.meanmenu.min.js"></script>
    <!-- scroll-up js -->
    <script src="<?php echo base_url(); ?>assets/front/js/jquery.scrollUp.js"></script>
    <!-- owl-carousel js -->
    <script src="<?php echo base_url(); ?>assets/front/js/owl.carousel.min.js"></script>
    <!-- wow js -->
    <script src="<?php echo base_url(); ?>assets/front/js/wow.min.js"></script>
    <!-- elevateZoom js -->
    <script src="<?php echo base_url(); ?>assets/front/js/jquery.elevateZoom-3.0.8.min.js"></script>
    <!-- nivo slider js -->
    <script src="<?php echo base_url(); ?>assets/front/js/jquery.nivo.slider.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
    <!-- plugins -->
    <script src="<?php echo base_url(); ?>assets/front/js/plugins.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url(); ?>assets/front/js/main.js"></script>


<script>
	$(document).ready(function() {
	    $('.pgwSlider').pgwSlider({
			
			autoSlide:false,
			displayControls :true,
			adaptiveHeight:false,
			verticalCentering:true
		});
	});
	
	$( function() {
		var availableTags = [<?php
		 $tot_count = count($tag_result);
		 $i = 1;
			foreach($tag_result as $res){
			echo "'";
			echo $str = addslashes($res->tag_name);
			echo "'";
			if ($i < $tot_count) echo ",";
			 $i = $i+1;} ?>];
		 
    $("#search_tags").autocomplete({
		source: availableTags,
		select: function(lamore, ui) {
			$("#search_tags").val(ui.item.value);
   		}
	});

	$("#search_tags1").autocomplete({
		source: availableTags,
		select: function(lamore, ui) {
			$("#search_tags1").val(ui.item.value);
   		}
	});
	
	
  });

 </script>
 <script id="addJS">jQuery(document).ready(function() {
  $('#gallery-2').royalSlider({
    fullscreen: {
      enabled: true,
      nativeFS: true
    },
    controlNavigation: 'thumbnails',
    thumbs: {
      orientation: 'vertical',
      paddingBottom: 4,
      appendSpan: true
    },
    transitionType:'fade',
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 600,
    loop: false,
    arrowsNav: true,
    keyboardNavEnabled: true
  });
});
</script>

     </body>
</html>