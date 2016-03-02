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
				});
		</script>
	</head>
	<body>
<?php   if($this->session->userdata('id'))
		{ 
			$where_to_go = '/Carts/add_product';
			?>
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
		{ 
			$where_to_go = '/Guest_carts/add_product';
			?>
		<div class="container">
			<nav class="navbar navbar-inverse navbar-fixed-top">
	      		<div class="container">
		        	<div class="navbar-header">
				        <a class="navbar-brand navbar-right" href="/users/load_login">Sign In</a>
		        	</div>
	      		</div>
	      	</nav>
      	</div>

<?php  	} ?>
		<div class="container">
			<div class="product">
				<img src="/assets/images/<?php echo $product_info['name'] ?>.jpg">
				<h3><?php echo $product_info['name'] ?></h3>
				<form action="<?php echo $where_to_go ?>" method="post">
					<input type="hidden" name="product_id" value="<?php echo $product_info['id'] ?>">
					<input type="hidden" name="quantity" value="1">
					<input type="hidden" name="price" value="<?php echo $product_info['price'] ?>">
					<!-- <input type="hidden" name="name" value="<?php echo $product_info['name'] ?>"> -->
					<input id="product" class="btn btn-lg btn-primary btn-block" type="Submit" name="add_cart" value="Add To Cart">
				</form>
			</div>
			<div class="description">
				<h1>Description</h1>
				<h3><?php echo $product_info['description'];?></h3>
			</div>
			<div class="review">
				<h1>Reviews</h1>
<?php foreach($reviews as $review) { ?>
			<p><?php echo $review['first_name'] . " says:<br>" . $review['review'];?></p>

<?php		} ?>
			</div>		
		</div>
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-bottom">
				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
	</body>
</html>