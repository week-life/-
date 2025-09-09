<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {
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
				$where .= " and (a.ip like '%".$data['stx']."%' or b.userId like '%".$data['stx']."%') ";
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
		$field = "a.*, b.userId";
		$data['table'] = $table = "chat_room as a left outer join member as b on a.member_idx = b.idx";
		$data['total_rows'] = $config['total_rows'] = $this->Global_m->JOIN_GET_LIST($table, $field, $where, $page, $offset, 'a.idx', 'count');
		$data['Number'] = $config['total_rows']-($offset*($page - 1));
		$config['reuse_query_string'] = TRUE;
		$config['per_page'] = $offset;
        $config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['list'] = $this->Global_m->JOIN_GET_LIST($table, $field, $where, $page, $offset, "a.idx", '', "desc");	
		
		
		
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
    }	
	public function view($idx)
	{

		$data['agent'] = $agent = $data['data']->agent;
		$data['ip'] = $ip = $data['data']->ip;
		$data['room'] = $this->Global_m->get_row("chat_room", array("idx" => $idx));
		$data['member_idx'] = $data['room']->member_idx;
		if($data['room']->member_idx != 0)
        {
            $data['member'] = $this->Global_m->GET_ROW('member', array('idx'=>$data['room']->member_idx));
			$data['member_idx'] = $data['member']->idx;
        }
	
		
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);
	}
	public function file_upload()
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
				
				$data = array('upload_data' => $this->upload->data());
				$real_path = $data['upload_data']['file_name'];
				
				
				$return_data['r_q'] = $this->db->last_query();
				$return_data['path'] = base_url()."uploads/files/".$real_path;
				print_r(json_encode($return_data));
			}
		}
	
		
		
	}
}