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
		$query = "SELECT first_name, last_name, email, billing_street, billing_city, billing_state, billing_zip FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
	/*this function will query the email so that the email validation won't return error if the
	current user leaves the email field as the same email that's in the database*/
	public function get_email($id)
	{
		$query = "SELECT email FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
	/*this function will register a user*/
	public function add_user($post)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, billing_street, 
			billing_city, billing_state, billing_zip, admin_status, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?,NOW(),NOW())";
		$values = array($post['first_name'], $post['last_name'], $post['email'], md5($post['password']), $post['billing_street'], $post['billing_city'],
			$post['billing_state'], $post['billing_zip'], 0);
		$this->db->query($query, $values);
		//the cart_id should equal the user.id. This query will do it. 
		$user_id = $this->db->query("SELECT LAST_INSERT_ID()")->row_array();
		$user_id = $user_id['LAST_INSERT_ID()'];
		// this part will make the first user registered into the admin.
		if ($user_id == 1)
		{
			$query = "UPDATE users SET admin_status = 1, updated_at = NOW() WHERE id = 1";
			$this->db->query($query);
		}
		$query = "INSERT INTO carts (user_id, created_at, updated_at) Values (?,?,?)";
		$values = array($user_id, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}
	/*this function will delete the user*/
	public function delete_user($id)
	{
		$query = "DELETE FROM users WHERE id = ?";
		$values = array($id);
		$this->db->query($query, $values);
	}
	/*this function will update the user information
	if old password matches the current password*/
	public function update($post)
	{
		$id = $this->session->userdata('id');		
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, billing_street = ?, billing_city = ?, 
			billing_state = ?, billing_zip = ?, updated_at = NOW() WHERE id = $id";
		$values = array($post['first_name'], $post['last_name'], $post['email'], $post['billing_street'], 
				$post['billing_city'], $post['billing_state'], $post['billing_zip']);
		$this->db->query($query, $values);
	}
	/*this function will update the user information
	if old password matches the current password*/
	public function update_email($post)
	{
		$id = $this->session->userdata('id');		
		$query = "UPDATE users SET email = ?, updated_at = NOW() WHERE id = $id";
		$values = array($post);
		$this->db->query($query, $values);
	}

	/*this function will update password*/
	public function update_password($post)
	{
		$id = $this->session->userdata('id');			
		$query = "UPDATE users SET password = ? WHERE id = $id";
		$values = array(md5($post['password']));
		$this->db->query($query, $values);
	}
	/*this function is only used to verify old password with current password on 
	user update*/
	public function get_password() 
	{
		$id = $this->session->userdata('id');
		$query = "SELECT password FROM users WHERE id = $id";
		return $this->db->query($query)->row_array();
	}
}