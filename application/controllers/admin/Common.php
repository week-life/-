<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common extends CI_Controller {
	public function login_proc()
	{
		$userid = $this->input->post('userid');
        $password = $this->input->post('password');	     		
		$this->db->where("password = password('".$password."')", NULL, FALSE);
        $result = $this->Global_m->GET_ROW('admin', array("userid" => $userid) );
		if($result)
		{	
			if($result->status == 0)
			{
				$data['result'] = 3;		
				$data['level'] = $result->level;
				print_r(json_encode($data));
				exit;
			}
			else
			{
				$time = date("Y-m-d H:i:s");
				$time_difference = date("Y-m-d H:i:s", strtotime("-3 minutes", strtotime($time)));		
				if($result->miss_cnt == 5 && $result->diss_date > $time_difference)
				{
					$data['result'] = 2;
					print_r(json_encode($data));
					exit;				
				}
				else
				{			
					$where = array(
						'idx' => $result->idx,
					);
					$update_data = array(
						'miss_cnt' => 0	
					);				
					$update = $this->Global_m->PUT("admin", $update_data, $where);

					$sessData = array(
						'adminIdx' => $result->idx,
						'adminName'  => $result->name,
						'adminUserid'  => $result->userid,
						'adminLevel'  => $result->level,
						'admin_logged_in' => TRUE
					);		
					
					$this->session->set_userdata($sessData);
					
					$data['result'] = 1;		
					$data['level'] = $result->level;
					print_r(json_encode($data));
					exit;
				}	
			}
		}
		else
		{				
			$miss_result = $this->Global_m->GET_ROW('admin', array("userid" => $userid) );
			if($miss_result)
			{
				if($miss_result->miss_cnt < 5)
				{
					$where = array(
						'idx' => $miss_result->idx,
					);
					$this->db->set('miss_cnt', 'miss_cnt+1', false);
					$update_data = array(
						'diss_date' => date("Y-m-d H:i:s")	
					);				
					$update = $this->Global_m->PUT("admin", $update_data, $where);
				}
				else if($miss_result->miss_cnt == 5)
				{
					$where = array(
						'idx' => $miss_result->idx,
					);
					$update_data = array(
						'diss_date' => date("Y-m-d H:i:s")	
					);				
					$update = $this->Global_m->PUT("admin", $update_data, $where);

					$data['result'] = 2;
					print_r(json_encode($data));
					exit;
				}
			}
			
			$data['result'] = 0;
		
			print_r(json_encode($data));
			exit;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('adminIdx');
		$this->session->unset_userdata('adminName');
		$this->session->unset_userdata('adminUserid');
		$this->session->unset_userdata('adminLevel');			
		$this->session->unset_userdata('admin_logged_in');
		replace("/admin");
	}
	public function del_one_proc()
	{
		if(!$this->session->userdata('admin_logged_in')) {
			replace("/admin");
			exit;
		}
		$table = $this->input->post('table');
		$idx = $this->input->post('idx');
		$delete = $this->Global_m->DELETE($table, array('idx' => $idx) );
		print_r(json_encode($delete));
	}
	public function download($idx)
	{
		if(!$this->session->userdata('admin_logged_in')) {
			replace("/admin");
			exit;
		}
		$this->load->helper('download');
		$fileInfo = $this->Global_m->get_row("attached_files", array("idx" => $idx));		
		$directory = 'files';
		$data = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/uploads/".$directory."/".$fileInfo->real_path); 
		$name = $fileInfo->file_name; 
		force_download($name, $data);
	}
	public function adminModify()
	{
		if(!$this->session->userdata('admin_logged_in')) {
			replace("/admin");
			exit;
		}
		$idx = $this->session->userdata('adminIdx');
		
		
		$data['table'] = "admin";	
		$data['data'] = $this->Global_m->get_row($data['table'], array("idx" => $idx));			
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
	}
	public function adminModifyProc()
	{
		if(!$this->session->userdata('admin_logged_in')) {
			replace("/admin");
			exit;
		}
		$sql_data = $this->input->post();		
		$mode = $sql_data['mode'];
		unset($sql_data['mode']);	
		$password =$this->input->post('password');
		unset($sql_data['password']);
		$insert_id = $sql_data['idx'];		
		$where_arr = array("idx" => $sql_data['idx']);
		unset($sql_data['idx']);		
		$this->db->set('password', "password('" . $password . "')", FALSE);		
		$result = $this->Global_m->PUT('admin', $sql_data, $where_arr );				
		$return_data['result'] = $result;
		$return_data['qr'] = $this->db->last_query();
		print_r(json_encode($return_data));	
	}
}
