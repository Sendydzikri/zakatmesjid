	
		<!-- myIgniter -->
	
		<!-- Bootstrap JavaScript -->
		       
		        <script src="<?php echo base_url('assets/moment.min.js') ?>"></script>
		        
		        <script src="<?php echo base_url('assets/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') ?>"></script>
		        <script src="<?php echo base_url('assets/bootstraps_js/bootstrap.min.js') ?>"></script>
		        <script src="<?php echo base_url('assets/strength/strength.js') ?>"></script>
                <script src="<?php echo base_url('assets/js/a-design.js') ?>"></script>
                <script src="<?php echo base_url('assets/formvalidation/js/formValidation.js') ?>"></script>
                <script src="<?php echo base_url('assets/formvalidation/js/framework/bootstrap.js') ?>"></script>
                <script type="text/javascript">
                  function base_url(path) {
				        return <?php echo json_encode(base_url()); ?> + path.replace(/^\//g, '');
				  }
				  function site_url(path) {
				        return <?php echo json_encode(site_url()); ?> + path.replace(/^\//g, '');
				  }
				</script>
	</body>
</html>