<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = null)
	{
		$content		= $this->category->orderBy('id')->paginate($page)->get();
		$totalRows		= $this->category->count();
		$pagination		= $this->category->makePagination(site_url('category'), 2, $totalRows);

		$main_view		= 'pages/category/index';

		$this->load->view('app', compact('main_view', 'content', 'totalRows', 'pagination'));
	}

	public function create()
	{
		if (!$_POST) {
			$input = (object) $this->category->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->category->validate()) {
			$main_view		= 'pages/category/form';
			$form_action	= 'category/create';

			$this->load->view('app', compact('main_view', 'form_action', 'input'));
			return;
		}

		if ($this->category->insert($input)) {
			$this->session->set_flashdata('success', 'Data has been saved.');
		} else {
			$this->session->set_flashdata('error', 'Oops! Something error!.');
		}

		redirect('category');
	}

	public function edit($id = null)
	{
		$content = $this->category->where('id', $id)->first();
		if (!$content) {
			$this->session->set_flashdata('warning', 'Data Not Found.');
			redirect('post');
		}

		if (!$_POST) {
			$input = (object) $content;
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->category->validate()) {
			$main_view		= 'pages/category/form';
			$form_action	= "category/edit/{$id}";

			$this->load->view('app', compact('main_view', 'form_action', 'input'));
			return;
		}

		if ($this->category->where('id', $id)->update($input)) {
			$this->session->set_flashdata('success', 'Data has been updated.');
		} else {
			$this->session->set_flashdata('error', 'Oops! Something error!.');
		}

		redirect('category');
	}

	public function unique_title()
	{
		$title			= $this->input->post('title');
		$id_category	= $this->input->post('id');

		$category = $this->category->where('title', $title)->first();

		if ($category) {
			if ($id_category == $category->id) {
				return true;
			}
			$this->form_validation->set_message('unique_title', '%s already exists!');
			return false;
		}

		return true;
	}

}

/* End of file Category.php */
