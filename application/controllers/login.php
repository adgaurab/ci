<?php
class Login extends My_Controller {
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('viewer/admin_login');
	}
	public function __construct()
{
        parent::__construct();
        $this->load->library('session');
        ...
} 
	
	public function admin_login()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username','user name','required|alpha');
		$this->form_validation->set_rules('password','password','required');
	    
		if($this->form_validation->run() ){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->load->model('loginmodel');
			
			$login_id=($this->loginmodel->login_valid($username, $password));
			$this->load->library('session');
			if($login_id){
				$this->session->set_userdata('user_id',$login_id);
				return redirect('admin/dashboard');
			
			}else{
				echo 'password do not match';
		     }
	       }else{
			$this->load->view('viewer/admin_login');
			 }
			
	
}
}