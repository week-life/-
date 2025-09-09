<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in')) {
			replace("/admin");
			exit;
		}
	}
	public function index()
	{    		

		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;		
		$date_temp_arr = array();
		$date_arr = array();
		$date_val_arr = array();
		$today = date("Y-m-d");
		for($i = 0; $i < 10; $i++)
		{
			if($i == 0)
			{
				
				array_push($date_arr, "'".$today."'");
			}
			else
			{
				
				array_push($date_arr, "'".date('Y-m-d', strtotime('-'.$i.' day', strtotime($today)))."'");
				
			}
		}
		$date_arr = array_reverse ( $date_arr );
		foreach($date_arr as $val)
		{
			$date_val = $this->Global_m->get_visitor_cnt($val);
			array_push($date_val_arr, $date_val);

		}
		$data['date_arr'] = $date_arr;
		$data['date_val_arr'] = $date_val_arr;
		
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  	  	
	}
}
