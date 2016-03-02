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
			$this->load->model('User');
			$data['user'] = $this->User->get_user($this->session->userdata('id'));
			$data['items'] = $this->Cart->item_price();
			$data['cost'] = $this->Cart->total_price();
			//var_dump($data);
			$this->load->view('/cart', $data);
		}
		else if ($this->session->userdata('guest_id') == null)
		{
			$this->load->model('Guest_cart');
			$guest_id = $this->Guest_cart->add_guest();
			$this->session->set_userdata('guest_id', $guest_id);
			$data['items'] = [];
			$data['cost'] = 0;
			$data['user']['first_name'] = '';
			$data['user']['last_name'] = '';
			$data['user']['email'] = '';
			$data['user']['billing_street'] = '';
			$data['user']['billing_city'] = '';
			$data['user']['billing_state'] = 'Select State';
			$data['user']['billing_zip'] = '';
			$this->load->view('/cart', $data);
		}
		else
		{
			$this->load->model('Guest_cart');
			$data['items'] = $this->Guest_cart->item_price();
			$data['cost'] = $this->Guest_cart->total_price();
			$data['user']['first_name'] = '';
			$data['user']['last_name'] = '';
			$data['user']['email'] = '';
			$data['user']['billing_street'] = '';
			$data['user']['billing_city'] = '';
			$data['user']['billing_state'] = 'Select State';
			$data['user']['billing_zip'] = '';
			$this->load->view('/cart', $data);
		}
	}

	public function add_product()
	{
		$this->load->model('Cart');
		$this->Cart->add_product($this->input->post());
	}
	public function add_product_guest()
	{
		$this->load->model('Cart');
		$this->Cart->add_product_guest($this->input->post());
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
			if($this->session->userdata('id') !== null)
			{
				$this->load->model('Cart');
				$this->load->model('User');
				$data['user'] = $this->User->get_user($this->session->userdata('id'));
				$data['items'] = $this->Cart->item_price();
				$data['cost'] = $this->Cart->total_price();
				var_dump($data);
				die('in the wrong place');
				$this->load->view('/cart', $data);
			}
			else if($this->cart->contents() != null)
			{
				$data['items'] = $this->cart->contents();
				$this->load->view('/cart', $data);
			}
			else
			{
				$this->load->view('/cart', $data);
			}
			
		}
		else
		{
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
				die('its ending');
				$this->load->view('/order_confirmation');
			}
		}
	}

}
 ?>
