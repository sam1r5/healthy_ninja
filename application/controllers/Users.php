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
		$data['product'] = $this->Product->get_all_product();
		$this->load->view('admin_dash', $data);
	}
	public function load_contact_us()
	{
		$this->load->library("form_validation");	
		$this->load->view('/contact_us');
	}

	public function load_categories()
	{
		$this->load->view('/categories');
	}

	public function load_myaccount()
	{
		$this->load->view('myaccount');		
	}

	public function load_update()
	{
		$this->load->model('User');
		$id = $this->session->userdata('id');
		$data['user_information'] = $this->User->get_user($id);
		$this->load->library("form_validation");
		$this->load->view('update_account', $data);
	}

	public function load_update_password()
	{
		$this->load->library("form_validation");
		$this->load->view('update_password');
	}

	//register user. Check forms to make sure the data coming in is good for the database. If it isnt reload the page with errors. 
	// If the form data passes validation then put the data into the database. 
	public function register()
	{
		$post = $this->input->post();
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("last_name", "Last name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_message('is_unique', 'The %s "' . $post['email'] . '" is already taken');
		$this->form_validation->set_rules("password", "Password", 'trim|required|min_length[8]|matches[confirm]');
		$this->form_validation->set_rules("confirm", "Confirm Password", 'trim|required');
		$this->form_validation->set_rules("billing_street", "Street Address", 'trim|required');
		$this->form_validation->set_rules("billing_city", "City", 'trim|required');
		$this->form_validation->set_rules("billing_state", "State", 'trim|required');
		$this->form_validation->set_rules("billing_zip", "Zip Code", 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$data = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $data);
			$this->load->view('/registration');
		}
		else
		{
			$this->load->model('User');
			$post = $this->input->post();
			$this->User->add_user($post);
			$data = $this->User->login_verification($post);
			$this->session->set_userdata('id', $data['id']);
			$this->session->set_userdata('name', $data['first_name']);
			redirect('/');
		}			
	}

	//To login the fiels must contain character. If the username or password is incorrect, an error message shows up to tell them either thier email or password is incorrect.
	//If the form validation is passed the username and password is checked through the database to see if it is correct. 
	public function login()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email');
		$this->form_validation->set_rules("password", "Password", 'trim|required|min_length[8]');
		
		if($this->form_validation->run() == FALSE)
		{
			$data = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $data);
			redirect('/users/load_login');
		}
		else
		{
			$this->load->model('User');
			$post = $this->input->post();

			if($this->User->login_verification($post))
			{
				$data = $this->User->login_verification($post);
				$this->session->set_userdata('id', $data['id']);
				$this->session->set_userdata('name', $data['first_name']);
				redirect('/');
			}
			else
			{
				$data['errors'] = 'Incorrect email and password combination';
				$this->session->set_flashdata('errors', $data);
				redirect('/users/load_login');
			}
		}
	}
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('/Products/index');
	}

	public function update() 
	{
		$this->load->model('User');
		$id = $this->session->userdata('id');
		$email = $this->User->get_email($id);
		$post = $this->input->post();
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("last_name", "Last name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("billing_street", "Street Address", 'trim|required');
		$this->form_validation->set_rules("billing_city", "City", 'trim|required');
		$this->form_validation->set_rules("billing_state", "State", 'trim|required');
		$this->form_validation->set_rules("billing_zip", "Zip Code", 'trim|required');

		if($email['email'] == $post['email'])
		{
			$this->User->update_email($post['email']);			
		}		
		
		else
		{
			$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_message('is_unique', 'The %s "' . $post['email'] . '" is already taken');
		}
		
		if($this->form_validation->run() == FALSE)
		{
			$data = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $data);
			redirect('/users/load_update');
		}
		else
		{
			$post = $this->input->post();
			$this->User->update($post);
			redirect('/users/load_myaccount');
		}
	}

	public function change_password() 
	{
		$post = $this->input->post();
		$this->load->model('User');
		$current_password = $this->User->get_password();
		$this->load->library("form_validation");
		$this->form_validation->set_rules("current_password", "Current Password", 'trim|required|min_length[8]');
		$this->form_validation->set_rules("password", "Password", 'trim|required|min_length[8]|matches[confirm]');
		$this->form_validation->set_rules("confirm", "Confirm Password", 'trim|required|min_length[8]');

		if($this->form_validation->run() == FALSE)
		{
			$data = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $data);
			redirect('/users/load_update_password');
		}

		if($current_password['password'] == md5($post['current_password']))
		{

			if(md5($post['password']) == md5($post['current_password']))
			{
				$data['errors'] = 'New password and current password must be different';
				$this->session->set_flashdata('errors', $data);
				$this->load->view('/update_password');
			}

			else
			{
				$this->User->update_password($post);
				redirect('/users/load_myaccount');
			}
		}
		else
		{
			$data = 'Incorrect Current Password';
			$this->session->set_flashdata('error', $data);
			redirect('/users/load_update_password');
		}
	}

	public function contactvalidate()
	{
		$this->load->library('form_validation');
		
		if($this->input->post('action') == 'submit')
		{
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]');
			$this->form_validation->set_rules("email", "Email", 'trim|required');
			$this->form_validation->set_rules("information", "Message", 'trim|required|min_length[2]');
		}
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('/contact_us', validation_errors());
		}
		else
		{
			$this->sendemail($this->input->post());
			redirect('users/load_contact_us');
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
		$this->email->subject("comment from " .$content['email']);
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

?>
