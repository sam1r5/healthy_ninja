<?php 
class Products extends CI_Controller
{
	public function index()
	{
		//check to see if the user is signed in
		// If the user is signed in set the session data to information that can be sent to the front page
		if($this->session->userdata())
		{
			$this->load->model("User");
			$data['user_information'] = $this->User->get_user($this->session->userdata());
			$this->load->view('/index', $data);
		}
		$this->load->view('/index');
	}

	//this will load the category page with the correct data using post data. Thus a form must be wrapped around the link with a hidden input type.
	//It will also require the use of three diffrent model functions in the Product model page. 
	public function load_product_category()
	{
		$this->load->model('Product');
		if($this->input->post('category') == 'beverage')
		{
			//run the model function from product
			//set the data to from the model to be transferred to the new page
			$this->load->view('/categories'/*, $data*/);
		}
		if($this->input->post('category') == 'food')
		{
			//run the model function from product
			//set the data to from the model to be transferred to the new page
			$this->load->view('/categories'/*, $data*/);
		}
		if($this->input->post('category') == 'supplement')
		{
			//run the model function from product
			//set the data to from the model to be transferred to the new page
			$this->load->view('/categories'/*, $data*/);
		}
	}

	//Add a new product to the the webpage 
	public function add_product()
	{
		//check to see if the user is an admin 
		if($this->session->userdata('admin') == 'admin')
		{
			$this->load->model("Product");
			$this->Product->add_product($this->input->post());
			redirect('/users/load_admin_dashboard');
		}
	}
} 
?>