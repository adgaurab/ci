<?php

class Articlesmodel extends CI_Model{
	
	//public function __construct()
//{
 //   parent::__construct();
 
    // load Session Library
    //$this->load->library('session');
     
//}
	public function articles_list()
	{
	

		$user_id= $this->session->userdata('user_id'); 
		//print_r($this->session->userdata);
		$query=$this->db
			          ->select('title')
			            ->from('articles')
			            ->where('user_id','$user_id')
			            ->get();
		return $query->result();
 }
}  