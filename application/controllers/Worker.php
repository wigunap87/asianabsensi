<?php


class Worker extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Worker_model');
	}
	
	public function index() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'worker';
			$sources['name'] = 'List Worker';
			$sources['title'] = 'List Worker | Asian Absensi Administrator';
			
			$this->load->library('Pagination');
			$page = $this->uri->segment(3);
			$limit = 75;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$sources['getworker'] = $this->Worker_model->get_model($limit, $offset);
			$tot_hal = $this->Worker_model->get_model_pagination();
			$config['base_url'] = base_url() . 'worker/index';
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
	
	public function searchworker() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'searchworker';
			$sources['name'] = 'Search Worker';
			$sources['title'] = 'Search Worker | Asian Absensi Administrator';
			
			$sources['no'] = 1;
			$searchkey = $this->security->xss_clean($this->input->post('searchkey'));
			$sources['getworker'] = $this->Worker_model->searchworker($searchkey);
			$this->load->view('home', $sources);
		}
	}
	
	public function addworker() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'addworker';
			$sources['name'] = 'Add Worker';
			$sources['title'] = 'Add Worker | Asian Absensi Administrator';
			
			$this->load->view('home', $sources);
		}
	}
	
	public function addworker_process() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			if($this->input->post('submit')) {
				$configform = array(
					array('field'=>'barcodeid', 'name'=>'Barcode ID', 'rules'=>'required'),
					array('field'=>'fullname', 'name'=>'Fullname', 'rules'=>'required'),
					array('field'=>'address', 'name'=>'Address', 'rules'=>'required'),
					array('field'=>'phone', 'name'=>'Phone', 'rules'=>'required'),
					array('field'=>'email', 'name'=>'Email', 'rules'=>'required|valid_email'),
					array('field'=>'startdate', 'name'=>'Startdate', 'rules'=>'required'),
					array('field'=>'enddate', 'name'=>'Enddate', 'rules'=>'required'),
					array('field'=>'status', 'name'=>'Status', 'rules'=>'required')
				);
				
				$this->form_validation->set_rules($configform);
				if($this->form_validation->run() != true) {
					$this->session->set_flashdata('errorworker', '<font color="red">All field required.</font>');
					redirect('worker/addworker', 'refresh');
				} else {
					$_barcodeid = $this->security->xss_clean($this->input->post('barcodeid', true));
					$_fullname = $this->security->xss_clean($this->input->post('fullname', true));
					$_address = $this->security->xss_clean($this->input->post('address', true));
					$_phone = $this->security->xss_clean($this->input->post('phone', true));
					$_email = $this->security->xss_clean($this->input->post('email', true));
					$_startdate = $this->security->xss_clean($this->input->post('startdate', true));
					$_enddate = $this->security->xss_clean($this->input->post('enddate', true));
					$_position = $this->security->xss_clean($this->input->post('position', true));
					$_salary = $this->security->xss_clean($this->input->post('salary', true));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status', true));
					
					$this->Worker_model->insertworker($_barcodeid, $_fullname, $_address, $_phone, $_email, $_startdate, $_enddate, $_position, $_salary, $_createdate, $_status);
					redirect('worker', 'refresh');
				}
			} else {
				redirect('main', 'refresh');
			}
		}
	}
	
	public function editworker($val) {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$sources['content'] = 'editworker';
			$sources['name'] = 'Edit Worker';
			$sources['title'] = 'Edit Worker | Asian Absensi Administrator';
			
			$sources['getsingle'] = $this->Worker_model->getsingle($val);
			$this->load->view('home', $sources);
		}
	}
	
	public function editworker_process() {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			if($this->input->post('submit')) {
				$_getid = $this->security->xss_clean($this->input->post('getid', true));
				$_barcodeid = $this->security->xss_clean($this->input->post('barcodeid', true));
				$_fullname = $this->security->xss_clean($this->input->post('fullname', true));
				$_address = $this->security->xss_clean($this->input->post('address', true));
				$_phone = $this->security->xss_clean($this->input->post('phone', true));
				$_email = $this->security->xss_clean($this->input->post('email', true));
				$_startdate = $this->security->xss_clean($this->input->post('startdate', true));
				$_enddate = $this->security->xss_clean($this->input->post('enddate', true));
				$_position = $this->security->xss_clean($this->input->post('position', true));
				$_salary = $this->security->xss_clean($this->input->post('salary', true));
				$_status = $this->security->xss_clean($this->input->post('status', true));
					
				$this->Worker_model->editworker($_getid, $_barcodeid, $_fullname, $_address, $_phone, $_email, $_startdate, $_enddate, $_position, $_salary, $_status);
				redirect('worker', 'refresh');
				
			} else {
				redirect('main', 'refresh');
			}
		}
	}
	
	public function updateworker($val) {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$this->Worker_model->updateworker($val);
			redirect('worker', 'refresh');
		}
	}
	
	public function deleteworker($val) {
		if($this->session->userdata('adminLogin') != true) {
			redirect('main', 'refresh');
		} else {
			$this->Worker_model->deleteworker($val);
			redirect('worker', 'refresh');
		}
	}
}