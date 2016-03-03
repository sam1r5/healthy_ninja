<?php

Class Product extends CI_Model
{
	/*this function will get all products for admin dashboard*/
	public function get_all_product()
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}

	public function add_product($post)
	{
		$query = "INSERT INTO products (name, category, price, description, stock, created_at, updated_at) VALUES (?,?,?,?,?,now(), now())";
		$values = array($post['product_name'], $post['category'], $post['product_price'], $post['product_description'], 0);
		$this->db->query($query, $values);
	}
	// The function below gets the product info necessary for the specific product view page.
	public function get_product($prod_id)
	{
		$query = "SELECT products.name as name, category, description, price, id 
			FROM products
			WHERE products.id = '$prod_id'";
			return $this->db->query($query)->row_array();
	}
	public function get_products_by_category($prod_cat, $page_number, $limiter)
	{
		$num_to_offset = ($page_number - 1) * 2;
		$query = "SELECT products.name as name, category, description, price, id 
			FROM products 
			WHERE category = '$prod_cat' LIMIT " . $limiter . " OFFSET " . $num_to_offset;
			return $this->db->query($query)->result_array();
	}
	public function update_product($post)
	{
		$id = $post['product_id'];
		$query = "UPDATE products SET products.name = ?, description = ?, price = ?, updated_at = NOW() WHERE products.id = $id";
		$values = array($post['product_name'], $post['product_description'], $post['product_price']);
		$this->db->query($query, $values);
	}
	public function get_all_product_count($prod_cat)
	{

		return $this->db->query("SELECT COUNT(*) as count FROM products WHERE category = '$prod_cat'")->result_array()[0]['count'];
	}
	public function get_number_of_pages($items_per_page, $prod_cat)
	{
		$pages = ceil($this->get_all_product_count($prod_cat)/$items_per_page);
		return $pages;
	}
}