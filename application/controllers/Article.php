<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index($page = null)
	{
		$content	= $this->article->select(['article.id', 'article.title', 'category.title AS category_title'])
						->join('category')
						->orderBy('date', 'DESC')
						->paginate($page)
						->get();
						
		$totalRows	= $this->article->count();
		$pagination	= $this->article->makePagination(site_url('article'), 2, $totalRows);

		$main_view	= 'pages/article/index';
		$this->load->view('app', compact('main_view', 'content', 'totalRows', 'pagination'));
	}

}

/* End of file Article.php */
