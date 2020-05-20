<?php
class Viewer extends My_Controller{
	
	public function index()
	{
        //$this->load->helper('html');
		$this->load->view('viewer/view_list');
	}
		
}