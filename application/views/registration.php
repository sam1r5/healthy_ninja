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
				        <a class="navbar-brand navbar-right" href="/products/index">Home</a>
		        	</div>
	      		</div>
	      	</nav>
     	</div>
		<div class="container">
	      	<form class="form-signin" action="/Users/register" method="post">
		        <h2 class="form-signin-heading">Register</h2>
                <label>First Name:</label>
		        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
				<span class='red_text'><?php echo form_error('first_name');?></span>        
		        <label>Last Name:</label>
		        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
		        <span class='red_text'><?php echo form_error('last_name');?></span>  
		        <label>Email:</label>
		        <input type="email" name="email" class="form-control" placeholder="Email" required>
		        <span class='red_text'><?php echo form_error('email');?></span>  
		        <label>Password:</label>
		        <input type="password" name="password" class="form-control" placeholder="Password" required>
		        <span class='red_text'><?php echo form_error('password');?></span>  
		        <label>Confirm Password:</label>
		        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
		        <span class='red_text'><?php echo form_error('confirm');?></span>  	    
		        <h2 class="form-signin-heading">Billing Info</h2>
		        <label>Street Address:</label>
		        <input type="text" name="billing_street" class="form-control" placeholder="Street Address" required>
				<span class='red_text'><?php echo form_error('billing_street');?></span>  			        
		        <label>City:</label>
		        <input type="text" name="billing_city" class="form-control" placeholder="City" required>
				<span class='red_text'><?php echo form_error('confirm');?></span>  	
		        <label>State:</label>
				<select class="form-control" name="billing_state" required>
					<option class="grey" selected disabled hidden value=''></option>
					<option value="Alabama">Alabama</option>
					<option value="Alaska">Alaska</option>
					<option value="Arizona">Arizona</option>
					<option value="Arkansas">Arkansas</option>
					<option value="California">California</option>
					<option value="Colorado">Colorado</option>
					<option value="Connecticut">Connecticut</option>
					<option value="Delaware">Delaware</option>
					<option value="District Of Columbia">District Of Columbia</option>
					<option value="Florida">Florida</option>
					<option value="Georgia">Georgia</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Idaho">Idaho</option>
					<option value="Illinois">Illinois</option>
					<option value="Indiana">Indiana</option>
					<option value="Iowa">Iowa</option>
					<option value="Kansas">Kansas</option>
					<option value="Kentucky">Kentucky</option>
					<option value="Louisiana">Louisiana</option>
					<option value="Maine">Maine</option>
					<option value="Maryland">Maryland</option>
					<option value="Massachusetts">Massachusetts</option>
					<option value="Michigan">Michigan</option>
					<option value="Minnesota">Minnesota</option>
					<option value="Mississippi">Mississippi</option>
					<option value="Missouri">Missouri</option>
					<option value="Montana">Montana</option>
					<option value="Nebraska">Nebraska</option>
					<option value="Nevada">Nevada</option>
					<option value="New Hampshire">New Hampshire</option>
					<option value="New Jersey">New Jersey</option>
					<option value="New Mexico">New Mexico</option>
					<option value="New York">New York</option>
					<option value="North Carolina">North Carolina</option>
					<option value="North Dakota">North Dakota</option>
					<option value="Ohio">Ohio</option>
					<option value="Oklahoma">Oklahoma</option>
					<option value="Oregon">Oregon</option>
					<option value="Pennsylvania">Pennsylvania</option>
					<option value="Rhode Island">Rhode Island</option>
					<option value="South Carolina">South Carolina</option>
					<option value="South Dakota">South Dakota</option>
					<option value="Tennessee">Tennessee</option>
					<option value="Texas">Texas</option>
					<option value="Utah">Utah</option>
					<option value="Vermont">Vermont</option>
					<option value="Virginia">Virginia</option>
					<option value="Washington">Washington</option>
					<option value="West Virginia">West Virginia</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Wyoming">Wyoming</option>
				</select> <br>
		       <label>Zipcode:</label>
		        <input type="text" pattern="[0-9]{5}" name="billing_zip" class="form-control" placeholder="Zip Code" oninvalid="setCustomValidity('Please enter a valid 5 digit zip code')">
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