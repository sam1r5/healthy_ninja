<?php 
class Carts extends CI_Controller
{
	public function load_cart()
	{
		if($this->session->userdata('id') !== null)
		{
			$this->load->model('Cart');
			$data['items'] = $this->cart->get_user_cart();
			$this->load->view('/cart', $data);
		}
		else
		{
			$data['items'] = $this->session->userdata('cart');
			$this->load->view('/cart', $data)
		}
	}

	public function add_product()
	{
		$this->load->model('Cart');
		$this->Cart->add_product();
	}

}
 ?>
