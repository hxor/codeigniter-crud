<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function index($page = null)
	{
		$heading	= 'List of Posts';

		$content	= $this->post->orderBy('id', 'desc')->paginate($page)->getAll();
		$total		= $this->post->orderBy('id', 'desc')->getAll();
		$totalRows	= count($total);
		$pagination	= $this->post->makePagination(site_url('post'), 2, $totalRows);
		$main_view = 'pages/post/index';

		$this->load->view('app', compact('main_view', 'heading', 'content', 'totalRows', 'pagination'));
	}

	public function search($page = null)
	{
		$heading	= 'List of Posts';
		
		if (isset($_POST['keywords'])) {
			$this->session->set_userdata('keywords', $this->input->post('keywords'));
		}
		
		$keywords 	= $this->session->userdata('keywords');	
		$content	= $this->post->where('title', $keywords)
						->orLike('body', $keywords)
						->paginate($page)
						->getAll();
		$total		= $this->post->where('title', $keywords)
						->orLike('body', $keywords)
						->getAll();
		$totalRows	= count($total);
		$pagination	= $this->post->makePagination(site_url('post/search'), 3, $totalRows);

		$main_view = 'pages/post/index';
		$this->load->view('app', compact('main_view', 'heading', 'content', 'totalRows', 'pagination'));
	}

	public function create()
	{
		if (!$_POST) {
			$input = (object) $this->post->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->post->validate()) {
			$heading 		= 'Create New';
			$main_view		= 'pages/post/form';
			$form_action	= 'post/create';

			$this->load->view('app', compact('main_view', 'heading', 'form_action', 'input'));
			return;
		}

		if ($this->post->insert($input)) {
			$this->session->set_flashdata('success', 'Data has been saved.');
		} else {
			$this->session->set_flashdata('error', 'Oops! Something error!.');
		}

		redirect('post');
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
