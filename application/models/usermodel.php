<?php
class UserModel extends CI_Model{
	
	public function getusers()
	{
		$this->load->database();
		$q=$this->db->query("select * from players");
		$q->result_array();
		 print_r( $q->result_array());
	}
	
} 

?> -