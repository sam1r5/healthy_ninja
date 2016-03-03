<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/index.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/bootstrap.min.css">
		<meta name="description" content="insert description"/>
		<script src= 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// jQuery codes here
			});
		</script>
		<style type="text/css">
			h2{
				margin-top: 20%;
			}
		</style>
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
      	<h2>You have sucessfully placed your order! Please Shop With us again.</h2> 
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
      	<h2>You have sucessfully placed your order! Please Shop With us again.</h2> 
<?php  	} ?>
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-bottom">
				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
	</body>
</html>