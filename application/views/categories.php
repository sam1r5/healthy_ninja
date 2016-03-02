<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/index.css">
		<meta name="description" content="insert description"/>
		<script src= 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// jQuery codes here
				});
		</script>
	</head>
	<body>
<?php   if($this->session->userdata('id'))
		{ ?>
		<h1>Welcome, <?php echo $this->session->userdata('name');?>!</h1>
		<div class="container">
			<nav class="navbar navbar-inverse navbar-fixed-top">
	      		<div class="container">
		        	<div class="navbar-header">
				        <a class="navbar-brand navbar-right" href="/carts/cart">Cart</a>
				        <a class="navbar-brand navbar-right" href="/users/logout">Sign Out</a>
				        <a class="navbar-brand navbar-right" href="/users/load_myaccount">My Account</a>
				        <a class="navbar-brand navbar-right" href="/products/index">Home</a>
		        	</div>
	      		</div>
	      	</nav>
      	</div>
<?php	}?>
<?php 	if(!$this->session->userdata('id'))
		{ ?>
		<h1>Welcome!</h1>
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
	<div class="container">
		<?php foreach($products as $product) { ?>
		<div class="category_images">
			<img src="/assets/images/<?php echo $product['name'] ?>.jpg">
			<div class="view">
			<h3><?php echo $product['name'] . " - $" . $product['price']?></h3>
			<form action="/Products/load_product_page" method="post">
				<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
				<input id="product" class="btn btn-lg btn-primary btn-block" type="Submit" name="view" value="Product Info">
			</form>
			</div>
		</div>
		<?php } ?>
	</div>
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-bottom">
				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
	</body>
</html>