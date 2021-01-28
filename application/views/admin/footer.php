<!-- Footer -->
		<footer class="footer container-fluid pl-30 pr-30">
			<div class="row">
				<div class="col-sm-5">


				</div>
				<div class="col-sm-7 text-right">
					<p><?php echo date('Y'); ?> &copy;<a href="#"> Happy Sanz Tech</a> </p>
				</div>
			</div>
		</footer>
<!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendors/dist/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/Counter-Up/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/dist/js/morris-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/dist/js/init.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/dist/js/dashboard-data.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/dist/js/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
			$('#datable_1').DataTable();
			$('.colorpicker').colorpicker();
     });
    </script>
	
</body>
</html>