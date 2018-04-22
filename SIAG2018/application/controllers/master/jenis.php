<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jenis','jenis');
		$this->load->library('form_validation');
	}

	public function ajax_list()
	{
		$list = $this->jenis->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jenis) {
			$no++;
			$row = array();
			$row[] = $jenis->jenis_id;
			$row[] = $jenis->jenis;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jenis('."'".$jenis->jenis_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jenis('."'".$jenis->jenis_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jenis->count_all(),
						"recordsFiltered" => $this->jenis->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->jenis->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'jenis' => $this->input->post('jenis'),
			);
		$insert = $this->jenis->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update()
	{
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'jenis' => $this->input->post('jenis'),
			);
		$this->jenis->update(array('jenis_id' => $this->input->post('jenis_id')), $data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->jenis->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
