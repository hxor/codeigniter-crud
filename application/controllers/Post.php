<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function index($page = null)
	{
		$heading	= 'List of Posts';
		$per_page	= 3;

		// Menghitung Offset (permulaan data)
		if ($page == null) {
			$offset	= 0;
		} else {
			$offset	= ($page * $per_page) - $per_page;
		}

		// Mendapatkan data post berdasarkan offset
		$content		=	$this->db->limit($per_page, $offset)
								->get('posts')->result();
		$total_content	= $this->db->get('posts')->num_rows();

		// Mengolah pagination
		$this->load->library('pagination');
		$config['base_url']			= base_url('post/');
		$config['total_rows']		= $total_content;
		$config['per_page']			= $per_page;
		$config['use_page_numbers']	= true;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';

		// Bootstrap Pagination
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$pagination	= $this->pagination->create_links();

		$main_view = 'pages/post/index';
		$this->load->view('app', compact('main_view', 'heading', 'content', 'total_content', 'pagination'));
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
