<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sapras extends CI_Model {

	var $table = 'sapras';
	var $column_order = array('sapras_id','sapras','jenis','provinsi','kota','lat','lng','cabor','konten',null); //set column field database for datatable orderable
	var $column_search = array('sapras_id','sapras','jenis','provinsi','kota','lat','lng','cabor','konten'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('sapras_id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','html'));
		$this->load->helper('form');
		$this->load->library('upload');
	}

	private function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('sapras_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('sapras_id', $id);
		$this->db->delete($this->table);
	}
	

	function getKotaList(){
		$provinsi = $this->input->post('provinsi');
		$this->db->select('*');
		$this->db->from('kota');
	    $this->db->where('provinsi', $provinsi);
		$query = $this->db->get();
		return $query;
	}

	function  get_sapras() {  //funtion menampilkan semua provinsi
		 $this->db->from('sapras');
		$this->db->order_by('sapras_id','DESC');
        $this->db->limit(3);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
	
	function  get_maps() {  //funtion menampilkan semua provinsi
		$this->db->group_by('cabor');
		return $this->db->get('sapras');
    }
	
	function getSaprasList(){
		$cabor = $this->input->post('cabor');
		$this->db->select('*');
		$this->db->from('sapras');
	    $this->db->where('cabor', $cabor);
		$query = $this->db->get();
		return $query;
	}
	
	function getMap(){
		$sapras = $this->input->post('sapras');
		$this->db->select('*');
		$this->db->from('sapras');
	    $this->db->where('sapras', $sapras);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	//andri fahmi
	

}
