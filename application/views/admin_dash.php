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
				        <a class="navbar-brand navbar-right" href="/users/load_login">Cart</a>
				        <a class="navbar-brand navbar-right" href="/users/logout">Sign Out</a>
				        <a class="navbar-brand navbar-right" href="/users/load_login">My Account</a>
				        <a class="navbar-brand navbar-right" href="/users/load_login">Home</a>
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
     	<div id="cat_selector">
     		<label>Select Products to View</label>
     		<form name="product_viewer" action="/Products/view_selector" method="post">
     			<select name="product_selector">
     				<option value="all">All Products</option>
     				<option value="beverages">Beverages</option>
     				<option value="supplements">Supplements</option>
     				<option value="bars">Bars</option>
     			</select>
     			<input type="submit" name="submit" value="Submit">
     		</form>
     	</div>
		<div class="container">
          	<table class="table">
		        <thead class="thead-inverse">
		          <tr>
		            <th>Item Name</th>
		            <th>Price</th>
		            <th>Description</th>
		            <th>Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <tr>
		            <td>NAME</td>
		            <td>PRICE</td>
		            <td>DESCRIPTION</td>
		            <td>LINK TO EDIT PRODUCT PAGE</td>
		          </tr>
		        </tbody>
	      	</table>
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