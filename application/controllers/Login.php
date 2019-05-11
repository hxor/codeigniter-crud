<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		if (!$_POST) {
			$input	= (object) $this->login->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->login->validate()) {
			$main_view = 'auth/login';
			$this->load->view('app', compact('main_view', 'input'));
			return;
		}

		if ($this->login->runLogin($input)) {
			redirect('admin');
		} else {
			$this->session->set_flashdata('error', 'Username atau password salah atau akun anda sedang diblokir');
			redirect('login');
		}
	}

}

/* End of file Login.php */
