<?php
	class Main extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Main_model');
		}
		
		public function index() {
			$this->load->view('login');
		}
		
		public function login() {
			$this->load->view('login');
		}
		
		public function adminlogin() {
			if($this->input->post('submit')) {
				$this->form_validation->set_rules('_email', 'Email', 'required|trim');
				$this->form_validation->set_rules('_passwd', 'Password', 'required|trim');
				
				if($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('loginmessage', '<div class="error"><i>Please check your email and password</i></div>');
					redirect('main', 'refresh');
					
				} else {
					$_email = $this->security->xss_clean($this->input->post('_email', TRUE));
					$_passwd = $this->security->xss_clean($this->input->post('_passwd', TRUE));
					$_epasswd = md5($_passwd);
					
					$checking = $this->Main_model->get_data($_email, $_epasswd);
					if($checking->num_rows() == 1) {
						foreach($checking->result() as $admin) {
							$_lastlogin = $admin->lastlogin;
							$_userid = $admin->userid;
						}
						$data = array('adminLogin'=>TRUE, 'userid'=>$_userid, 'userlastlogin'=>$_lastlogin);
						$this->session->set_userdata($data);
						$this->Main_model->updatelast($_userid);
						redirect('dashboard');
					} else {
						$this->session->set_flashdata('loginmessage', '<div class="error"><i>Username or Password do not match</i></div>');
						redirect('main', 'refresh');
					}
					
					//echo $_email.' - '.$_epasswd;
				}
			} else {
				$this->session->set_flashdata('loginmessage', '<div class="error"><i>Username or Password do not match</i></div>');
				redirect('main', 'refresh');
			}
		}
		
		public function logout() {
			$this->session->sess_destroy();
			redirect('main');
		}
	}
?>