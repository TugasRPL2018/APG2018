<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kota','kota');
		$this->load->model('m_provinsi');
		$this->load->library('form_validation');
	}

	public function ajax_list()
	{
		$list = $this->kota->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kota) {
			$no++;
			$row = array();
			$row[] = $kota->kota_id;
			$row[] = $kota->kota;
			$row[] = $kota->provinsi;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kota('."'".$kota->kota_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kota('."'".$kota->kota_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kota->count_all(),
						"recordsFiltered" => $this->kota->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kota->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->form_validation->set_rules('kota', 'kota', 'required');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'kota' => $this->input->post('kota'),
				'provinsi' => $this->input->post('provinsi'),
			);
		$insert = $this->kota->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update()
	{
		$this->form_validation->set_rules('kota', 'kota', 'required');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'kota' => $this->input->post('kota'),
				'provinsi' => $this->input->post('provinsi'),
			);
		$this->kota->update(array('kota_id' => $this->input->post('kota_id')), $data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->kota->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
