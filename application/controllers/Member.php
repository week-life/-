<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function getHistory()
	{
		if($this->session->userdata('logged_in'))
		{
			$data['member'] = $this->Global_m->get_row("member", array("idx" => $this->session->userdata('idx')));
			$sql = "select * from orderinfo where  member_idx = '".$this->session->userdata('idx')."' ORDER BY idx DESC";
			$query = $this->db->query($sql);
			$data['order'] = $query->result();
		}
		else
		{
			$data['agent'] = $agent = $_SERVER['HTTP_USER_AGENT'];
			$data['ip'] = $ip = $this->Global_m->get_client_ip();	
			$sql = "select * from orderinfo where agent='".$agent."' and ip='".$ip."' and member_idx = '0' ORDER BY idx DESC";
			$query = $this->db->query($sql);
			$data['order'] = $query->result();		
			
	
		}
		
		$return['html'] = $this->load->view('front/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data, true);  
		
		print_r(json_encode($return));
	}
	public function idCheck()
	{   
		$userId = $this->input->post("userId");
		$rt = $this->Global_m->get_row("member", array("userId" => $userId));
		if($rt)
		{
			$data['result'] = 'over';
		}
		else
		{
			$data['result'] = 'okay';
		}
		print_r(json_encode($data));
    }
	public function signup()
	{
		$sql_data = $this->input->post();
		$userId = $this->input->post("userId");		
		//$userPassword =$this->input->post('userPassword');
		$userPassword = base64_decode($this->input->post('userPassword'));
		$gamePassword = base64_decode($this->input->post('gamePassword'));
		$sql_data['gamePassword'] = $gamePassword;
		unset($sql_data['userPassword']);		
		unset($sql_data['service_chk']);	
		$check = $this->Global_m->get_row("member", array("userId" => $userId));				
		if($check)
		{
			$result = 'over';
		}
		else
		{
			$this->db->set('userPassword', "password('" . $userPassword . "')", FALSE);
			$result = $this->Global_m->POST('member', $sql_data );	
			
			
		}
		$data['result'] = $result;
		print_r(json_encode($data));
	}
	public function modify()
	{
		$sql_data = $this->input->post();
		$where = array(
			"idx" => $this->session->userdata('idx')	
		);
		$name = $this->input->post("name");
		$sessData = array(			
			'name'  => $name
		);					
		$this->session->set_userdata($sessData);
		
		$gamePassword = base64_decode($this->input->post('gamePassword'));
		$sql_data['gamePassword'] = $gamePassword;
		//$userPassword =$this->input->post('userPassword');
		$userPassword = base64_decode($this->input->post('userPassword'));
		unset($sql_data['userPassword']);				
		$this->db->set('userPassword', "password('" . $userPassword . "')", FALSE);
		$result = $this->Global_m->PUT('member', $sql_data, $where );	
		$data['result'] = $result;
		print_r(json_encode($data));
	}
	public function login()
	{
		$userId = $this->input->post('userId');       
		$userPassword = base64_decode($this->input->post('userPassword'));
		//$gamePassword = base64_decode($sql_data['gamePassword']);
		
		
		$this->db->where("userPassword = password('".$userPassword."')", NULL, FALSE);
        $result = $this->Global_m->GET_ROW('member', array("userId" => $userId) );
		if($result)
		{	
			$sessData = array(
				'idx' => $result->idx,
				'name'  => $result->name,
				'userId'  => $result->userId,
				'logged_in' => TRUE
			);					
			$this->session->set_userdata($sessData);			
			$data['result'] = true;	
			
		}
		else
		{				
			$data['result'] = false;	
		}
		$data['qr'] = $this->db->last_query();
		
		print_r(json_encode($data));
	}
	public function logout()
	{
		$this->session->unset_userdata('idx');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('logged_in');
		replace("/");
	}
	public function getCopuonInfo()
	{
		$service_idx = $this->input->post("service_idx");
		if($this->session->userdata('logged_in'))
		{			
			$sql = "
			select * from (select coupon_idx, count(coupon_idx) as cnt from mycoupon where member_idx = '".$this->session->userdata('idx')."' and service_idx = '".$service_idx."' and useYn = '0' group by coupon_idx) as a left outer join coupon as b on a.coupon_idx = b.idx			
			";
			$query = $this->db->query($sql);
			$result = $query->result();
			$data['sql'] = $sql;		
			$data['list'] = $result;			
			$data['result'] = true;
			
		}
		else
		{
			$data['list'] = array();
			$data['result'] = 'login';
		}
		print_r(json_encode($data));
	}
}
