<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_operator','operator');
		$this->load->library('form_validation');
	}

	public function ajax_list()
	{
		$list = $this->operator->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $operator) {
			$no++;
			$row = array();
			$row[] = $operator->username;
			$row[] = $operator->password;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_operator('."'".$operator->username."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_operator('."'".$operator->username."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->operator->count_all(),
						"recordsFiltered" => $this->operator->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->operator->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors('');
		
		}
		else
		{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level'),
			);
		$insert = $this->operator->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors('');
		
		}
		else
		{
		$data = array(
				'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level'),
			);
		$this->operator->update(array('username' => $this->input->post('username')), $data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->operator->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
