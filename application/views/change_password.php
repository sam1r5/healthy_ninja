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
		<div class="container">
	      	<form class="form-signin" action="/Users/update" method="post">
		        <h2 class="form-signin-heading">Change Password</h2>
 		        <label>Old Password:</label>
		        <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>
		        <span class='red_text'><?php echo form_error('password');?></span>
				<label>New Password:</label>
		        <input type="password" name="password" class="form-control" placeholder="New Password" required>
		        <span class='red_text'><?php echo form_error('password');?></span>    
		        <label>Confirm New Password:</label>
		        <input type="password" name="confirm" class="form-control" placeholder="Confirm New Password" required>
		        <span class='red_text'><?php echo form_error('confirm');?></span>
		        <div class="checkbox">
		        </div>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
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