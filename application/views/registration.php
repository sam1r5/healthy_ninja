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
				<span class='red_text'><?php  echo form_error('first_name');?></span>        
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
		        <h2 class="form-signin-heading">Billing Information</h2>
		        <label>Street Address:</label>
		        <input type="text" name="billing_street" class="form-control" placeholder="Street Address" required>
				<span class='red_text'><?php echo form_error('billing_street');?></span>  			        
		        <label>City:</label>
		        <input type="text" name="billing_city" class="form-control" placeholder="City" required>
				<span class='red_text'><?php echo form_error('confirm');?></span>  	
		        <label>State:</label>
				<select class="form-control" name="billing_state" required>
					<option class="grey" selected disabled hidden value=''></option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
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