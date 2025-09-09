<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {	
	public function room_check()
	{			
		$member_idx = $this->input->post("member_idx");
		$ip = $this->input->post("ip");
		$agent = $this->input->post("agent");
		if(!$member_idx)
		{
			$member_idx = 0;
		}
		$result = $this->Global_m->get_row("chat_room", array("member_idx" => $member_idx, "ip" => $ip, "agent" => $agent));
		$day = date('D');           // 요일 약어 (e.g. Wed)
		$month = date('M');         // 월 약어 (e.g. Apr)
		$date = date('d');          // 일 (e.g. 24)
		$year = date('Y');          // 년도 (e.g. 2025)
		$time = date('H:i:s');      // 시간 (e.g. 12:34:56)
		$tz = date('T');            // 시간대 이름 (e.g. KST)
		$offset = date('P');        // GMT 오프셋 (e.g. +09:00)
		
		if($result)
		{
			$return_data['newFlag'] = false;
			$return_data['room_idx'] = $result->idx;
		}
		else
		{
			$sql_data = $this->input->post();		
			$this->Global_m->POST("chat_room", $sql_data );
			$return_data['room_idx'] = $this->db->insert_id();
			$return_data['newFlag'] = true;
			
			
			
			
		}
		$return_data['ymd'] = date("m/d");
		$return_data['his'] = date("H:i");
		
		$return_data['time'] = "$day $month $date $year $time GMT$offset ($tz)";
		print_r(json_encode($return_data));	
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
