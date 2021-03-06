<?php  $errors = $this->session->flashdata('errors');?>
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
	      	<form class="form-signin" action="/Users/update" method="post">
		        <h2 class="form-signin-heading">Update Information</h2>
                <label>First Name:</label>
<?php 		if(isset($errors['first_name']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['first_name'];?></span> 
<?php		} ?>         
		        <input type="text" name="first_name" class="form-control" value="<?php echo $user_information['first_name'];?>" required>
		        <label>Last Name:</label>
<?php 		if(isset($errors['last_name']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['last_name'];?></span> 
<?php		} ?>   
		        <input type="text" name="last_name" class="form-control" value="<?php echo $user_information['last_name'];?>" required>
		        <label>Email:</label>
<?php 		if(isset($errors['email']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['email'];?></span> 
<?php		} ?>   
		        <input type="email" name="email" class="form-control" value="<?php echo $user_information['email'];?>" required>
		        <h2 class="form-signin-heading">Update Billing Info</h2>
		        <label>Street Address:</label>
<?php 		if(isset($errors['billing_street']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['billing_street'];?></span> 
<?php		} ?> 		
		        <input type="text" name="billing_street" class="form-control" value="<?php echo $user_information['billing_street'];?>" required>
		        <label>City:</label>
<?php 		if(isset($errors['billing_city']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['billing_city'];?></span> 
<?php		} ?> 	
		        <input type="text" name="billing_city" class="form-control" value="<?php echo $user_information['billing_city'];?>" required>
		        <label>State:</label>
				<select class="form-control" name="billing_state" required>
					<option selected><?php echo $user_information['billing_state'];?></option>
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
<?php 		if(isset($errors['billing_zip']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['billing_zip'];?></span> 
<?php		} ?>  
		        <input type="text" pattern="[0-9]{5}" name="billing_zip" class="form-control" value="<?php echo $user_information['billing_zip'];?>" oninvalid="setCustomValidity('Please enter a valid 5 digit zip code')">
		        <div class="checkbox">
		        </div>
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