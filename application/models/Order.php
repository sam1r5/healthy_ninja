<?php

Class Order extends CI_Model
{
	public function get_orders_by_user()
	{
		$query = "SELECT orders.id as id, orders.total as total, orders.created_at as order_date"
	}
}
?>