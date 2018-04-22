<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sapras extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sapras','sapras');
		$this->load->model('m_cabor');
		$this->load->model('m_kota');
		$this->load->model('m_jenis');
		$this->load->library('form_validation');
		$this->load->helper(array('url','html'));
		$this->load->helper('form');
		$this->load->library('upload');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->sapras->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $sapras) {
			$no++;
			$row = array();
			$row[] = $sapras->sapras_id;
			$row[] = $sapras->sapras;
			$row[] = $sapras->jenis;
			$row[] = $sapras->provinsi;
			$row[] = $sapras->kota;
			$row[] = $sapras->lat;
			$row[] = $sapras->lng;
			$row[] = $sapras->cabor;
			if($sapras->foto){
				$row[] = '<a href="'.base_url('assets/images/upload/'.$sapras->foto).'" target="_blank"><img src="'.base_url('assets/images/upload/'.$sapras->foto).'" class="img-responsive" /></a>';
			}else{
				$row[] = '(No photo)';
			}
			$row[] = $sapras->konten;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_sapras('."'".$sapras->sapras_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_sapras('."'".$sapras->sapras_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->sapras->count_all(),
						"recordsFiltered" => $this->sapras->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->sapras->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		
		$this->_validate();
		
		$data = array(
				'sapras' => $this->input->post('sapras'),
				'jenis' => $this->input->post('jenis'),
				'provinsi' => $this->input->post('provinsi1'),
				'kota' => $this->input->post('kota'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'cabor' => $this->input->post('cabor'),
				'konten' => $this->input->post('konten'),
			);

		if(!empty($_FILES['foto']['name']))
		{
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}

		$insert = $this->sapras->save($data);

		echo json_encode(array("status" => TRUE));		
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'sapras' => $this->input->post('sapras'),
				'jenis' => $this->input->post('jenis'),
				'provinsi' => $this->input->post('provinsi1'),
				'kota' => $this->input->post('kota'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'cabor' => $this->input->post('cabor'),
				'konten' => $this->input->post('konten'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('assets/images/upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('assets/images/upload/'.$this->input->post('remove_photo'));
			$data['foto'] = '';
		}

		if(!empty($_FILES['foto']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$sapras = $this->sapras->get_by_id($this->input->post('sapras_id'));
			if(file_exists('assets/images/upload/'.$sapras->foto) && $sapras->foto)
				unlink('assets/images/upload/'.$sapras->foto);

			$data['foto'] = $upload;
		}

		$this->sapras->update(array('sapras_id' => $this->input->post('sapras_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$sapras = $this->sapras->get_by_id($id);
		if(file_exists('assets/images/upload/'.$sapras->foto) && $sapras->foto)
			unlink('assets/images/upload/'.$sapras->foto);
		
		$this->sapras->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function select_kota(){
            if('IS_AJAX') {
        	$data['option_kota'] = $this->sapras->getKotaList();		
			$this->load->view('admin/chain',$data);
            }
		
	}
	
	public function select_sapras(){
            if('IS_AJAX') {
        	$data['option_sapras'] = $this->sapras->getSaprasList();		
			$this->load->view('admin/pilih_sapras',$data);
            }
		
	}
	
	public function select_map(){
            if('IS_AJAX') {
        	$data['option_map'] = $this->sapras->getMap();		
			$this->load->view('admin/map',$data);
            }
		
	}
	
	private function _do_upload()
	{
		$config['upload_path']          = 'assets/images/upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        if(!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('sapras') == '')
		{
			$data['inputerror'][] = 'sapras';
			$data['error_string'][] = 'Sapras is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('jenis') == '')
		{
			$data['inputerror'][] = 'jenis';
			$data['error_string'][] = 'Jenis is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('provinsi1') == '')
		{
			$data['inputerror'][] = 'provinsi1';
			$data['error_string'][] = 'provinsi is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('kota') == '')
		{
			$data['inputerror'][] = 'kota';
			$data['error_string'][] = 'Kota is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}
