<!DOCTYPE html>
<?php //var_dump($cost); die(); ?>
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
				
				$("form").on("change", function() {
					$(this).submit();
				})
				// $("select").on("change", function() {
				//     $(".cart").submit();
				// });
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
	 						<form action="/carts/update_quantity" method="post" class="cart">
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
							<form action="/carts/delete_item" method=post >
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
      	<form action="/carts/payment" method="POST">
		  <script
		    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		    data-key="pk_test_7iOHbJHH30UWg4T6rvntOiGC"
		    data-amount="<?php floatval($cost*100) ?>"
		    data-name="HealthyNinja"
		    data-description="<?php  echo count($items) ." items for " .$cost?>"
		    data-image=""
		    data-locale="auto">
		  </script>
		</form>
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
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-bottom">
				<a id="about" class="navbar-brand navbar-bottom" href="#">About Us</a>
				<a class="navbar-brand navbar-bottom" href="/users/load_contact_us">Contact Us</a>
				<p class="navbar-brand navbar-bottom">&copy; 2016 HealthyNinja</p>
	</body>
</html>