<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = null)
	{
		$content		= $this->category->paginate($page)->get();
		$totalContent	= $this->category->get();
		$totalRows		= count($totalContent);
		$pagination		= $this->category->makePagination(site_url('category'), 2, $totalRows);

		$main_view		= 'pages/category/index';

		$this->load->view('app', compact('main_view', 'content', 'totalRows', 'pagination'));
	}

}

/* End of file Category.php */
