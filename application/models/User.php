<?php

Class User extends CI_Model
{
	public function get_user()
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'], md5($post['password']));
		return $this->db->query($query, $values)->row_array();
	}

	public function add_user()
	{
		
	}
}