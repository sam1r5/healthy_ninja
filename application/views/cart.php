<!DOCTYPE html>
<?php $errors = $this->session->flashdata(); 
/*var_dump($user);
die();*/?>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Cart</title>
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/index.css">
		<link rel="stylesheet" type="text/css" href="/assets/stylesheets/cart.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="description" content="insert description"/>
		<script src= 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// jQuery codes here
				
				$(".cart").on("change", function() {
					$(this).submit();
				})
				// $("select").on("change", function() {
				//     $(".cart").submit();
				// });
			});
		</script>
		<style type="text/css">
		.red_text {
			color: red;
		}
		.display-none
		{
			display: none;
		}
		</style>
	</head>
	<body>
<?php   if($this->session->userdata('id'))
		{ 
			$pointer = "carts";
			?>
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
		{ 
			$pointer = "guest_carts";
			?>
		<div class="container">
			<nav class="navbar navbar-inverse navbar-fixed-top">
	      		<div class="container">
		        	<div class="navbar-header">
						<a class="navbar-brand navbar-right" href="/carts/cart">Cart</a>
				        <a class="navbar-brand navbar-right" href="/users/load_login">Sign In</a>
		        	</div>
	      		</div>
	      	</nav>
      	</div>



<?php  	} ?>
<table class="table table-hover" align-"center">
      		<thead>
      			<tr>
      				<td>Product Name</td>
      				<td>Product Quantity</td>
      				<td>Product Price</td>
      				<td>Product Total</td>
      				<td>Update Quantity</td>
      				<td>Delete</td>
      			</tr>
      		</thead>
      		<tbody>

<?php 
					foreach($items as $item)
					{
 ?>
	      			<tr>
 						<td><?php echo $item['name'] ?></td>
 						<td><?php echo $item['quantity'] ?></td>
						<td><?php echo "$".$item['price'] ?></td>
						<td><?php echo "$".money_format('%i',$item[0]['total']) ?></td>
 						<td>
	 						<form action="/<?php echo $pointer ?>/update_quantity" method="post" class="cart">
	 							<input	type="hidden" name="product_id" value="<?= $item['id'] ?>">			
 								<select name="quantity" class='quantity'> 
 									<option></option>
 									<option value='1'>1</option>
 									<option value='2'>2</option>
 									<option value='3'>3</option>
 									<option value='4'>4</option>
 									<option value='5'>5</option>
 									<option value='6'>6</option>
 									<option value='7'>7</option>
 									<option value='8'>8</option>
 									<option value='9'>9</option>
 									<option value='10'>10</option>
 								</select>
							</form>
						</td>
						<td>
							<form action="/<?php echo $pointer ?>/delete_item" method=post >
								<input	type="hidden" name="product_id" value="<?= $item['id'] ?>">
								<button type="submit" >Delete</button>
							</form>
						</td>
	      			</tr>
 <?php 
 					}
  ?>
      		</tbody>
      		<td>Total Cost: <?php echo "$".money_format('%i', $cost) ?></td>
      	</table>
      	<div class="container">
      	<form action="/<?php echo $pointer ?>/payment" method="post" class="form-signin">
      		<h2 class="form-signin-heading">Shipping Address</h2>
                <label>First Name:</label>
<?php 		if(isset($errors['errors']['first_name']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['errors']['first_name'];?></span> 
<?php		} ?>    
		        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $user['first_name'] ?>" required>
		        <label>Last Name:</label>
<?php 		if(isset($errors['errors']['last_name']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['errors']['last_name'];?></span> 
<?php		} ?>    
		        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $user['last_name'] ?>" required>
		        <label>Email:</label>
<?php 		if(isset($errors['errors']['email']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['errors']['email'];?></span> 
<?php		} ?>    
		        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email'] ?>" required>
		        <label>Street Address:</label>
<?php 		if(isset($errors['errors']['billing_street']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['errors']['billing_street'];?></span> 
<?php		} ?> 			        
		        <input type="text" name="billing_street" class="form-control" placeholder="Street Address" value="<?php echo $user['billing_street'] ?>"required>
		        <label>City:</label>
<?php 		if(isset($errors['errors']['billing_city']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['errors']['billing_city'];?></span> 
<?php		} ?>  	
		        <input type="text" name="billing_city" class="form-control" value="<?php echo $user['billing_city'] ?>" placeholder="City"> 
		        <label>State:</label>
				<select class="form-control" name="billing_state" required>
					<option selected><?php echo $user['billing_state'];?></option>
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
<?php 		if(isset($errors['errors']['billing_zip']))
			{ ?>
			 	<span class='red_text'><?php echo $errors['errors']['billing_zip'];?></span> 
<?php		} ?>   	
		        <input type="text" pattern="[0-9]{5}" name="billing_zip" class="form-control" value="<?php echo $user['billing_zip'] ?>" placeholder="Zip Code" oninvalid="setCustomValidity('Please enter a valid 5 digit zip code')">
		        <div class='<?php 
		        if(floatval($cost) == 0)
		        {
		        	echo "display-none";
	        	}
	        	?>'>
			        <script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_7iOHbJHH30UWg4T6rvntOiGC"
				    data-amount="<?php floatval($cost*100) ?>"
				    data-name="HealthyNinja"
				    data-description="<?php  echo count($items) ." items for " .$cost?>"
				    data-image=""
				    data-locale="auto">
				  </script>
			  </div>
      	</form>
      	</div>
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-bottom">
				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
	</body>
</html>