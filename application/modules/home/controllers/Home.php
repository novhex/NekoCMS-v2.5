<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper(array('url','string'));
		$this->load->library(array('redbean','form_validation','paginator'));
	}

	public function index(){

		$this->paginator->set_config(10,'p');
		$this->paginator->set_total(R::count('books'));
		$limit=$this->paginator->get_limit();
		$data['xss'] = '<script>alert("sds");</script>';
		$data['list'] =R::findAll('books',$limit);
		$data['page_links'] = $this->paginator->page_links();
		$this->load->view('default',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */