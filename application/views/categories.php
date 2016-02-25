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
	<h1>Welcome, <?php echo $this->session->userdata('name');?></h1>

		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-bottom">
				<a id="about" class="navbar-brand navbar-bottom" href="/users/load_about_us">About Us</a>
				<a class="navbar-brand navbar-bottom" href="#">Contact Us</a>
				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
	</body>
</html>