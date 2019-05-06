<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function index()
	{
		$main_view = 'pages/post/index';
		$this->load->view('app', compact('main_view'));
	}

}

/* End of file Post.php */
