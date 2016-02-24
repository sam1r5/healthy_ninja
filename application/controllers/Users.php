<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function load_login()
	{
		$this->load->view('/login');
	}

	public function load_registration()
	{
		$this->load->view('/registraion');
	}
	public function register()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", 'trim|required');
		$this->form_validation->set_rules("email", "Email", 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules("password", "Password", 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules("confirm_password", "Confirm Password", 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors_register', validation_errors());
			redirect('/users/load_registration');
		}
		else
		{
			$this->load->model('User');
			$post = $this->input->post();
			$this->User->add_user($post);
			redirect('/');
		}			
	}

	public function login()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", 'trim|required');
		$this->form_validation->set_rules("password", "Password", 'trim|required');
		$this->load->library("form_validation");
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors_login', validation_errors());
			redirect('/users/load_login');
		}
		else
		{
			$this->load->model('User');
			$post = $this->input->post();
			if($this->User->login_check($post))
			{
				$data = $this->User->login_verification($post);
				$this->session->set_userdata('user', $data);
				redirect('/users/load_login');
			}
			else
			{
				$this->session->set_flashdata('errors_login', 'email or password is incorrect');
				redirect('/users/load_login');
			}
		}
	}
}























