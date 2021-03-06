<?php 
class Guest_carts extends CI_Controller
{

	public function add_product()
	{
		if($this->session->userdata('guest_id') == null)
		{
			$this->load->model('Guest_cart');
			$guest_id = $this->Guest_cart->add_guest();
			$this->session->set_userdata('guest_id', $guest_id);
		}
		$this->load->model('Guest_cart');
		$this->Guest_cart->add_product($this->input->post());
		redirect('/products');
	}

	public function update_quantity()
	{
		$this->load->model('Guest_cart');
		$this->Guest_cart->update_quantity($this->input->post());
		redirect("/carts/cart");
	}

	public function delete_item()
	{
		$this->load->model('Guest_cart');
		$this->Guest_cart->delete_item($this->input->post());
		redirect("/carts/cart");
	}


	public function payment()
	{
		//var_dump($this->input->post()); die('does i');
		require_once('vendor/autoload.php');
		require_once(APPPATH.'libraries/stripe-php-3.9.1/lib/Stripe.php');
		$this->load->model('Guest_cart');
		$post = $this->input->post();
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("last_name", "Last name", 'trim|required|min_length[2]');
		$this->form_validation->set_rules("billing_street", "Street Address", 'trim|required');
		$this->form_validation->set_rules("billing_city", "City", 'trim|required');
		$this->form_validation->set_rules("billing_state", "State", 'trim|required');
		$this->form_validation->set_rules("billing_zip", "Zip Code", 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			$data = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $data);
			$this->load->model('Guest_cart');
			$data['user'] = [];
			$data['items'] = $this->Guest_cart->item_price();
			$data['cost'] = $this->Guest_cart->total_price();
			$this->load->view('/cart', $data);
			
		}
		else
		{
			$this->Guest_cart->add_guest_information($post);
			
			$amount = ($this->Guest_cart->total_price()*100);

			$stripe = array(
			  "secret_key"      => "sk_test_SMEWYjteWylw6ogtVSEaKP8a",
			  "publishable_key" => "pk_test_7iOHbJHH30UWg4T6rvntOiGC"

			);

			\Stripe\Stripe::setApiKey($stripe['secret_key']);

			$token  = $this->input->post('stripeToken');

			$customer = \Stripe\Customer::create(array(
			    'email' => $this->input->post("stripeEmail"),
			    'card'  => $token
			));

			$charge = \Stripe\Charge::create(array(
			    'customer' => $customer->id,
			    'amount'   => $amount,
			    'currency' => 'usd'
			  ));

			$this->load->model('Guest_cart');
			$this->Guest_cart->payment();
			$this->load->view('/order_confirmation');
		}
	}

}
 ?>
