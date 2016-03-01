<?php 
class Carts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Load Library and model.
		$this->load->library('cart');
	}
	public function cart()
	{
		if($this->session->userdata('id') !== null)
		{
			$this->load->model('Cart');
			$this->Cart->total_price();
			$data['items'] = $this->Cart->item_price();
			$data['cost'] = $this->Cart->total_price();
			$this->load->view('/cart', $data);
		}
		else if($this->cart->contents() != null)
		{
			$data['items'] = $this->cart->contents();
			$this->load->view('/cart', $data);
		}
		else
		{
			$this->load->view('/cart')
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
		redirect("/carts/cart");
	}

	public function delete_item()
	{
		$this->load->model('Cart');
		$this->Cart->delete_item($this->input->post());
		redirect("/carts/cart");
	}


	public function payment()
	{
		//var_dump($this->input->post()); die('does i');
		require_once('vendor/autoload.php');
		require_once(APPPATH.'libraries/stripe-php-3.9.1/lib/Stripe.php');
		$this->load->model('Cart');
		if($this->session->userdata('id') !== "0")
		{
			$amount = ($this->Cart->total_price()*100);

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

			$this->load->model('Cart');
			$this->Cart->payment();
			$this->load->view('/order_conformation')
		}
	}

}
 ?>
