<?php

class View_front extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function cekabsensitoday($_barcodeid, $_today) {
		$this->db->join('worker_record', 'absensi_record.worker_id = worker_record.id_worker_record', 'left');
		$q = $this->db->get_where('absensi_record', array('worker_barcodeid'=>$_barcodeid, 'absensi_date'=>$_today));
		return $q;
	}
	
	public function updaterest($absensiid, $timenow, $_notes, $_tstatus) {
		$sources = array('absensi_restin'=>$timenow, 'absensi_notes'=>$_notes, 'absensi_tstatus'=>$_tstatus);
		$this->db->where('id_absensi_record', $absensiid);
		$this->db->update('absensi_record', $sources);
	}
	
	public function cekfirst($_today) {
		$this->db->order_by('id_absensi_record', 'asc');
		$this->db->limit(1);
		$q = $this->db->get('absensi_record');
		return $q;
	}
	
	public function getworker($_barcodeid) {
		$this->db->order_by('id_worker_record', 'desc');
		$this->db->limit(1);
		$q = $this->db->get_where('worker_record', array('worker_barcodeid'=>$_barcodeid, 'worker_status'=>'Publish'));
		return $q;
	}
	
	public function insert_absensi($workerid, $_today, $_timenow, $_restout, $_notes, $_createdate, $_tstatus, $_status) {
		$sources = array('worker_id'=>$workerid, 'absensi_date'=>$_today, 'absensi_morningtime'=>$_timenow, 'absensi_restout'=>$_restout, 'absensi_notes'=>$_notes, 'absensi_createdate'=>$_createdate, 'absensi_tstatus'=>$_tstatus, 'absensi_status'=>$_status);
		$this->db->insert('absensi_record', $sources);
	}
	
	public function insert_absensi_second($workerid, $_today, $_timenow, $_restout, $setafterrest, $_notes, $_createdate, $_tstatus, $_status) {
		$sources = array('worker_id'=>$workerid, 'absensi_date'=>$_today, 'absensi_morningtime'=>$_timenow, 'absensi_restout'=>$_restout, 'absensi_setafterrest'=>$setafterrest, 'absensi_notes'=>$_notes, 'absensi_createdate'=>$_createdate, 'absensi_tstatus'=>$_tstatus, 'absensi_status'=>$_status);
		$this->db->insert('absensi_record', $sources);
	}
}