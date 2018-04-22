<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	var $limit=10;
    var $offset=10;
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_provinsi');
		$this->load->model('m_cabor');
		$this->load->model('m_kota');
		$this->load->model('m_operator');
		$this->load->model('m_jenis');
		$this->load->helper(array('url','html'));
		$this->load->helper('form');
		$this->load->library('upload');
		$this->auth->cek_auth(); //ngambil auth dari library
		
	}
	function index()
	{
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==1){//admin
			$this->load->view('admin/index',$data);
		}else{ //user
			$this->load->view('operator/index',$data);
		}
		
	}
	
	function provinsi(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==1){//admin
		
		$this->load->view('admin/provinsi');
		}else{
			$this->load->view('operator/index');
		}
	}
	
	public function kota(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==1){//admin
		$data['provinsi'] = $this->m_provinsi->get_provinsi();
		$this->load->view('admin/kota',$data);
		}else{
			$this->load->view('operator/index');
		}
	}
	
	function cabor(){
		$this->load->view('admin/cabor');
	}
	
	function operator(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==1){//admin
		$this->load->view('admin/operator');
		}else{
			$this->load->view('operator/index');
		}
	}
	
	function jenis(){
		$this->load->view('admin/jenis');
	}
	
	function sapras(){
		$data['cabor'] = $this->m_cabor->get_cabor();
		$data['provinsi'] = $this->m_provinsi->get_provinsi();
		$data['kota'] = $this->m_kota->get_kota();
		$data['jenis'] = $this->m_jenis->get_jenis();
		$this->load->view('admin/sapras',$data);
	}
	
	function ubahpassword(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
		);
		$stat = $this->session->userdata('lvl');
		$this->load->view('admin/ubahpassword',$data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('enam','refresh');
	}
}