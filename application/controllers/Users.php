<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function load_login()
	{
		$this->load->view('/login');
	}

	public function load_registration()
	{
		$this->load->library("form_validation");
		$this->load->view('/registration');
	}

	//go to the admin dashboard. Query the database to get all the products form the database. 
	public function load_admin_dashboard()
	{
		$this->load->model('Product');
		$data['product'] = $this->Product->get_all_products();
		$this->load->view('admin_dash', $data);
	}
	public function load_about_us()
	{
		$this->load->view('/about_us');
	}

	//register user. Check forms to make sure the data coming in is good for the database. If it isnt reload the page with errors. 
	// If the form data passes validation then put the data into the database. 
	public function register()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "Name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("last_name", "Name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("email", "Email", 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules("password", "Password", 'trim|required|min_length[8]|matches[confirm]');
		$this->form_validation->set_rules("confirm", "Confirm Password", 'trim|required');
		$this->form_validation->set_rules("billing_street", "Street Address", 'trim|required');
		$this->form_validation->set_rules("billing_city", "City", 'trim|required');
		$this->form_validation->set_rules("billing_state", "State", 'trim|required');
		$this->form_validation->set_rules("billing_zip", "Zip Code", 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			// $this->session->set_flashdata('errors_register', validation_errors());
			// redirect('/users/load_registration');
			$this->load->view('/registration', validation_errors());
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
			if($this->User->login_verification($post))
			{
				$data = $this->User->login_verification($post);
				$this->session->set_userdata('user', $data['id']);
				redirect('/users/load_login');
			}
			else
			{
				$this->session->set_flashdata('errors_login', 'Email or Password is Incorrect');
				redirect('/users/load_login');
			}
		}
	}
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('/Products/index');
	}

	public function contactvalidate()
	{
		//var_dump($this->input->post()); die();
		if($this->input->post('action') == 'submit')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
		}
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('/about_us');
		}
		else
		{
			$this->sendemail($this->input->post());
			redirect('users/load_about_us');
		}

	}

	private function sendemail($content)
	{
		
		$config= array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'healthyninja16@gmail.com',
		    'smtp_pass' => 'chipotle',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from("healthyninja16@gmail.com", $content['name']);
		$this->email->to('ssachdev13@gmail.com');
		$this->email->subject("comment from customer form healthy ninja website");
		$this->email->message($content['information']);
		if($this->email->send())
		{
			return true;
		}
		else
		{
			return false;
		}

	}
}






















