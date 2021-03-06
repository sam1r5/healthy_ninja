<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="description" content="insert description"/>
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/contact_us.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/index.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/signin.css">
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
						<a class="navbar-brand navbar-right" href="/carts/cart">Cart</a>
				        <a class="navbar-brand navbar-right" href="/users/load_login">Sign In</a>
				        <a class="navbar-brand navbar-right" href="/products/index">Home</a>				   
		        	</div>
	      		</div>
	      	</nav>
      	</div>
<?php  	} ?>
  	<div class="location">
  		<h2 class="form-signin-heading" class="center">Healthy Ninja Location</h2>
		<iframe
		  width="600"
		  height="450"
		  frameborder="1" style="border:1"
		  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCpLkHgihCHoBs42mmdFokroX_eLW3i49Q
		&q=175EOliveAve,Burbank,CA" allowfullscreen>
		</iframe>
	</div>
	<div class="container" class="input-form">
		<h2>Email Us</h2>
		<form method='post' action='/users/contactvalidate' class="form-signin" >
		<div class="form-group">
				<span class='red_text'><?php echo form_error('name');?></span>
			<label>Name</label>
				<input type='text' name='name' class="form-control" required>
			<label>Email</label>
				<span class='red_text'><?php echo form_error('information');?></span>
				<input type='email' name='email' class="form-control" required>
			<label>Message</label>
				<textarea placeholder="Email us" name='information' class="form-control" required></textarea>
			
			<button class="btn btn-lg btn-primary btn-block" type="submit" name='action' value="submit" type="submit">Contact Us</button>
		</div>
		</form>
	</div>
	</body>
</html>