<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubahpassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_ubahpassword','ubahpassword');
		$this->load->library('form_validation');
	}

	public function ajax_list()
	{
		$list = $this->ubahpassword->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ubahpassword) {
			$no++;
			$row = array();
			$row[] = $ubahpassword->username;
			$row[] = $ubahpassword->password;

			//add html for action
			$row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_ubahpassword('."'".$ubahpassword->username."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ubahpassword->count_all(),
						"recordsFiltered" => $this->ubahpassword->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->ubahpassword->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		}
		else
		{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level'),

			);
		$insert = $this->ubahpassword->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
		
		}
		else
		{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level'),			
			);
		$this->ubahpassword->update(array('username' => $this->input->post('username')), $data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->ubahpassword->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	

}
