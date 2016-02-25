<?php

Class Product extends CI_Model
{
	/*this function will */
	public function get_all_product()
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}

	public function add_product($post)
	{
		$query = "INSERT INTO products (name, category, description, stock, created_at, updated_at) VALUES (?,?,?,?,?,?)";
		$values = array($post['name'], $post['category'], $post['description'], 0, date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
		$this->db->query($query, $values);
	}
	// The function below gets the product info necessary for the specific product view page.
	public function get_product($prod_id)
	{
		$query = "SELECT products.name as name, category, description 
			FROM products
			WHERE products.id =" . $prod_id;
			return $this->db->query($query)->result_array();
	}
}