<?php  $errors = $this->session->flashdata('errors');
	   $current_password_error = $this->session->flashdata('error');

?>
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
		<div class="container">
	      	<form class="form-signin" action="/Users/change_password" method="post">
		        <h2 class="form-signin-heading">Change Password</h2>

                <label>Current Password:</label>
<?php 			if(isset($current_password_error))
				{ ?>
			 	<span class='red_text'><?php echo $current_password_error;?></span> 
<?php			} ?>
<?php  			if(isset($errors['current_password']))
				{ ?>
				 	<span class='red_text'><?php echo $errors['current_password'];?></span> 
<?php			} ?>	  
		        <input type="password" name="current_password" class="form-control" required>

		        <label>New Password:</label>
<?php 			if(isset($errors['errors']))
				{ ?>
			 	<span class='red_text'><?php echo $errors['errors'];?></span> 
<?php			} ?>
<?php 			if(isset($errors['password']))
				{ ?>
				 	<span class='red_text'><?php echo $errors['password'];?></span> 
<?php			} ?>       
		        <input type="password" name="password" class="form-control" required>

		        <label>Confirm New Password:</label>
<?php 			if(isset($errors['confirm']))
				{ ?>
				 	<span class='red_text'><?php echo $errors['confirm'];?></span> 
<?php			} ?> 
		        <input type="password" name="confirm" class="form-control" required> 
				<button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
	      	</form>
    	</div>
    	<div class="container">
      		<nav class="navbar navbar-inverse navbar-fixed-bottom">
      			<div class="navbar-bottom">
      				<a id="about" class="navbar-brand navbar-bottom" href="">About Us</a>
      				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
      				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
      			</div>
      			</nav>
      	</div>
	</body>
</html>