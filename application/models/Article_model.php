<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends MY_Model {

	protected $perPage = 5;

	public function getDefaultValues()
	{
		return [
			'id'			=> '',
			'id_category'	=> '',
			'title'			=> '',
			'body'			=> '',
			'image'			=> '',
			'date'			=> ''
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'id_category',
				'label'	=> 'Category id',
				'rules' => 'required'
			],
			[
				'field' => 'title',
				'label'	=> 'Title',
				'rules' => 'trim|required'
			],
			[
				'field' => 'body',
				'label'	=> 'Body',
				'rules' => 'required',
			],
			[
				'field' => 'image',
				'label'	=> 'Image',
				'rules' => 'required'
			],
			[
				'field' => 'date',
				'label'	=> 'Date',
				'rules' => 'required'
			],
		];
		return $validationRules;
	}

}

/* End of file Article_model.php */
