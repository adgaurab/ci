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
		$this->load->model('articlesmodel');
		
		$this->load->library('pagination');
		$config =[
			'base_url'=>base_url('admin/dashboard'),
			'per_page'=>5,
			'total_rows'=>$this->articlesmodel->num_rows(),
			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'attributes'=> ['class'=>"page-link"],
			'first_link' => false,
			'last_link' => false,
			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'prev_link'=> '&laquo',
			'prev_tag_open' => '<li class="page-item">',
			'prev_tag_close' => '</li>',
			'next_link' => '&raquo',
			'next_tag_open' => '<li class="page-item">',
			'next_tag_close' => '</li>',
			'last_tag_open' =>'<li class="page-item">',
			'last_tag_close' => '</li>',
			'cur_tag_open'=> '<li class="page-item active"><a href="#" class="page-link">',
			'cur_tag_close' => '<span class="sr-only">(current)</span></a></li>',
			'num_tag_open' =>'<li class="page-item">',
			'num_tag_close' => '</li>',
			
		];
		$this->pagination->initialize($config);
		
		
		$articles =$this->articlesmodel->articles_list($config['per_page'], $this->uri->segment(3) );
		$this->load->view('admin/dashboard',['articles'=>$articles]);
		
	}
	
	public function add_article()
	{
		$this->load->helper('form');
		$this->load->view('admin/article_view');
	}
	public function store_article()
	{
		$config=['upload_path'=> './uploads',
		'allowed_types'=>'jpg|gif|png|jpeg',
				];
		$this->load->library('upload', $config);
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload()){			$post=$this->input->post();
			unset($post['submit']);
			$data=$this->upload->data();
            $image_path=base_url("uploads/".$data['raw_name'] . $data['file_ext']);
			//echo "<pre>";
			//print_r($image_path); exit;
																						   $post['image_path']=$image_path;
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
			$upload_error=$this->upload->display_errors();
			$this->load->view('admin/article_view', compact('upload_error'));
			
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