<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {	
	public function proc()
	{
		$sql_data = $this->input->post();		
		$sql_data['agent'] = $_SERVER['HTTP_USER_AGENT'];
		$sql_data['ip'] = $this->Global_m->get_client_ip();		
		$sql_data['status'] = 0;
		$gamePassword = base64_decode($sql_data['gamePassword']);
		//$gamePassword = base64_decode($sql_data['gamePassword']);
		$sql_data['gamePassword'] = $gamePassword;
		if(!$sql_data['rec'])
		{
			$sql_data['rec'] = "해당없음";
		}
		//$sql_data['rec'] = "해당없음";
		$usec = $this->input->post("usec");
		if($usec == 1)
		{
			$useCoupon = $this->input->post("useCoupon");
			$this->db->order_by("idx", "asc");
			$result = $this->Global_m->get_row("mycoupon", array("member_idx" => $this->session->userdata('idx'), "coupon_idx" => $useCoupon, "useYn" => 0));
			
			if($result)
			{
				$this->Global_m->put("mycoupon", array("useYn" => 1), array("idx" => $result->idx));
				$sql_data['status'] = 1;
			}
			else
			{
				$return_data['result'] = 'coupon';
				print_r(json_encode($return_data));	
				exit;
			}			
		}
		
		if($sql_data['service'] == 9)
		{
			$sql_data['pname'] = implode("||", $sql_data['pname']);
			$sql_data['pjo'] = implode("||", $sql_data['pjo']);
			$sql_data['puk'] = implode("||", $sql_data['puk']);
			$pcoupon = array_map('base64_decode', $sql_data['pcoupon']);
			$sql_data['pcoupon'] = implode("||", $pcoupon);
			
		}
		else
		{
			unset($sql_data['pname']);
			unset($sql_data['pjo']);
			unset($sql_data['puk']);
			unset($sql_data['pcoupon']);
	
		}
			
		
		
		$result = $this->Global_m->POST("orderinfo", $sql_data );		
		$insert_id = $this->db->insert_id();	
		$member_idx = $this->session->userdata('idx');
		if(!$member_idx)
		{
			$member_idx = 0;
		}	
		$result = $this->Global_m->get_row("chat_room", array("ip" => $ip, "agent" => $agent));
		if(!$result)
		{
			
			$sql_data = array(
				"member_idx" => $member_idx,
				"ip" => $ip,
				"agent" => $agent
				
			);		
			$this->Global_m->POST("chat_room", $sql_data );
		}
		
		
		
		
		$return_data['result'] = $result;
		$return_data['qr'] = $this->db->last_query();
		print_r(json_encode($return_data));	
	}
	
	
	public function proc2()
	{
		$sql_data = $this->input->post();		
		$sql_data['agent'] = $_SERVER['HTTP_USER_AGENT'];
		$sql_data['ip'] = $this->Global_m->get_client_ip();		
		$sql_data['status'] = 0;
		$gamePassword = base64_decode($sql_data['gamePassword']);
		//$gamePassword = base64_decode($sql_data['gamePassword']);
		$sql_data['gamePassword'] = $gamePassword;
		if(!$sql_data['rec'])
		{
			$sql_data['rec'] = "해당없음";
		}
		//$sql_data['rec'] = "해당없음";
		$usec = $this->input->post("usec");
		if($usec == 1)
		{
			$useCoupon = $this->input->post("useCoupon");
			$this->db->order_by("idx", "asc");
			$result = $this->Global_m->get_row("mycoupon", array("member_idx" => $this->session->userdata('idx'), "coupon_idx" => $useCoupon, "useYn" => 0));
			
			if($result)
			{
				$this->Global_m->put("mycoupon", array("useYn" => 1), array("idx" => $result->idx));
				$sql_data['status'] = 1;
			}
			else
			{
				$return_data['result'] = 'coupon';
				print_r(json_encode($return_data));	
				exit;
			}			
		}
		
		if($sql_data['service'] == 9)
		{
			$sql_data['pname'] = implode("||", $sql_data['pname']);
			$sql_data['pjo'] = implode("||", $sql_data['pjo']);
			$sql_data['puk'] = implode("||", $sql_data['puk']);
			$pcoupon = array_map('base64_decode', $sql_data['pcoupon']);
			$sql_data['pcoupon'] = implode("||", $pcoupon);
			
		}
		else
		{
			unset($sql_data['pname']);
			unset($sql_data['pjo']);
			unset($sql_data['puk']);
			unset($sql_data['pcoupon']);
	
		}
			
		
		
		$result = $this->Global_m->POST("orderinfo", $sql_data );		
		$insert_id = $this->db->insert_id();	
		$member_idx = $this->session->userdata('idx');
		if(!$member_idx)
		{
			$member_idx = 0;
		}	
		$result = $this->Global_m->get_row("chat_room", array("ip" => $ip, "agent" => $agent));
		if(!$result)
		{
			
			$sql_data = array(
				"member_idx" => $member_idx,
				"ip" => $ip,
				"agent" => $agent
				
			);		
			$this->Global_m->POST("chat_room", $sql_data );
		}
		
		
		
		
		$return_data['result'] = $result;
		$return_data['qr'] = $this->db->last_query();
		print_r(json_encode($return_data));	
	}
}
