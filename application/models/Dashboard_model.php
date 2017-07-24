<?php


class Dashboard_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
		
	public function latestworker() {
		$this->db->order_by('id_worker_record', 'desc');
		$this->db->limit(1);
		$q = $this->db->get_where('worker_record', array('worker_status'=>'Publish'));
		return $q->result();
	}
		
	public function todayabsensi($today) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$this->db->order_by('id_absensi_record', 'desc');
		$q = $this->db->get_where('absensi_record', array('absensi_date'=>$today));
		return $q->result();
	}
		
	
	
}
?>