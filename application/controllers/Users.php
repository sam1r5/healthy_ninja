<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model("User");
		$info["users"] = $this->User->get_all_users();
		$this->load->view('all_users', $info);
	}
	public function new_user()
	{
		$this->load->view("new_user");
	}
	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="errors">', '</p>');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->load->model("User");

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("errors", validation_errors());
			redirect("/users/new_user");
		}
		else {
			$this->User->insert_user($this->input->post());
			redirect("/users");
		}
	}
	public function show($user_id)
	{

		$this->load->model("User");
		$info["user"] = $this->User->get_user($user_id);
		$this->load->view("user_show", $info);
	}
	public function edit($user_id)
	{
		$this->load->model("User");
		$info["user"] = $this->User->get_user($user_id);
		$this->load->view("edit_user", $info);
	}
	public function update($user_id)
	{
		$this->load->model("User");
		$this->User->update_user($user_id, $this->input->post());
		redirect("/users/show/$user_id");
	}
	public function updating()
	{
		die();
		echo "hello";
	}
}























