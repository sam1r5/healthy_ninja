<?php

Class User extends CI_Model
{
	/*this function will query the database for an email/password match to login the user*/
	public function login_verification($post) 
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'], md5($post['password']));
		return $this->db->query($query, $values)->row_array();
	}
	/*this function will query the database for a matching user ID and return that ID*/
	public function get_user($id)
	{
		$query = "SELECT * FROM users where id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
	/*this function will register a user*/
	public function add_user($post)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, billing_street, 
			billing_city, billing_state, billing_zip, shipping_street, shipping_city, shipping_state, 
			shipping_zip, admin_status, last_login, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),NOW())";
		$values = array($post['first_name'], $post['last_name'], $post['email'], md5($post['password']), $post['billing_state'], $post['billing_city'],
			$post['billing_state'], $post['billing_zip'], $post['shipping_street'], $post['shipping_city'], $post['shipping_state'],
			$post['shipping_zip'], 'user');
		$this->db->query($query, $values);
	}
	/*this function will delete the user*/
	public function delete_user($id)
	{
		$query = "DELETE FROM users WHERE id = ?";
		$values = array($id);
		$this->db->query($query, $values);
	}
}