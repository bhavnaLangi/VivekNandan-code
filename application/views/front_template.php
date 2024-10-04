<!DOCTYPE html>
<html lang="en">

	
<head>

          <?php $this->load->view('front_includes/header-analytics'); ?>
	</head>

	<body class="page">

		<div class="page__inner animsition">
          <?php $this->load->view('front_includes/header');   ?>  

          <?php $this->load->view($content_view); ?>

            <?php $this->load->view('front_includes/footer'); ?>
	</div>
	<?php  $this->load->view('front_includes/footer-analytics'); ?>
</body>


</html>