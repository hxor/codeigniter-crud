<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function index()
	{
		$heading = 'List of Posts';
		$content = $this->db->get('posts')->result();

		$main_view = 'pages/post/index';
		$this->load->view('app', compact('main_view', 'heading', 'content'));
	}

	public function show($id)
	{
		$heading = 'Detail Post';
		$content = $this->db->where('id', $id)->get('posts')->row();

		$main_view = 'pages/post/show';
		$this->load->view('app', compact('heading', 'content', 'main_view'));
	}

}

/* End of file Post.php */
