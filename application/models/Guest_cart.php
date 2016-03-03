<?php 
class Guest_cart extends CI_Model
{
	public function add_guest()
	{
		$query = "INSERT INTO guests (created_at, updated_at) VALUES (now(), now())";
		$this->db->query($query);
		$guest_id = $this->db->query("SELECT LAST_INSERT_ID()")->row_array();
		$guest_id = $guest_id['LAST_INSERT_ID()'];
		$query = "INSERT INTO guest_carts (guest_id, created_at, updated_at) VALUES (?, now(), now())";
		$values = array($guest_id);
		$this->db->query($query, $values);
		return $guest_id;

	}
	public function item_price()
	{
		$products = $this->get_user_cart();
		$query = "SELECT (guest_cart_relationships.quantity * products.price) as total  FROM guest_cart_relationships 
		LEFT JOIN products on products.id = guest_cart_relationships.product_id 
		WHERE product_id = ?";

		for($i = 0; $i<count($products); $i++)
		{
			$values = array($products[$i]['id']);
			$products[$i][] = $this->db->query($query, $values)->row_array();
			//$result[] = $this->db->query($query, $values)->row_array();
		}
		return $products;
	}
	public function get_user_cart()
	{
		$id = $this->session->userdata('guest_id');
		$query = "SELECT products.name, guest_cart_relationships.quantity, products.id, products.price FROM guests LEFT JOIN guest_carts On guests.id = guest_carts.guest_id LEFT JOIN guest_cart_relationships on guest_cart_relationships.guest_cart_id = guest_carts.id LEFT JOIN products on guest_cart_relationships.product_id = products.id WHERE guest_carts.id = ?";
		$values = array($id);	
		return $this->db->query($query, $values)->result_array();
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
	public function payment()
	{
		//update the orders table
		$total = $this->total_price();
		$products = $this->item_price();
		$query = "INSERT INTO guest_orders (guest_id, total, created_at, updated_at) VALUES (?,?,?,?)";
		$values = array($this->session->userdata('guest_id'), $total, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
		//get the order id
		//var_dump($this->db->query("SELECT LAST_INSERT_ID()")->row_array()); die('in the payment model');
		$order_id = $this->db->query("SELECT LAST_INSERT_ID()")->row_array();
		$order_id = $order_id['LAST_INSERT_ID()'];
		$query = "INSERT INTO guest_order_relationships (product_id, guest_order_id, quantity, price, product_total, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
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
	public function delete_cart()
	{
		$query = "DELETE from guest_cart_relationships where guest_cart_id = ?";
		$values = array($this->session->userdata('guest_id'));
		$this->db->query($query, $values);
	}
	public function add_product($post)
	{
		$guest_id = $this->session->userdata('guest_id');
		$query = "SELECT * FROM guest_cart_relationships WHERE product_id = ? AND guest_cart_id = ?";
		$values = array($post['product_id'], $guest_id);
		$myresult = $this->db->query($query, $values)->result_array();
		if($myresult)
		{
			$query = "UPDATE guest_cart_relationships SET quantity = quantity + 1, updated_at = ? WHERE product_id = ?";
			$values = array(date('Y-m-d, H:i:s'), $post['product_id']);
			$this->db->query($query, $values);
		}
		else 
		{
			$query = "INSERT INTO guest_cart_relationships (quantity, product_id, guest_cart_id, created_at, updated_at) VALUES (?,?,?,?,?)";
			$values = array($post['quantity'], $post['product_id'], $this->session->userdata('guest_id'), date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
			$this->db->query($query, $values);
		}
	}
	public function update_quantity($post)
	{
		$query = "UPDATE guest_cart_relationships SET 
		quantity = ?  WHERE product_id = ? AND guest_cart_id in(SELECT id from guest_carts WHERE guest_cart_id = ?)";
		$values = array($post['quantity'], $post["product_id"], $this->session->userdata('guest_id'));
		$this->db->query($query, $values);
	}
	public function delete_item($post)
	{
		$query = "DELETE FROM guest_cart_relationships WHERE product_id = ?";
		$values = array($post['product_id']);
		$this->db->query($query, $values);
	}
}

 ?>