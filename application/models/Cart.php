<?php 
class Cart extends CI_Model
{
	public function get_user_cart()
	{
		$id = $this->session->userdata('id');
		$query = "SELECT users.first_name, users.last_name, products.name, cart_relationships.quantity FROM users LEFT JOIN carts On users.id = carts.user_id
		LEFT JOIN cart_relationships on cart_relationships.cart_id = carts.id
		LEFT JOIN products on cart_relationships.product_id = products.id WHERE user.id = $id";	
		return $this->db->query($query)->result_array();
	}

	public function add_product()
	{
		
	}

}
 ?>
