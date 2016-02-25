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
				        <a class="navbar-brand navbar-right" href="#">Sign In</a>
		        	</div>
	      		</div>
	      	</nav>
     	</div>
		<div class="container">
	      	<form class="form-signin" action="/Users/register" method="post">
		        <h2 class="form-signin-heading">Register</h2>
		        <label>First Name:</label>
		        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
		        <label>Last Name:</label>
		        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
		        <label>Email:</label>
		        <input type="email" name="email" class="form-control" placeholder="User Name" required>
		        <label>Password:</label>
		        <input type="password" name="password" class="form-control" placeholder="Password" required>
		        <label>Confirm Password:</label>
		        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
		        <h2 class="form-signin-heading">Billing Information</h2>
		        <label>Street Address:</label>
		        <input type="text" name="billing_street" class="form-control" placeholder="Street Address" required>
		        <label>City:</label>
		        <input type="text" name="billing_city" class="form-control" placeholder="City" required>
		        <label>State:</label>
		        <input type="text" name="billing_state" class="form-control" placeholder="State" required>
		        <label>Zipcode:</label>
		        <input type="text" name="billing_zip" class="form-control" placeholder="Zip Code" required>
		        <div class="checkbox">
		        </div>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
	      	</form>
    	</div>
    	<div class="container">
      		<nav class="navbar navbar-inverse navbar-fixed-bottom">
      			<div class="navbar-bottom">
      				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
      				<a class="navbar-brand navbar-bottom" href="#">Contact Us</a>
      				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
      			</div>
      			</nav>
      	</div>
	</body>
</html>