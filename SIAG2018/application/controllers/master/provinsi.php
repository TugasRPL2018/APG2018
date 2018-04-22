<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_provinsi','provinsi');
		$this->load->library('form_validation');
	}

	public function ajax_list()
	{
		$list = $this->provinsi->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $provinsi) {
			$no++;
			$row = array();
			$row[] = $provinsi->provinsi_id;
			$row[] = $provinsi->provinsi;
			$row[] = $provinsi->lat;
			$row[] = $provinsi->lng;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_provinsi('."'".$provinsi->provinsi_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_provinsi('."'".$provinsi->provinsi_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->provinsi->count_all(),
						"recordsFiltered" => $this->provinsi->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->provinsi->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required');
		$this->form_validation->set_rules('lat', 'lat', 'required');
		$this->form_validation->set_rules('lng', 'lng', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'provinsi' => $this->input->post('provinsi'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),

			);
		$insert = $this->provinsi->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update()
	{
		$this->form_validation->set_rules('provinsi', 'provinsi', 'provinsi');
		$this->form_validation->set_rules('lat', 'lat', 'required');
		$this->form_validation->set_rules('lng', 'lng', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'provinsi' => $this->input->post('provinsi'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),				
			);
		$this->provinsi->update(array('provinsi_id' => $this->input->post('provinsi_id')), $data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->provinsi->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	

}
