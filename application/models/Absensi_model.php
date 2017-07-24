<?php


class Absensi_model extends CI_Model {
	protected $table = 'absensi_record';
	public function __construct() {
		parent::__construct();
	}
	
	public function get_model($limit, $offset) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$this->db->order_by('id_absensi_record', 'desc');
		$this->db->limit($limit, $offset);
		$q = $this->db->get('absensi_record');
		return $q->result();
	}
	
	public function get_model_pagination() {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$this->db->order_by('id_absensi_record', 'desc');
		$q = $this->db->get('absensi_record');
		return $q;
	}
	
	public function get_modeltoday($today, $limit, $offset) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$this->db->order_by('id_absensi_record', 'desc');
		$this->db->limit($limit, $offset);
		$q = $this->db->get_where('absensi_record', array('absensi_date'=>$today));
		return $q->result();
	}
	
	public function get_modeltoday_pagination($today) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$this->db->order_by('id_absensi_record', 'desc');
		$q = $this->db->get_where('absensi_record', array('absensi_date'=>$today));
		return $q;
	}
	
	public function searchabsensi($searchkey) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$this->db->order_by('id_absensi_record', 'desc');
		$this->db->like('worker_fullname', $searchkey, 'both');
		$q = $this->db->get('absensi_record');
		return $q->result();
	}
	
	public function getworker() {
		$this->db->order_by('id_worker_record', 'desc');
		$q = $this->db->get_where('worker_record', array('worker_status'=>'Publish'));
		return $q->result();
	}
	
	public function insertabsensi($_worker, $_tanggal, $_morningtime, $_restout, $_restin, $_gohome, $_srest, $_notes, $_tstatus, $_createdate, $_status) {
		$sources = array('worker_id'=>$_worker, 'absensi_date'=>$_tanggal, 'absensi_morningtime'=>$_morningtime, 'absensi_restout'=>$_restout, 'absensi_restin'=>$_restin, 'absensi_gohome'=>$_gohome, 'absensi_setafterrest'=>$_srest, 'absensi_notes'=>$_notes, 'absensi_tstatus'=>$_tstatus, 'absensi_createdate'=>$_createdate, 'absensi_status'=>$_status);
		$this->db->insert('absensi_record', $sources);
	}
	
	public function editabsensi($_getid, $_worker, $_tanggal, $_morningtime, $_restout, $_restin, $_gohome, $_srest, $_notes, $_tstatus, $_status) {
		$sources = array('worker_id'=>$_worker, 'absensi_date'=>$_tanggal, 'absensi_morningtime'=>$_morningtime, 'absensi_restout'=>$_restout, 'absensi_restin'=>$_restin, 'absensi_gohome'=>$_gohome, 'absensi_setafterrest'=>$_srest, 'absensi_notes'=>$_notes, 'absensi_tstatus'=>$_tstatus, 'absensi_status'=>$_status);
		$this->db->where('id_absensi_record', $_getid);
		$this->db->update('absensi_record', $sources);
	}
	
	public function getsingle($val) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$q = $this->db->get_where('absensi_record', array('id_absensi_record'=>$val));
		return $q->result();
	}
	
	public function updateabsensi($val) {
		$q = $this->db->get_where($this->table, array('id_absensi_record'=>$val));
		$result = $q->row_array();
			
		if($result['absensi_status'] == 'New') {
			$data = array('absensi_status'=>'Done');
			$this->db->where('id_absensi_record', $val);
			$this->db->update('absensi_record', $data);
		} else {
			$data = array('absensi_status'=>'New');
			$this->db->where('id_absensi_record', $val);
			$this->db->update('absensi_record', $data);
		}
	}
		
	public function deleteabsensi($val) {
		$this->db->where('id_'.$this->table, $val);
		$this->db->delete($this->table);
	}
}