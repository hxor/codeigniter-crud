<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends MY_Model {

	protected $perPage = 2;

	public function getDefaultValues()
	{
		return [
			'id'	=> '',
			'date'	=> '',
			'title'	=> '',
			'body'	=> '',
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'date',
				'label'	=> 'Date',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'title',
				'label'	=> 'Title',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'body',
				'label'	=> 'Body',
				'rules'	=> 'trim|required'
			]
		];

		return $validationRules;
	}

}

/* End of file Post_model.php */
