<?php 

class Email extends CI_Controller {

	public function __construct()
   	{
    	parent::__construct();
   	}

	function index() {
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 587,
			'smptp_user' => 'adusumilli.srikanth.rk@gmail.com',
			'smtp_pass' => 'WEBpassion35'
			);
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('adsrikanth@gmail.com','Srikanth');
		$this->email->to('adsrikanth@gmail.com');
		$this->email->subject('This is a test');
		$this->email->message("hey this is a message");

		if($this->email->send()) {
			echo 'Your email was sent';
		}
		else {
			show_error($this->email->print_debugger());
		}
	}
}

?>