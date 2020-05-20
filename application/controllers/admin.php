<?php
class Admin extends My_Controller{
	
	
	public function dashboard()
	{
		$this->load->model('articlesmodel',);
		
		$articles =$this->articlesmodel->articles_list();
		
		$this->load->view('admin/dashboard',['articles'=>$articles]);
		print_r($this->session->userdata);
	}
	
	//public function _construct(){
		// parent::_construct();
		// if(!$this->session->userdata('user_id'))
		//	 return rediect('login');
	
		
}