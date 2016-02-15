<?php
class User extends CI_Model {
	function get_all_users() {
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array();
	}
	function insert_user($user_info){
		$query = "INSERT INTO users (first_name, last_name, created_at, updated_at) VALUES (?,?,?,?)";
		$values = array($user_info['first_name'], $user_info['last_name'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}
	function get_user($user_id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$value = array($user_id);
		return $this->db->query($query, $value)->row_array();
	}
	function update_user($user_id, $user_info)
	{
		$query = "UPDATE users SET first_name = ?, last_name = ? WHERE id = ?";
		$values = array($user_info["first_name"], $user_info["last_name"], $user_id);
		return $this->db->query($query, $values);
	}
}
?>