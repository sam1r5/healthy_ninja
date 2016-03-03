<?php 

class Reviews extends CI_Controller {
	
	public function add_review()
	{
		$this->load->model('Review');
		$this->Review->add_review($this->input->post());
		redirect('/Reviews/get_reviews') // Need to reload reviews after we add a new one.
	}
}
 ?>