<?php

class Enam extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->helper('form');
		$this->load->model('m_sapras');
		$this->load->model('m_cabor');
	}

	public function index(){		
		$data['sapras'] = $this->m_sapras->get_sapras(); //query dari model
		$data['maps'] = $this->m_sapras->get_maps();
		$data['cabor'] = $this->m_cabor->get_cabor();
		$this->load->view('index',$data);
	}
	
	public function login(){		
		$this->load->view('frmlogin');
	}
}

?>