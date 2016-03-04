<?php foreach($products as $product) { ?>
		<div class="category_images">
			<img src="/assets/images/<?php echo $product['name'] ?>.jpg">
			<div class="view">
			<h3><?php echo $product['name'] . " - $" . $product['price']?></h3>
			<form action="/Products/load_product_page" method="post">
				<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
				<input id="product" class="btn btn-lg btn-primary btn-block" type="Submit" name="view" value="Product Info">
			</form>
			</div>
		</div>
		<?php } ?>