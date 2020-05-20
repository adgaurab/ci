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
		$this->load->helper('form',);
		$this->load->model('articlesmodel',);
		
		$articles =$this->articlesmodel->articles_list();
		$this->load->view('admin/dashboard',['articles'=>$articles]);
		
	}
	public function add_article()
	{
		$this->load->helper('form');
		$this->load->view('admin/article_view');
	}
	public function store_article()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			$post=$this->input->post();
			unset($post['submit']);
			
		    $this->load->model('articlesmodel');
		    if($this->articlesmodel->add_article($post)){
				$this->session->set_flashdata('feedback',"Article added Successfully");
				$this->session->set_flashdata('feedback_class',"alert-success");
			}else{
				$this->session->set_flashdata('feedback',"Article failed to submit");
				$this->session->set_flashdata('feedback_class',"alert-danger");
			}
			return redirect('admin/dashboard');
		}else{
			$this->load->view('admin/article_view');
			
		}
	}
	public function edit_article($article_id){
				$this->load->helper('form');
		$this->load->model('articlesmodel');
		$article=$this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}
	public function update_article($article_id){
        $this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			$post=$this->input->post();
			unset($post['submit']);
			
		    $this->load->model('articlesmodel');
		    if($this->articlesmodel->update_article($article_id,$post)){
				$this->session->set_flashdata('feedback',"Article updated Successfully");
				$this->session->set_flashdata('feedback_class',"alert-success");
			}else{
				$this->session->set_flashdata('feedback',"Article failed to update");
				$this->session->set_flashdata('feedback_class',"alert-danger");
			}
			return redirect('admin/dashboard');
		}else{
			$this->load->view('admin/edit_article');
			
		}
}
 public function delete_article(){
	 $article_id=$this->input->post('article_id');
	 $this->load->model('articlesmodel');
		
		if($this->articlesmodel->delete_article($article_id,)){
				$this->session->set_flashdata('feedback',"Article deleted Successfully");
				$this->session->set_flashdata('feedback_class',"alert-success");
			}else{
				$this->session->set_flashdata('feedback',"Article failed to delete");
				$this->session->set_flashdata('feedback_class',"alert-danger");
			}
	        return redirect('admin/dashboard');
 }
	    
}