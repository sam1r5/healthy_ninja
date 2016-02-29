<?php 
class Cart extends CI_Model
{
	function __construct() 
	{
        parent::__construct();
        $this->load->library('cart');
    }
	public function get_user_cart()
	{
		$id = $this->session->userdata('id');
		$query = "SELECT users.first_name, users.last_name, products.name, cart_relationships.quantity, products.id, products.price FROM users LEFT JOIN carts On users.id = carts.user_id LEFT JOIN cart_relationships on cart_relationships.cart_id = carts.id LEFT JOIN products on cart_relationships.product_id = products.id WHERE users.id = ?";
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

	public function item_price()
	{
		$products = $this->get_user_cart();
		$query = "SELECT (cart_relationships.quantity * products.price) as total  FROM cart_relationships 
		LEFT JOIN products on products.id = cart_relationships.product_id 
		WHERE product_id = ?";

		for($i = 0; $i<count($products); $i++)
		{
			$values = array($products[$i]['id']);
			$products[$i][] = $this->db->query($query, $values)->row_array();
			//$result[] = $this->db->query($query, $values)->row_array();
		}
		return $products;
	}

	public function total_price()
	{
		$items = $this->item_price();
		$cost = 0;
		for($i =0; $i<count($items); $i++)
		{
			$cost += $items[$i][0]['total'];
		}
		return $cost;
	}

	public function delete_cart()
	{
		$query = "DELETE from cart_relationships where user_id = ?";
		array($this->session->userdata('id'));
		$this->db->query($query, $values);
	}

	public function add_product_guest()
	{
		$product = array(
				'product_id' => $this->input->post('product_id'),
				'name' => $this->input->post('product_name'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price'),
				'amount' => ($this->input->post('price') * $this->input->post('quantity'))

				);
		if($this->cart->contents('product_id') != $this->input->post('product_id'))
		{	
			$this->cart->insert($product);
		}
		else 
		{
			$this->cart->update($product);
		}
	}

	public function total_price_guest()
	{
		$products = $this->get_guest_cart();
		$total = 0;
		for ($i = 0; $i<count($products); $i++)
		{
			$total += $products['amount'];
		}
		return $total;
	}

	public function delete_cart_guest()
	{
		$this->cart->destroy();
		$this->session->sess_destroy();
	}

	public function get_guest_cart()
	{
		$this->cart->contents();
	}
}
 ?>
