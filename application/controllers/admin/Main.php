<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		header('X-Content-Type-Options: nosniff');
		if($this->session->userdata('admin_logged_in')) {			
			replace("/".$this->uri->segment(1)."/dashboard");
			exit;
		}		
	}
	public function index()
	{    			
		$this->load->view("admin".'/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
	}
}
