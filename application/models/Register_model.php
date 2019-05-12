<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model {

	public $table = 'user';

	public function getDefaultValues()
	{
		return [
			'name'		=> '',
			'username'	=> '',
			'password'	=> '',
			'level'		=> ''
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'name',
				'label' => 'Name',
				'rules'	=> 'trim|required'
			],
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required|min_length[5]|is_unique[user.username]',
				'errors' => [
					'is_unique' => 'This %s already exists.'
				]
			],
			[
				'field'	=> 'password',
				'label' => 'Password',
				'rules'	=> 'trim|required|min_length[8]|matches[password]',
			],
			[
				'field'	=> 'password_confirmation',
				'label' => 'Password Confirmation',
				'rules' => 'required|matches[password]'
			]
		];

		return $validationRules;
	}

	public function runRegister($input)
	{
		$data = [
			'name' 		=> $input->name,
			'username'	=> $input->username,
			'password'	=> md5($input->password),
			'level'		=> 'member'
		];
		$user				= $this->insert($data);
			$sess_data = [
				'name'		=> $data['name'],
				'username'	=> $data['username'],
				'level'		=> $data['level'],
				'is_login'	=> true,
			];
			$this->session->set_userdata($sess_data);
			return true;
	}

}

/* End of file Register_model.php */
