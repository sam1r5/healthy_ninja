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
				        <a class="navbar-brand navbar-right" href="/users/logout">Sign Out</a>
		        	</div>
	      		</div>
	      	</nav>
     	</div>
		<div class="container">
          	<form id="add_product" class="form-signin" action="/Product/add_new" method="post">
            <h2 class="form-signin-heading">Add New Product</h2>
            <label>Select Category of Product to Add</label>
            <select class="form-control" name="category">
            	<option value="beverages">Beverages</option>
            	<option value="supplements">Supplements</option>
            	<option value="bars">Bars</option>
            </select>
            <input type="text" name="product_name" class="form-control" placeholder="Product Name" required autofocus>
            <input type="text" name="product_price" class="form-control" placeholder="Price (Numbers Only)" required>
            <textarea name="product_description" class="form-control" placeholder="Product Description" required></textarea>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Add Product</button>
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