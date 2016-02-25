<?php

Class Review extends CI_Model
{	
	// Function to add a review. We need to include a hidden input on the product page to pass over the product id as part of the post when the user submits a review.
	public function add_review($post)
	{
		$userid = $this->session->userdata('user'['id']); // Redundant but I hate putting '$this->blah blah' directly in a query.
		$query = "INSERT INTO reviews (content, users_id, products_id, created_at, updated_at) 
		VALUES (?,?,?,now(),now())";
			$values = array($post['review'], $userid, $post['product_id']));
			$this->db->query($query, $values);
	}
	// This function will pull reviews for a particular product. Need to pass the product id from the view to controller to here as $prod_id.
	public function get_reviews($prod_id)
	{
		$query = "SELECT reviews.content as review, users.first_name as first_name, users.last_name as last_name, products.name as product_name, reviews.created_at as review_date FROM reviews 
		LEFT JOIN users ON users.id = users_id 
		LEFT JOIN products ON products.id = products_id 
		WHERE products_id =" . $prod_id;
		return $this->db->query($query)->result_array();
	}
}

?>