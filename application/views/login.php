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
          	<form class="form-signin" action="/Users/login" method="post">
            <h2 class="form-signin-heading">Login</h2>
            <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
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