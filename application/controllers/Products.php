<?php 
class Products extends CI_Controller
{
	public function index()
	{
		//check to see if the user is signed in
		// If the user is signed in set the session data to information that can be sent to the front page
		if($this->session->userdata())
		{
			$this->load->view('/index');
		}
	}

	//this will load the category page with the correct data using post data. Thus a form must be wrapped around the link with a hidden input type.
	//It will also require the use of three diffrent model functions in the Product model page. 
	public function load_product_beverage()
	{
		die('beverage');
		$this->load->model('Product');
		//run the model function from product
		//set the data to from the model to be transferred to the new page
		$this->load->view('/categories'/*, $data*/);
	}

	public function load_product_food()
	{
				die('food');
		$this->load->model('Product');
		//run the model function from product
		//set the data to from the model to be transferred to the new page
		$this->load->view('/categories'/*, $data*/);
	}

	public function load_product_supplement()
	{
				die('supplement');
		$this->load->model('Product');
			//run the model function from product
			//set the data to from the model to be transferred to the new page
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
	// Function below is taking get info from the link the user clicks on the category view. We pass that to the models to get the product info and reviews.
	public function load_product_page($prod_id)
	{
		$this->load->model('Product');
		$product_info['product_info'] = $this->Product->get_product($prod_id);
		$this->load->model('Review');
		$product_info['reviews'] = $this->Review->get_reviews($prod_id);
		$this->load->view('products/product', $product_info);
	}
} 
?>