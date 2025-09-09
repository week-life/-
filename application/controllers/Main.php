<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{   
		
		
		
		
		
		$member_idx = $this->session->userdata('idx');
		if(!$member_idx)
		{
			$member_idx = 0;
		}	
		$data['member_idx'] = $member_idx;
		
		$data['agent'] = $agent = $_SERVER['HTTP_USER_AGENT'];
		$data['ip'] = $ip = $this->Global_m->get_client_ip();	
		
		//$this->Global_m->delete("chat_room", array());
		
		if($this->session->userdata('logged_in'))
		{
			$data['member'] = $this->Global_m->get_row("member", array("idx" => $this->session->userdata('idx')));
				
			$sql = "select * from orderinfo where  member_idx = '".$this->session->userdata('idx')."' ORDER BY idx DESC";
			$query = $this->db->query($sql);
			$data['order'] = $query->result();
			
			$sql ="select count(*) as cnt from mycoupon where member_idx = '".$this->session->userdata('idx')."' and useYn = 0";
			$query = $this->db->query($sql);
			$data['coupon_cnt'] = $query->row();
			
			$sql = "select coupon_name, coupon_idx, count(coupon_idx) as cnt from mycoupon where member_idx = '".$this->session->userdata('idx')."' and useYn = 0 group by coupon_idx";

			$query = $this->db->query($sql);
			$data['mycoupon'] = $query->result();
			
		}
		else
		{
			$sql = "select * from orderinfo where agent='".$agent."' and ip='".$ip."' and member_idx = '0' ORDER BY idx DESC";
		
			$query = $this->db->query($sql);
			$data['order'] = $query->result();		
			
			/*
			$result = $this->Global_m->get_row("chat_room", array("ip" => $ip, "agent" => $agent));
			if(!$result)
			{
				
				$sql_data = array(
					"member_idx" => 0,
					"ip" => $ip,
					"agent" => $agent
					
				);		
				$this->Global_m->POST("chat_room", $sql_data );
			}
			*/
		}
		
		$this->db->order_by("idx", "desc");
		$data['room'] = $this->Global_m->get_row("chat_room", array("member_idx" => $member_idx, "ip" => $ip, "agent" => $agent));
	
		
		$this->db->order_by("idx", "desc");
		$data['faq'] = $this->Global_m->get_all("faq", array());
		
		
		$this->db->order_by("idx", "asc");
		$data['service'] = $this->Global_m->get_all("service", array());
		
		$this->db->order_by("idx", "asc");
		$data['coupon'] = $this->Global_m->get_all("coupon", array("idx !=" => 1));
		
		$this->db->order_by("idx", "asc");
		$data['autochat'] = $this->Global_m->get_all("autochat", array());
		$this->db->order_by("idx", "asc");
		$data['banner'] = $this->Global_m->get_all("banner", array("position" => 1));		
		
		$data['greetings'] = $this->Global_m->get_all('greetings', array());
		$this->db->order_by("idx", "asc");
		$data['banner2'] = $this->Global_m->get_all("banner", array("position" => 2));		
		
		$data['account'] = $this->Global_m->get_row("account", array());
		$data['terms'] = $this->Global_m->get_row("terms", array());
		
		$this->db->order_by("idx", "asc");
		$data['player'] = $this->Global_m->get_all("couponplayer", array());
		$data['notice'] = $this->Global_m->get_row("notice", array());
		
		$this->db->order_by("idx", "desc");
		$data['rec'] = $this->Global_m->get_all("rec", array());
		//$data['terms']->ins = null;
		
		$this->load->view('front/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  
		
    } 	
	public function index2()
	{   
		

		
		
		
		
		
		
		$member_idx = $this->session->userdata('idx');
		if(!$member_idx)
		{
			$member_idx = 0;
		}	
		$data['member_idx'] = $member_idx;
		
		$data['agent'] = $agent = $_SERVER['HTTP_USER_AGENT'];
		$data['ip'] = $ip = $this->Global_m->get_client_ip();	
		
		//$this->Global_m->delete("chat_room", array());
		
		if($this->session->userdata('logged_in'))
		{
			$data['member'] = $this->Global_m->get_row("member", array("idx" => $this->session->userdata('idx')));
				
			$sql = "select * from orderinfo where  member_idx = '".$this->session->userdata('idx')."' ORDER BY idx DESC";
			$query = $this->db->query($sql);
			$data['order'] = $query->result();
			
			$sql ="select count(*) as cnt from mycoupon where member_idx = '".$this->session->userdata('idx')."' and useYn = 0";
			$query = $this->db->query($sql);
			$data['coupon_cnt'] = $query->row();
			
			$sql = "select coupon_name, coupon_idx, count(coupon_idx) as cnt from mycoupon where member_idx = '".$this->session->userdata('idx')."' and useYn = 0 group by coupon_idx";

			$query = $this->db->query($sql);
			$data['mycoupon'] = $query->result();
			
		}
		else
		{
			$sql = "select * from orderinfo where agent='".$agent."' and ip='".$ip."' and member_idx = '0' ORDER BY idx DESC";
		
			$query = $this->db->query($sql);
			$data['order'] = $query->result();		
			
			/*
			$result = $this->Global_m->get_row("chat_room", array("ip" => $ip, "agent" => $agent));
			if(!$result)
			{
				
				$sql_data = array(
					"member_idx" => 0,
					"ip" => $ip,
					"agent" => $agent
					
				);		
				$this->Global_m->POST("chat_room", $sql_data );
			}
			*/
		}
		
		$this->db->order_by("idx", "desc");
		$data['room'] = $this->Global_m->get_row("chat_room", array("member_idx" => $member_idx, "ip" => $ip, "agent" => $agent));
	
		
		$this->db->order_by("idx", "desc");
		$data['faq'] = $this->Global_m->get_all("faq", array());
		
		
		$this->db->order_by("idx", "asc");
		$data['service'] = $this->Global_m->get_all("service", array());
		
		$this->db->order_by("idx", "asc");
		$data['coupon'] = $this->Global_m->get_all("coupon", array("idx !=" => 1));
		
		$this->db->order_by("idx", "asc");
		$data['autochat'] = $this->Global_m->get_all("autochat", array());
		$this->db->order_by("idx", "asc");
		$data['banner'] = $this->Global_m->get_all("banner", array("position" => 1));		
		
		$data['greetings'] = $this->Global_m->get_all('greetings', array());
		$this->db->order_by("idx", "asc");
		$data['banner2'] = $this->Global_m->get_all("banner", array("position" => 2));		
		
		$data['account'] = $this->Global_m->get_row("account", array());
		$data['terms'] = $this->Global_m->get_row("terms", array());
		
		$this->db->order_by("idx", "asc");
		$data['player'] = $this->Global_m->get_all("couponplayer", array());
		$data['notice'] = $this->Global_m->get_row("notice", array());
		
		$this->db->order_by("idx", "desc");
		$data['rec'] = $this->Global_m->get_all("rec", array());
		$data['terms']->ins = null;
		
		$this->load->view('front/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  
		
    } 	
	public function test()
	{
		date_default_timezone_set('Asia/Seoul'); // 한국 시간 설정

		$day = date('D');           // 요일 약어 (e.g. Wed)
		$month = date('M');         // 월 약어 (e.g. Apr)
		$date = date('d');          // 일 (e.g. 24)
		$year = date('Y');          // 년도 (e.g. 2025)
		$time = date('H:i:s');      // 시간 (e.g. 12:34:56)
		$tz = date('T');            // 시간대 이름 (e.g. KST)
		$offset = date('P');        // GMT 오프셋 (e.g. +09:00)

		// JS 스타일 출력
		echo "$day $month $date $year $time GMT$offset ($tz)";
	}
}
