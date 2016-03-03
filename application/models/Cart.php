<?php 
class Cart extends CI_Model
{
	public function get_user_cart()
	{
		$id = $this->session->userdata('id');
		$query = "SELECT users.first_name, users.last_name, products.name, cart_relationships.quantity, products.id, products.price FROM users LEFT JOIN carts On users.id = carts.user_id LEFT JOIN cart_relationships on cart_relationships.cart_id = carts.id LEFT JOIN products on cart_relationships.product_id = products.id WHERE users.id = ?";
		$values = array($id);	
		return $this->db->query($query, $values)->result_array();
	}

	public function add_product($post)
	{
		$user_id = $this->session->userdata('id');
		$query = "SELECT * FROM cart_relationships WHERE product_id = ? AND cart_id = ?";
		$values = array($post['product_id'], $user_id);
		$myresult = $this->db->query($query, $values)->result_array();
		if($myresult)
		{
			$query = "UPDATE cart_relationships SET quantity = quantity + 1, updated_at = ? WHERE product_id = ?";
			$values = array(date('Y-m-d, H:i:s'), $post['product_id']);
			$this->db->query($query, $values);
		}
		else 
		{
			$query = "INSERT INTO cart_relationships (quantity, product_id, cart_id, created_at, updated_at) VALUES (?,?,?,?,?)";
			$values = array($post['quantity'], $post['product_id'], $this->session->userdata('id'), date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
			$this->db->query($query, $values);
		}
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
		return money_format('%i', $cost);
	}

	public function delete_cart()
	{
		$query = "DELETE from cart_relationships where cart_id = ?";
		$values = array($this->session->userdata('id'));
		$this->db->query($query, $values);
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

	public function get_guest_cart()
	{
		$this->cart->contents();
	}

	public function payment()
	{

		//update the orders table
		$total = $this->total_price();
		$products = $this->item_price();
		$query = "INSERT INTO orders (user_id, total, created_at, updated_at) VALUES (?,?,?,?)";
		$values = array($this->session->userdata('id'), $total, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
		//get the order id
		//var_dump($this->db->query("SELECT LAST_INSERT_ID()")->row_array()); die('in the payment model');
		$order_id = $this->db->query("SELECT LAST_INSERT_ID()")->row_array();
		$order_id = $order_id['LAST_INSERT_ID()'];
		$query = "INSERT INTO order_relationships (product_id, order_id, quantity, price, product_total, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
		for($i = 0; $i<count($products); $i++)
		{
			$quantity = $products[$i]['quantity'];
			$price = $products[$i]['price'];
			$total = money_format('%i', floatval($products[$i][0]['total']));
			$product_id = $products[$i]['id'];
			$values = array($product_id, $order_id, $quantity, $price, $total,date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
			$this->db->query($query, $values);
		}
		$this->delete_cart();

	}
}
 ?>
