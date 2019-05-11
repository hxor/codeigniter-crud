<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public $username;

	public function __construct()
	{
		parent::__construct();
		$this->username 	= $this->session->userdata('username');
		$level		= $this->session->userdata('level');
		$is_login	= $this->session->userdata('is_login');
		
		if (!$is_login) {
			redirect(base_url());
			return;
		}

		if ($level != 'admin') {
			redirect(base_url());
			return;
		}
			
	}
	
	public function index()
	{
		echo 'Halaman Admin: ' . $this->username;
	}

}

/* End of file Admin.php */
