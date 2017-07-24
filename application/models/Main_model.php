<?php


class Main_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
		
	public function get_data($_email, $_epasswd) {
		$this->db->limit(1);
		$q = $this->db->get_where('usertable', array('userid'=>$_email, 'userpass'=>$_epasswd));
		return $q;
	}
		
	public function updatelast($_userid) {
		$sources = array('lastlogin'=>time());
		$this->db->where('userid', $_userid);
		$this->db->update('usertable', $sources);
	}
}
?>