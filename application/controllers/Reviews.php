<?php 

class Reviews extends CI_Controller {
	
	public function add_review()
	{
		$this->load->model('Review');
		$post = $this->input->post();
/*		var_dump($post); die('here');*/
		$this->Review->add_review($post);
		$this->session->set_userdata('product_id', $post['product_id']);
		redirect("/products/load_product_page/"); // Need to reload reviews after we add a new one.
	}
}
 ?>