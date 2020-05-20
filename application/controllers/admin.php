<?php
class Admin extends My_Controller{
	
	function __construct(){
		parent::__construct();
		 if(!$this->session->userdata('user_id')){
			 return redirect('login');
		 }
	}
	public function dashboard()
	{
		$this->load->model('articlesmodel',);
		
		$articles =$this->articlesmodel->articles_list();
		$this->load->view('admin/dashboard',['articles'=>$articles]);
		
	}
	
	
	
		
}