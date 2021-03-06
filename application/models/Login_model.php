<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model {

	public $table	= 'user';
	
	public function getDefaultValues()
	{
		return [
			'username'	=> '',
			'password'	=> ''
		];	
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'username',
				'label'	=> 'Username',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'password',
				'label' => 'Password',
				'rules'	=> 'required'
			]
		];
		return $validationRules;
	}

	public function runLogin($input)
	{
		$user = $this->db->where('username', strtolower($input->username))
						 ->get($this->table)
						 ->row();

		if (!empty($user) && $this->hashVerify($input->password, $user->password)) {
			$data = [
				'name'		=> $user->name,
				'username'	=> $user->username,
				'level'		=> $user->level,
				'is_login'	=> true,
			];

			$this->session->set_userdata($data);
			return true;
		}
		
		return false;
	}
}

/* End of file Login_model.php */

