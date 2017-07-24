<?php


class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Dashboard_model');
	}	
		
	public function index() {
		if($this->session->userdata('adminLogin') != TRUE) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'dashboard';
			$sources['name'] = 'Dashboard';
			$sources['title'] = 'Dashboard | Asian Absensi Administrator';
			
			$today = date('Y-m-d');
			$sources['latestworker'] = $this->Dashboard_model->latestworker();
			$sources['todayabsensi'] = $this->Dashboard_model->todayabsensi($today);
			$sources['no'] = 1;
				
			//Setting Dashboard
			/*$sources['countmember'] = $this->Dashboard_model->countall($table='tab_member', $status='', $tagline='Member');
			$sources['countproduct'] = $this->Dashboard_model->countall($table='tab_product', $status='', $tagline='Product');
			$sources['countnewso'] = $this->Dashboard_model->countall($table='tab_order', $status='0', $tagline='New Order');
			$sources['countproso'] = $this->Dashboard_model->countall($table='tab_order', $status='1', $tagline='Process');
			$sources['countorders'] = $this->Dashboard_model->countall($table='tab_order', $status='', $tagline='Order');*/
			$this->load->view('home', $sources);
		}
	}
		
	public function getjson_so() {
		if($this->session->userdata('adminLogin') != TRUE) {
			redirect('main', 'refresh');
		} else {
			$rows = array();
			header("Content-type: text/json");
			$getorders = $this->Dashboard_model->getorders();
			foreach($getorders as $gorders) {
				$countorder = $this->Dashboard_model->getstatusorder($gorders->orderstatus);
				$counting = (int)$countorder->num_rows();
				if($gorders->orderstatus == '1') {
					$statusorder = 'Sudah diproses';
				} else {
					$statusorder = 'Order baru';
				}
				$rows[] = array($statusorder, $counting);
			}
			echo json_encode($rows);
		}
	}
}
?>