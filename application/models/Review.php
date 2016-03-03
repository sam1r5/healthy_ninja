<?php

Class Review extends CI_Model
{	
	// Function to add a review. We need to include a hidden input on the product page to pass over the product id as part of the post when the user submits a review.
	public function add_review($post)
	{
		$id = $this->session->userdata('id'); // Redundant but I hate putting '$this->blah blah' directly in a query.
		$query = "INSERT INTO reviews (content, rating, user_id, product_id, created_at, updated_at) 
		VALUES (?,?,?,?, now(),now())";
			$values = array($post['content'], $post['rating'], $id, $post['product_id']);
			$this->db->query($query, $values);
	}
	// This function will pull reviews for a particular product. Need to pass the product id from the view to controller to here as $prod_id.
	public function get_reviews($post)
	{
		$query = "SELECT reviews.content as review, reviews.rating as rating, users.first_name as first_name, users.last_name as last_name, products.name as product_name, reviews.created_at as review_date FROM reviews 
		LEFT JOIN users ON users.id = reviews.user_id 
		LEFT JOIN products ON products.id = product_id 
		WHERE product_id = $post GROUP BY reviews.created_at DESC";
		return $this->db->query($query)->result_array();
	}
}

?>