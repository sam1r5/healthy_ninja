<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<meta name="description" content="insert description"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src= 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script src="http://malsup.github.com/jquery.cycle2.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// jQuery codes here
			});
		</script>
	</head>
	<body>
<?php   if($this->session->userdata('id'))
		{ ?>
		<div class="container">
			<nav class="navbar navbar-inverse navbar-fixed-top">
	      		<div class="container">
		        	<div class="navbar-header">
				        <a class="navbar-brand navbar-right" href="/carts/cart">Cart</a>
				        <a class="navbar-brand navbar-right" href="/users/logout">Sign Out</a>
				        <a class="navbar-brand navbar-right" href="/users/load_myaccount">My Account</a>
				        <a class="navbar-brand navbar-right" href="/products/index">Home</a>
				        <label class="navbar-brand navbar-right">Welcome, <?php echo $this->session->userdata('name');?>!</label>
		        	</div>
	      		</div>
	      	</nav>
      	</div>
<?php	}?>
<?php 	if(!$this->session->userdata('id'))
		{ ?>
		<div class="container">
			<nav class="navbar navbar-inverse navbar-fixed-top">
	      		<div class="container">
		        	<div class="navbar-header">
						<a class="navbar-brand navbar-right" href="/carts/cart">Cart</a>
				        <a class="navbar-brand navbar-right" href="/users/load_login">Sign In</a>
		        	</div>
	      		</div>
	      	</nav>
      	</div>
<?php  	} ?>
				<!--Slide Show Banner-->
			<div class="cycle-slideshow">
			    <img src="/assets/images/landing_page/img1.jpg">
			    <img src="/assets/images/landing_page/img2.jpg">
			    <img src="/assets/images/landing_page/img3.jpg">
			    <img src="/assets/images/landing_page/img4.jpg">
			    <img src="/assets/images/landing_page/img5.jpg">
			</div>
		      	<div class="pictures"><a href="/products/load_product_beverage/1"><img class="images" src="/assets/images/beverages.jpg"></a></div
				><div class="pictures"><a href="/products/load_product_food/1"><img class="images" src="/assets/images/health_bar.jpg"></a></div
		      	><div class="pictures"><a href="/products/load_product_supplement/1"><img class="images" src="/assets/images/supplements.jpg"></a></div>
      		<div>
      			<nav class="navbar navbar-inverse navbar-fixed-bottom">
      				<div class="navbar-bottom">
      					<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
      					<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
      					<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
      		</div>
      		</div>
      	</nav>
	</body>
</html>