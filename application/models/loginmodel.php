<?php
class LoginModel extends CI_Model{
	
	public function login_valid($username,$password){
		$q=$this->db->where(['username'=>$username,'password'=>$password])
	                ->get('user');
		if($q->num_rows()){
			return $q->row()->user_id;
		}else{
			return false;
		}
	}
}