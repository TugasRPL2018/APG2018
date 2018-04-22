<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cabor','cabor');
		$this->load->library('form_validation');
	}

	public function ajax_list()
	{
		$list = $this->cabor->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cabor) {
			$no++;
			$row = array();
			$row[] = $cabor->cabor_id;
			$row[] = $cabor->cabor;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_cabor('."'".$cabor->cabor_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_cabor('."'".$cabor->cabor_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->cabor->count_all(),
						"recordsFiltered" => $this->cabor->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->cabor->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->form_validation->set_rules('cabor', 'cabor', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		}
		else
		{
			$data = array(
				'cabor' => $this->input->post('cabor'),
			);
		$insert = $this->cabor->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update()
	{
		$this->form_validation->set_rules('cabor', 'cabor', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		}
		else
		{
		$data = array(
				'cabor' => $this->input->post('cabor'),
			);
		$this->cabor->update(array('cabor_id' => $this->input->post('cabor_id')), $data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->cabor->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
