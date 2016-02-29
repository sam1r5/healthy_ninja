<?php

class Emails extends CI_Controller
{
	/*this function will send an Email*/
	public function send_email()
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'ecommercecodingdojo@gmail.com',
			'smtp_pass' => 'C0dingD0j0'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('ecommercecodingdojo@gmail.com', 'From test');
		/*the to field is who will be sent thie Email*/
		$this->email->to('ecommercecodingdojo@gmail.com');
		$this->email->subject('Test');
		$this->email->message('It is working');

		if($this->email->send())
		{
			echo 'Your email was sent';
		}

		else
		{
			show_error($this->email->pring_debugger());
		}
	}
}