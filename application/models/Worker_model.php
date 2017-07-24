<?php


class Worker_model extends CI_Model {
	protected $table = 'worker_record';
	public function __construct() {
		parent::__construct();
	}
	
	public function get_model($limit, $offset) {
		$this->db->order_by('id_worker_record', 'desc');
		$this->db->limit($limit, $offset);
		$q = $this->db->get('worker_record');
		return $q->result();
	}
	
	public function get_model_pagination() {
		$this->db->order_by('id_worker_record', 'desc');
		$q = $this->db->get('worker_record');
		return $q;
	}
	
	public function searchworker($searchkey) {
		$this->db->order_by('id_worker_record', 'desc');
		$this->db->like('worker_email', $searchkey, 'both');
		$q = $this->db->get('worker_record');
		return $q->result();
	}
	
	public function insertworker($_barcodeid, $_fullname, $_address, $_phone, $_email, $_startdate, $_enddate, $_position, $_salary, $_createdate, $_status) {
		$sources = array('worker_barcodeid'=>$_barcodeid, 'worker_fullname'=>$_fullname, 'worker_address'=>$_address, 'worker_phone'=>$_phone, 'worker_email'=>$_email, 'worker_startdate'=>$_startdate, 'worker_enddate'=>$_enddate, 'worker_position'=>$_position, 'worker_salary'=>$_salary, 'worker_createdate'=>$_createdate, 'worker_status'=>$_status);
		$this->db->insert('worker_record', $sources);
	}
	
	public function editworker($_getid, $_barcodeid, $_fullname, $_address, $_phone, $_email, $_startdate, $_enddate, $_position, $_salary, $_status) {
		$sources = array('worker_barcodeid'=>$_barcodeid, 'worker_fullname'=>$_fullname, 'worker_address'=>$_address, 'worker_phone'=>$_phone, 'worker_email'=>$_email, 'worker_startdate'=>$_startdate, 'worker_enddate'=>$_enddate, 'worker_position'=>$_position, 'worker_salary'=>$_salary, 'worker_status'=>$_status);
		$this->db->where('id_worker_record', $_getid);
		$this->db->update('worker_record', $sources);
	}
	
	public function getsingle($val) {
		$q = $this->db->get_where('worker_record', array('id_worker_record'=>$val));
		return $q->result();
	}
	
	public function updateworker($val) {
		$q = $this->db->get_where($this->table, array('id_worker_record'=>$val));
		$result = $q->row_array();
			
		if($result['worker_status'] == 'New') {
			$data = array('worker_status'=>'Done');
			$this->db->where('id_worker_record', $val);
			$this->db->update('worker_record', $data);
		} else {
			$data = array('worker_status'=>'New');
			$this->db->where('id_worker_record', $val);
			$this->db->update('worker_record', $data);
		}
	}
		
	public function deleteworker($val) {
		$this->db->where('id_'.$this->table, $val);
		$this->db->delete($this->table);
	}
}