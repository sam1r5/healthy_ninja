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
	public function load_product_beverage($page_number)
	{
		$this->load->model('Product');
		$prod_cat['page_number'] = $page_number;
		$prod_cat['count'] = $this->Product->get_number_of_pages(2, 'Beverages');
		//run the model function from product
		//set the data to from the model to be transferred to the new page
		$prod_cat['products'] = $this->Product->get_products_by_category('Beverages', $prod_cat['page_number'], 2);
		$prod_cat['destination'] = "/Products/load_product_beverage/";
		$this->load->view('/categories', $prod_cat);
	}

	public function load_product_food()
	{
		$this->load->model('Product');
		$prod_cat['count'] = $this->Product->get_number_of_pages(2, 'Bars');
		//run the model function from product
		//set the data to from the model to be transferred to the new page
		$prod_cat['products'] = $this->Product->get_products_by_category('Bars');
		$this->load->view('/categories', $prod_cat);
	}

	public function load_product_supplement()
	{
		$this->load->model('Product');
		$prod_cat['count'] = $this->Product->get_number_of_pages(2, 'Supplements');
			//run the model function from product
			//set the data to from the model to be transferred to the new page
		$prod_cat['products'] = $this->Product->get_products_by_category('Supplements');
		$this->load->view('/categories', $prod_cat);

	}
	//Add a new product to the the webpage 
	public function add_new_product()
	{
		$name = $this->input->post('product_name');
		$this->load->helper(array('form', 'url'));
		$config['upload_path'] = './assets/images/';
		$config['file_name'] = $name;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('product_image'))
		{
			$error = array('error' => $this->upload->display_errors());
			// var_dump($error);
			// die();
			$this->load->view('products/add_new_product', $error);
		}
		else
		{
			$this->load->model('Product');
			$post = $this->input->post();
			$this->Product->add_product($post);
			$data = array('upload_data' => $this->upload->data());
			redirect('/users/load_admin_dashboard');
		}
		//check to see if the user is an admin 
		// if($this->session->userdata('admin') == 'admin')
		// {
			// $this->load->model("Product");
			// $this->Product->add_product($this->input->post());
			// redirect('/users/load_admin_dashboard');
		// }
	}
	// Function below is taking get info from the link the user clicks on the category view. We pass that to the models to get the product info and reviews.
	public function load_product_page()
	{
		if($this->input->post())
		{
			$post = $this->input->post('product_id');
		}
		else
		{
			$post = $this->session->userdata['product_id'];
		}
		$this->load->model('Product');
		$product_info['product_info'] = $this->Product->get_product($post);
		$this->load->model('Review');
		$product_info['reviews'] = $this->Review->get_reviews($post);
		$sum = 0;
		$count = 0;
		foreach($product_info['reviews'] as $rating)
		{
			$sum += $rating['rating'];
			$count++;
		}
		if ($count != 0)
		{
		$avg = $sum/$count . " / 5";
		$product_info['review_content'] = "";
		$product_info['rating'] = round($avg, 2);
		}
		else {
			$product_info['rating'] = 'There are no ratings for this product';
			$product_info['review_content'] = 'There are no reviews for this product.';
		}
		$this->load->view('/product', $product_info);
	}
	public function load_success_page($data)
	{
		$this->load->view('products/add_success', $data);
	}
	public function load_add_product()
	{
		$this->load->view('/add_product');
	}
	public function create_thumbnail()
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = '/assets/images/' . $image_name;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 75;
		$config['height'] = 50;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
	public function load_update()
	{
		$this->load->model('Product');
		$prod_id = $this->input->post('product_id');
		$data['product_info'] = $this->Product->get_product($prod_id);
		$this->load->view('/update_product', $data);
	}
	public function update_product()
	{
		$name = $this->input->post('product_name');
		$this->load->helper(array('form', 'url'));
		$config['upload_path'] = './assets/images/';
		$config['file_name'] = $name;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('product_image'))
		{
			$error = array('error' => $this->upload->display_errors());
			// var_dump($error);
			// die();
			$this->load->view('products/add_new_product', $error);
		}
		else
		{
			$this->load->model('Product');
			$post = $this->input->post();
			$this->Product->update_product($post);
			$data = array('upload_data' => $this->upload->data());
			redirect('/Users/load_admin_dashboard');
		}
	}
} 
?>