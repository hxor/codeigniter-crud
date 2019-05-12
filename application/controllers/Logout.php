<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$sess_data = ['is_login', 'name', 'username', 'level'];
		$this->session->unset_userdata($sess_data);
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

/* End of file Logout.php */
