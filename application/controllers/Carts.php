<?php 
class Carts extends CI_Controller
{
	public function load_cart()
	{
		if($this->session->userdata('id') !== null)
		{
			$this->load->model('Cart');
			$data['items'] = $this->Cart->get_user_cart();
			$this->load->view('/cart', $data);
		}
		else
		{
			$data['items'] = $this->session->userdata('cart');
			$this->load->view('/cart', $data);
		}
	}

	public function add_product()
	{
		$this->load->model('Cart');
		$this->Cart->add_product($this->input->post());
	}

	public function update_quantity()
	{
		$this->load->model('Cart');
		$this->Cart->update_quantity($this->input->post());
		redirect("/carts/load_cart");
	}

	public function delete_item()
	{
		$this->load->model('Cart');
		$this->Cart->delete_item($this->input->post());
		redirect("/carts/load_cart");
	}

}
 ?>
