<?php 

class Reviews extends CI_Controller {
	
	public function add_review()
	{
		var_dump($this->input->post());
		die('here');
		$this->load->model('Review');
		$post = $this->input->post();
/*		var_dump($post); die('here');*/
		$this->Review->add_review($post);
		redirect('/products/load_product_page'); // Need to reload reviews after we add a new one.
	}
}
 ?>