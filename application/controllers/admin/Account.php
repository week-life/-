<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {
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
		$data['table'] = strtolower(__CLASS__);
		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;		
		$data['data'] = $this->Global_m->get_row("account", array());
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);
	}
	public function proc()
	{			
		$sql_data = $this->input->post();					
		$result = $this->Global_m->PUT(strtolower(__CLASS__), $sql_data, array() );
		$return_data['result'] = $result;
		$return_data['qr'] = $this->db->last_query();
		print_r(json_encode($return_data));	
	}	
}