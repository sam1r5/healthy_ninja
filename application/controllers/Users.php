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

	//go to the admin dashboard. Query the database to get all the products form the database. 
	public function load_admin_dashboard()
	{
		$this->load->model('Product');
		$data['product'] = $this->Product->get_all_products();
		$this->load->view('admin_dash', $data);
	}

	//register user. Check forms to make sure the data coming in is good for the database. If it isnt reload the page with errors. 
	// If the form data passes validation then put the data into the database. 
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

	//To login the fiels must contain character. If the username or password is incorrect, an error message shows up to tell them either thier email or password is incorrect.
	//If the form validation is passed the username and password is checked through the database to see if it is correct. 
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























