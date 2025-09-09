<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Autochat extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in')) {
			replace("/admin");
			exit;
		}
	}
	public function lists()
	{   		
		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;
		$data['sfl'] = $this->input->get('sfl');	
		$data['stx'] = $this->input->get('stx');
        $where = " ";
		if($data['stx'])
		{
			if($data['sfl'])
			{
				$where .= " and (".$data['sfl']." like '%".$data['stx']."%') ";
			}
			else
			{
				$where .= " and (title like '%".$data['stx']."%' or content like '%".$data['stx']."%') ";
			}
		}
		if(!$data['offset'])
		{
			$data['offset'] = 30;
		}
		$offset = $data['offset'];		
		$this->load->library('pagination');
		$page = $this->uri->segment(4);
        if(!$page) { $page = 1; }
		$config['base_url'] = base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
		$field = "*";
		$data['table'] = $table = strtolower(__CLASS__);
		$data['total_rows'] = $config['total_rows'] = $this->Global_m->JOIN_GET_LIST($table, $field, $where, $page, $offset, 'idx', 'count');
		$data['Number'] = $config['total_rows']-($offset*($page - 1));
		$config['reuse_query_string'] = TRUE;
		$config['per_page'] = $offset;
        $config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['list'] = $this->Global_m->JOIN_GET_LIST($table, $field, $where, $page, $offset, "idx", '', "desc");	
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
    }	
	public function add()
	{
		$data['table'] = strtolower(__CLASS__);
		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;		
		
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
	}
	public function modify($idx)
	{
		$data['table'] = strtolower(__CLASS__);
		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;		
		$data['data'] = $this->Global_m->get_row($data['table'], array("idx" => $idx));			
		
		$data['file'] = $this->Global_m->get_row("attached_files", array("upload_type" => $data['table'], "parent_idx" => $idx));
			
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
	}	
	public function proc()
	{			
		$sql_data = $this->input->post();		
		$mode = $sql_data['mode'];
		unset($sql_data['mode']);					
		if($mode == 'w')
		{	
			$result = $this->Global_m->POST(strtolower(__CLASS__), $sql_data );		
			$insert_id = $this->db->insert_id();
		}
		else
		{
			
			$insert_id = $sql_data['idx'];
			$where_arr = array("idx" => $sql_data['idx']);
			unset($sql_data['idx']);			
			$result = $this->Global_m->PUT(strtolower(__CLASS__), $sql_data, $where_arr );
		}
		if(@$insert_id)
		{		
			if(@$_FILES['attachedFiles']["name"]){		
				$file_name = $_FILES['attachedFiles']["name"];
				$config['upload_path'] = './uploads/files/';
				$config['allowed_types'] = '*';
				$config['file_name'] = 'files_'.date("YmdHis");
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload("attachedFiles"))
				{
					$data['result'] = 'files';
					$data['error'] = $this->upload->display_errors();				
					print_r(json_encode($data));
					exit;
				}	
				else
				{
					$data = array('upload_data' => $this->upload->data());			
					$this->Global_m->delete("attached_files", array("parent_idx" => $insert_id, "upload_type" => strtolower(__CLASS__)));
					$data = array('upload_data' => $this->upload->data());
					$real_path = $data['upload_data']['file_name'];
					$file_arr = array(
						"parent_idx" => $insert_id,
						"upload_type" => strtolower(__CLASS__),
						"file_name" => $file_name,
						"real_path" => $real_path
					);			
					$this->Global_m->POST('attached_files', $file_arr );
					
					$return_data['r_q'] = $this->db->last_query();
				}
			}	
		}
		$return_data['result'] = $result;
		$return_data['qr'] = $this->db->last_query();
		print_r(json_encode($return_data));	
	}
}