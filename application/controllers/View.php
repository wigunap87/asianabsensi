<?php

class View extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('View_front');
	}
	
	public function index() {
		$this->load->view('frontendview');
	}
	
	public function viewprocess($val) {
		/*$configform = array(
			array('field'=>'barcodeid', 'name'=>'Barcode ID', 'rules'=>'required')
		);
			
		$this->form_validation->set_rules($configform);
		if($this->form_validation->run() != true) {
			$this->session->set_flashdata('errorabsensi', '<font color="red">All field required.</font>');
			echo 'wrong';
		} else {*/
			$_barcodeid = $val;
			$_today = date('Y-m-d');
			$_timenow = date('H:i:s');
			$_restout = '12:00:00';
			
			$getworker = $this->View_front->getworker($_barcodeid);
			if($getworker->num_rows() == 0) {
				$this->session->set_flashdata('errorabsensi', '<font color="red">Maaf, data barcode anda tidak ditemukan.</font>');
				echo 'notfound';
			} else {
				foreach($getworker->result() as $gwork) {
					$workerid = $gwork->id_worker_record;
				}
				
				// Query cek apakah sudah ada hari ini
				$cekabsensitoday = $this->View_front->cekabsensitoday($_barcodeid, $_today);
				if($cekabsensitoday->num_rows() == 0) {
					// Cek apakah yang pertama atau lebih
					$cekfirst = $this->View_front->cekfirst($_today);
					if($cekfirst->num_rows() == 0) {
						// Insert into Absensi
						$_notes = 'Tidak Telat karena absensi pertama';
						$_createdate = date('Y-m-d H:i:s');
						$_tstatus = 'Tepat Waktu';
						$_status = 'Masuk';
						$_datei = date('i');
						
						$setafterrest = strtotime('13:00:00') - strtotime($_datei);
						
						$this->View_front->insert_absensi_second($workerid, $_today, $_timenow, $_restout, $_datei, $_notes, $_createdate, $_tstatus, $_status);
						
					} else {
						foreach($cekfirst->result() as $cfirst) {
							$_timein = $cfirst->absensi_morningtime;
						}
						
						// Pengurangan menit
						$rumusan = strtotime($_timenow) - strtotime($_timein);
						$hasilrumusan = date('i', $rumusan);
						
						// Pengurangan jam masuk istirahat
						$pengurangan = strtotime('13:00:00') - strtotime($hasilrumusan);
						$setafterrest = strtotime($hasilrumusan);
						
						$_notes = 'Telat lebih dari '.$hasilrumusan.' menit';
						$_createdate = date('Y-m-d H:i:s');
						$_tstatus = 'Telat';
						$_status = 'Masuk';
						
						$this->View_front->insert_absensi_second($workerid, $_today, $_timenow, $_restout, $setafterrest, $_notes, $_createdate, $_tstatus, $_status);
					}
					
				} else {
					if(date('H') >= '12') {
						$cekabsensitoday = $this->View_front->cekabsensitoday($_barcodeid, $_today);
						foreach($cekabsensitoday->result() as $cat) {
						$absensiid = $cat->id_absensi_record;
							$settingafterrest = $cat->absensi_setafterrest;
						}
						
						if($_timenow >= $settingafterrest) {
							$_notes = 'Absensi hari ini TERLAMBAT';
							$_tstatus = 'Telat';
						} else {
							$_notes = 'Absensi hari ini TEPAT WAKTU';
							$_tstatus = 'Tepat Waktu';
						}
						// Update absensi jam masuk istirahat
						$this->View_front->updaterest($absensiid, $_timenow, $_notes, $_tstatus);
					}
				}
					
				$this->session->set_flashdata('errorabsensi', '<font color="green">Terima kasih, data absensi anda telah masuk.</font>');
				echo 'success';
			}
		//}
		
	}
}