<?php

class Articlesmodel extends CI_Model{
	
	//public function __construct()
//{
 //   parent::__construct();
 
    // load Session Library
    //$this->load->library('session');
     
//}
//	public function articles_list()
//	{
//
//		$user_id= $this->session->userdata('user_id'); 
//		//print_r($user_id) ;die;
//		$query=$this->db
//			          ->select('title')
//			            ->from('articles')
//			             ->where('user_id','$user_id')
//			            ->get();
//		print_r($query) ;die;
//		return $query->result();
// }
public function articles_list()
	{
	   $user_id= $this->session->userdata('user_id');
	   $sql = "SELECT
					title
				FROM
					articles
				WHERE
					user_id=$user_id";
	   return $this->db->query($sql)->result();
	
	}

}  