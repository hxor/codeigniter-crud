<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table 	= '';
	protected $perPage	= 0;

	public function __construct()
	{
		parent::__construct();

		if (!$this->table) {
			$this->table	= strtolower(
				str_replace('_model', '', get_class($this))
			);
		}
	}

	/**
	 * Fungsi Validasi Input
	 * Rules validasi dideklarasikan dalam masing-masin model
	 *
	 * @return void
	 */
	public function validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters(
			'<small class="form-text text-danger">', '</small>'
		);
		$validationRules = $this->getValidationRules();
		$this->form_validation->set_rules($validationRules);
		return $this->form_validation->run();
	}

	/**
	 * Method untuk membuat query dengan perintah SQL
	 *
	 * @param String $sql
	 * @return void
	 */
	public function query($sql)
	{
		return $this->db->query($sql);
	}

	/**
	 * Chain Method
	 * Seleksi per kolom
	 * @param [type] $columns
	 * @return void
	 */
	public function select($columns)
	{
		$this->db->select($columns);
		return $this;
	}

	/**
	 * Chain method 
	 * Hasil akhir single object
	 * @return void
	 */
	public function first()
	{
		return $this->db->get($this->table)->row();
	}

	/**
	 * Chain Method
	 * Hasil akhir multi object
	 * @return void
	 */
	public function get()
	{
		return $this->db->get($this->table)->result();
	}

	/**
	 * Chain Method
	 * Jumlah data dari hasil query
	 *
	 * @return void
	 */
	public function count()
	{
		return $this->db->count_all_results($this->table);
	}

	/**
	 * Chain Method
	 * Pencarian Menggunakan WHERE
	 *
	 * @param String $column
	 * @param String $condition
	 * @return void
	 */
	public function where($column, $condition)
	{
		$this->db->where($column, $condition);
		return $this;
	}

	/**
	 * Chain Method
	 * Pencarian data menggunakan like
	 *
	 * @param [type] $column
	 * @param [type] $condition
	 * @return void
	 */
	public function like($column, $condition)
	{
		$this->db->like($column, $condition);
		return $this;
	}

	/**
	 * Chain Method
	 * Pencarian Menggunakan OR LIKE
	 *
	 * @param string $column
	 * @param string $condition
	 * @return void
	 */
	public function orLike($column, $condition)
	{
		$this->db->or_like($column, $condition);
		return $this;
	}

	/**
	 * Chain Method
	 * Mengurutkan Data
	 *
	 * @param string $column
	 * @param string $order
	 * @return void
	 */
	public function orderBy($column, $order = 'asc')
	{
		$this->db->order_by($column, $order);
		return $this;
	}

	/**
	 * Chain Method
	 * Menggabungkan lebih dari 1 tabel
	 *
	 * @param [type] $table
	 * @param string $type
	 * @return void
	 */
	public function join($table, $type = 'left')
	{
		$this->db->join($table, 
			"$this->table.id_$table = $table.id", $type
		);
		return $this;
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($data)
	{
		return $this->db->update($this->table, $data);
	}

	public function delete()
	{
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

	/**
	 * Membuat Pagination
	 *
	 * @param [type] $page
	 * @return void
	 */
	public function paginate($page)
	{
		$this->db->limit(
			$this->perPage,
			$this->calculateRealOffset($page)
		);
		return $this;
	}

	/**
	 * Menghitung Offset Data
	 * Perhalaman
	 *
	 * @param [type] $page
	 * @return void
	 */
	public function calculateRealOffset($page)
	{
		if (is_null($page) || empty($page)) {
			$offset = 0;
		} else {
			$offset = ($page * $this->perPage) - $this->perPage;
		}

		return $offset;
	}

	/**
	 * Pembuatan Link Paginations
	 * Bootsrap 4
	 *
	 * @param [type] $baseURL
	 * @param [type] $uriSegment
	 * @param [type] $totalRows
	 * @return void
	 */
	public function makePagination($baseURL, $uriSegment, $totalRows = null)
	{
		$args = func_get_args();
		$this->load->library('pagination');

		$config = [
			'base_url'			=> $baseURL,
			'uri_segment'		=> $uriSegment,
			'per_page'			=> $this->perPage,
			'total_rows'		=> $totalRows,
			'use_page_numbers'	=> true,

			'first_link'		=> 'First',
        	'last_link'			=> 'Last',
        	'next_link'			=> 'Next',
			'prev_link'			=> 'Prev',
			'full_tag_open'		=> '<div class="pagging text-center"><nav><ul class="pagination">',
        	'full_tag_close'	=> '</ul></nav></div>',
        	'num_tag_open'		=> '<li class="page-item"><span class="page-link">',
        	'num_tag_close'		=> '</span></li>',
        	'cur_tag_open'		=> '<li class="page-item active"><span class="page-link">',
        	'cur_tag_close'		=> '<span class="sr-only">(current)</span></span></li>',
        	'next_tag_open'		=> '<li class="page-item"><span class="page-link">',
        	'next_tagl_close'	=> '<span aria-hidden="true">&raquo;</span></span></li>',
        	'prev_tag_open'		=> '<li class="page-item"><span class="page-link">',
        	'prev_tagl_close'	=> '</span>Next</li>',
        	'first_tag_open'	=> '<li class="page-item"><span class="page-link">',
        	'first_tagl_close'	=> '</span></li>',
        	'last_tag_open'		=> '<li class="page-item"><span class="page-link">',
        	'last_tagl_close'	=> '</span></li>',
		];

		if (count($_GET) > 0) {
			$config['suffix'] = '?' . http_build_query($_GET, '', "&");
			$config['first_uri'] = $config['base_url'] . '?' . http_build_query($_GET);
		} else {
			$config['suffix'] = http_build_query($_GET, '', "&");
			$config['first_url'] = $config['base_url'];
		}

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/**
	 * Hashing input or password
	 *
	 * @param [type] $input
	 * @return boolean
	 */
	public function hash($input)
	{
		$hash = password_hash($input, PASSWORD_DEFAULT);
		return $hash;
	}

	/**
	 * Verify between input password
	 * with hashed string
	 *
	 * @param String $password
	 * @param String $hash
	 * @return void
	 */
	public function hashVerify($password, $hash) {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

}

/* End of file MY_MOdel.php */
