<?php
class Viewer extends My_Controller{
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->helper('string');
		
        $this->load->model('articlesmodel');
		$this->load->library('pagination');
		$config =[
			'base_url'=>base_url('viewer/index'),
			'per_page'=>5,
			'total_rows'=>$this->articlesmodel->count_all_articles(),
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
		$articles =$this->articlesmodel->all_articles_list($config['per_page'], $this->uri->segment(3) );
		
		$this->load->view('viewer/article_list', ['articles'=>$articles ]);
	}
 public function search(){
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('query','Query','required');
	 if( !$this->form_validation->run()){
		return $this->index(); 
	 }
		 
	 $query=$this->input->post('query');
	 return redirect("viewer/search_results/$query");
	 //$this->load->model('articlesmodel');
	// $articles=$this->articlesmodel->search($query);
	 //$this->load->view('viewer/search_view', compact('articles'));
		 
 }
  public function search_results($query)
  {
	  $this->load->helper('form');
      $this->load->model('articlesmodel');
	  $this->load->library('pagination');
	  $config =[
			'base_url'=>base_url("viewer/search_view/$query"),
			'per_page'=>5,
			'total_rows'=>$this->articlesmodel->count_search_results($query),
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
			
		//$this->pagination->initialize($config);
		$articles =$this->articlesmodel->search($query,$config['per_page'],$this->uri->segment(4) );
		$this->load->view('viewer/search_view',compact('articles'));
  }
	public function article($id){
	$this->load->helper('form');
	$this->load->model('articlesmodel');	
	$article=$this->articlesmodel->find($id);
	$this->load->view('viewer/article_detail',compact('article'));
	}
}