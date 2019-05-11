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
				'rules'	=> 'trim|required'
			]
		];
		return $validationRules;
	}

	public function runLogin($input)
	{
		$input->password = md5($input->password);
		$user = $this->db->where('username', $input->username)
						 ->where('password', $input->password)
						//  ->limit(1)
						 ->get($this->table)
						 ->row();

		if (count($user)) {
			$data = [
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

