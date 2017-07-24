<?php


class Absensi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Absensi_model');
	}
	
	public function index() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'absensi';
			$sources['name'] = 'List absensi';
			$sources['title'] = 'List absensi | Asian Absensi Administrator';
			
			$this->load->library('Pagination');
			$page = $this->uri->segment(3);
			$limit = 75;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$sources['getabsensi'] = $this->Absensi_model->get_model($limit, $offset);
			$tot_hal = $this->Absensi_model->get_model_pagination();
			$config['base_url'] = base_url() . 'absensi/index';
			$sources['no'] = $offset + 1;
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$this->pagination->initialize($config);
			$sources['paginator'] = $this->pagination->create_links();
			
			$this->load->view('home', $sources);
		}
	}
	
	public function today() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'todayabsensi';
			$sources['name'] = 'Today absensi';
			$sources['title'] = 'Today absensi | Asian Absensi Administrator';
			
			$today = date('Y-m-d');
			$this->load->library('Pagination');
			$page = $this->uri->segment(3);
			$limit = 75;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$sources['getabsensi'] = $this->Absensi_model->get_modeltoday($today, $limit, $offset);
			$tot_hal = $this->Absensi_model->get_modeltoday_pagination($today);
			$config['base_url'] = base_url() . 'absensi/today';
			$sources['no'] = $offset + 1;
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$this->pagination->initialize($config);
			$sources['paginator'] = $this->pagination->create_links();
			
			$this->load->view('home', $sources);
		}
	}
	
	public function searchabsensi() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'searchabsensi';
			$sources['name'] = 'Search absensi';
			$sources['title'] = 'Search absensi | Asian Absensi Administrator';
			
			$sources['no'] = 1;
			$searchkey = $this->security->xss_clean($this->input->post('searchkey'));
			$sources['getabsensi'] = $this->Absensi_model->searchabsensi($searchkey);
			$this->load->view('home', $sources);
		}
	}
	
	public function addabsensi() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'addabsensi';
			$sources['name'] = 'Add absensi';
			$sources['title'] = 'Add absensi | Asian Absensi Administrator';
			
			$sources['getworker'] = $this->Absensi_model->getworker();
			
			$this->load->view('home', $sources);
		}
	}
	
	public function addabsensi_process() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			if($this->input->post('submit')) {
				$configform = array(
					array('field'=>'worker', 'name'=>'Worker', 'rules'=>'required'),
					array('field'=>'tanggal', 'name'=>'Tanggal', 'rules'=>'required'),
					array('field'=>'morningtime', 'name'=>'Morning Time', 'rules'=>'required'),
					array('field'=>'restout', 'name'=>'Rest Out', 'rules'=>'required'),
					array('field'=>'restin', 'name'=>'Rest In', 'rules'=>'required'),
					array('field'=>'srest', 'name'=>'Set After Rest', 'rules'=>'required'),
					array('field'=>'tstatus', 'name'=>'Telat Status', 'rules'=>'required'),
					array('field'=>'status', 'name'=>'Status', 'rules'=>'required')
				);
				
				$this->form_validation->set_rules($configform);
				if($this->form_validation->run() != true) {
					$this->session->set_flashdata('errorabsensi', '<font color="red">All field required.</font>');
					redirect('absensi/addabsensi', 'refresh');
				} else {
					$_worker = $this->security->xss_clean($this->input->post('worker', true));
					$_tanggal = $this->security->xss_clean($this->input->post('tanggal', true));
					$_morningtime = $this->security->xss_clean($this->input->post('morningtime', true));
					$_restout = $this->security->xss_clean($this->input->post('restout', true));
					$_restin = $this->security->xss_clean($this->input->post('restin', true));
					$_gohome = $this->security->xss_clean($this->input->post('gohome', true));
					$_srest = $this->security->xss_clean($this->input->post('srest', true));
					$_notes = $this->security->xss_clean($this->input->post('notes', true));
					$_tstatus = $this->security->xss_clean($this->input->post('tstatus', true));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status', true));
					
					$this->Absensi_model->insertabsensi($_worker, $_tanggal, $_morningtime, $_restout, $_restin, $_gohome, $_srest, $_notes, $_tstatus, $_createdate, $_status);
					redirect('absensi', 'refresh');
				}
			} else {
				redirect('main', 'refresh');
			}
		}
	}
	
	public function editabsensi($val) {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'editabsensi';
			$sources['name'] = 'Edit absensi';
			$sources['title'] = 'Edit absensi | Asian Absensi Administrator';
			
			$sources['getsingle'] = $this->Absensi_model->getsingle($val);
			$sources['getworker'] = $this->Absensi_model->getworker();
			$this->load->view('home', $sources);
		}
	}
	
	public function editabsensi_process() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			if($this->input->post('submit')) {
				$_getid = $this->security->xss_clean($this->input->post('getid', true));
				$_worker = $this->security->xss_clean($this->input->post('worker', true));
					$_tanggal = $this->security->xss_clean($this->input->post('tanggal', true));
					$_morningtime = $this->security->xss_clean($this->input->post('morningtime', true));
					$_restout = $this->security->xss_clean($this->input->post('restout', true));
					$_restin = $this->security->xss_clean($this->input->post('restin', true));
					$_gohome = $this->security->xss_clean($this->input->post('gohome', true));
					$_srest = $this->security->xss_clean($this->input->post('srest', true));
					$_notes = $this->security->xss_clean($this->input->post('notes', true));
					$_tstatus = $this->security->xss_clean($this->input->post('tstatus', true));
					$_status = $this->security->xss_clean($this->input->post('status', true));
					
				$this->Absensi_model->editabsensi($_getid, $_worker, $_tanggal, $_morningtime, $_restout, $_restin, $_gohome, $_srest, $_notes, $_tstatus, $_status);
				redirect('absensi', 'refresh');
				
			} else {
				redirect('main', 'refresh');
			}
		}
	}
	
	public function updateabsensi($val) {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$this->Absensi_model->updateabsensi($val);
			redirect('absensi', 'refresh');
		}
	}
	
	public function deleteabsensi($val) {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$this->Absensi_model->deleteabsensi($val);
			redirect('absensi', 'refresh');
		}
	}
}