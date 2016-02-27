<?php 
class Cart extends CI_Model
{
	public function get_user_cart()
	{
		$id = $this->session->userdata('id');
		$query = "SELECT users.first_name, users.last_name, products.name, cart_relationships.quantity, products.id FROM users LEFT JOIN carts On users.id = carts.user_id LEFT JOIN cart_relationships on cart_relationships.cart_id = carts.id LEFT JOIN products on cart_relationships.product_id = products.id WHERE users.id = ?";
		$values = array($id);	
		return $this->db->query($query, $values)->result_array();
	}

	public function add_product($post)
	{
		$query = "INSERT INTO cart_relationships (quantity, product_id, cart_id, created_at, updated_at) VALUES (?,?,?,?,?)";
		$values = array($post['quantity'], $post['product_id'], $post['cart_id'], date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
		$this->db->query($query, $values);
	}

	public function update_quantity($post)
	{
		$query = "UPDATE cart_relationships SET 
		quantity = ?  WHERE product_id = ? AND cart_id in(SELECT id from carts WHERE user_id = ?)";
		$values = array($post['quantity'], $post["product_id"], $this->session->userdata('id'));
		$this->db->query($query, $values);
	}

	public function delete_item($post)
	{
		$query = "DELETE FROM cart_relationships WHERE product_id = ?";
		$values = array($post['product_id']);
		$this->db->query($query, $values);
	}

}
 ?>
