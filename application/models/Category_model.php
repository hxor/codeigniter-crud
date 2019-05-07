<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{

	protected $perPage = 5;

	public function getDefaultValues()
	{
		return [
			'id'	=> '',
			'title'	=> '',
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'title',
				'label'	=> 'Title',
				'rules'	=> 'trim|required|callback_unique_title'
			]
		];

		return $validationRules;
	}

}

/* End of file Category_model.php */
