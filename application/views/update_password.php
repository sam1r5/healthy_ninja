<?php  if($this->session->flashdata())
{
	foreach($this->session->flashdata() as $flashdata)
	{
		var_dump($flashdata['old_password']);
				var_dump($flashdata['password']);	
						var_dump($flashdata['confirm']);			
	}
}

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
	      	<form class="form-signin" action="/Users/change_password" method="post">
		        <h2 class="form-signin-heading">Change Password</h2>

                <label>Old Password:</label>
				<span class='red_text'><?php echo $this->session->flashdata('password');?></span>  		  
		        <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>

		        <label>New Password:</label>
				<span class='red_text'><?php echo form_error('password');?></span>        
		        <input type="password" name="password" class="form-control" placeholder="New Password" required>

		        <label>Confirm New Password:</label>
		        <span class='red_text'><?php echo form_error('confirm');?></span>  
		        <input type="password" name="confirm" class="form-control" placeholder="Confirm New Password" required>
		       
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