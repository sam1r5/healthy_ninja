<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/signin.css">
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
          	<form class="form-signin" action="/Products/update_product" method="post" enctype="multipart/form-data">
            <h2 class="form-signin-heading">Update Product</h2>
            <label>Change Category</label>
            <select class="form-control" name="category">
            	<option selected><?php echo $product_info['category']; ?></option>
            	<option value="Beverages">Beverages</option>
            	<option value="Supplements">Supplements</option>
            	<option value="Bars">Bars</option>
            </select>
            <input type="text" name="product_name" class="form-control" value="<?php echo $product_info['name']; ?>" required autofocus>
            <input type="text" name="product_price" class="form-control" value="<?php echo $product_info['price']; ?>" required>
            <textarea name="product_description" class="form-control" required><?php echo $product_info['description']; ?></textarea>
            <label>Select Product Image to Upload</label>
            <input type="file" name="product_image" class="form-control" required>
            <input type='hidden' name='product_id' class='form-control'value="<?php echo $product_info['id']; ?>">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Update Product</button>
          </form>
    	</div>
    	<div class="container">
      		<nav class="navbar navbar-inverse navbar-fixed-bottom">
      			<div class="navbar-bottom">
      				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
      				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
      				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
      			</div>
      			</nav>
      	</div>
	</body>
</html>