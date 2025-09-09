<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orderinfo extends CI_Controller {
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
		$data['status'] = $this->input->get('status');
		$data['nomember'] = $this->input->get("nomember");
        $where = " and status = '".$data['status']."' ";
		if($data['stx'])
		{
			$where .= " and (".$data['sfl']." like '%".$data['stx']."%') ";
		}
		if(!$data['offset'])
		{
			$data['offset'] = 30;
		}
		
		if($data['nomember'])
		{
			$where .= " and member_idx = 0";
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
	
	public function view($idx)
	{
		$data['table'] = strtolower(__CLASS__);
		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;		
		$data['data'] = $this->Global_m->get_row($data['table'], array("idx" => $idx));	
		$this->db->order_by("idx", "desc");
		$data['service'] = $this->Global_m->get_all("service", array());
		
		
		$member_idx = $data['data']->member_idx;
		if(!$member_idx)
		{
			$member_idx = 0;
		}		
		$data['member_idx'] = $member_idx;
		
		$data['agent'] = $agent = $data['data']->agent;
		$data['ip'] = $ip = $data['data']->ip;
		$data['room'] = $this->Global_m->get_row("chat_room", array("member_idx" => $member_idx, "ip" => $ip, "agent" => $agent));
		
	
		
		
		
		
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
	}	
	public function status()
	{
		$idx = $this->input->post("idx");
		$status = $this->input->post("status");
		$order = $this->Global_m->get_row("orderinfo", array("idx" => $idx));
		
		if($order->service == 'coupon')
		{
			$coupon = $this->Global_m->get_row("coupon", array("idx" => $order->coupon_idx));
			for($i = 0; $i < $order->coupon_cnt; $i++)
			{
				$insert_data = array(
					"member_idx" => $order->member_idx,
					"coupon_idx" => $order->coupon_idx,
					"coupon_name" => $coupon->NAME,
					"service_idx" => $coupon->service_idx,
					"useYn" => 0				
				);
				$this->Global_m->post("mycoupon", $insert_data);
			}
		}
		$result = $this->Global_m->put("orderinfo", array("status" => $status), array("idx" => $idx));
		if($order->member_idx == 0)
		{
			$data['room'] = $this->Global_m->get_row("chat_room", array("agent" => $order->agent, "ip" => $order->ip));
			$data['room_idx'] = $data['room']->idx;
		}
		else
		{
			$this->db->order_by("idx", "desc");
			$data['room'] = $this->Global_m->get_row("chat_room", array("member_idx" => $order->member_idx));
			$data['room_idx'] = $data['room']->idx;
		}
		
		
		$data['result'] = $result;
		print_r(json_encode($data));
	}	
    public function allStatus()
    {
        $idx = $this->input->post("idx");
        $status = $this->input->post("status");
        // $temp = array();
        // for($i = 0; $i < count($idx); $i++) {
        //     $result = $this->Global_m->put('orderinfo', array("status"=>$status[$i], array('idx'=>$idx[$i])));
        //     $temp.push($idx[$i]);
        // }
		
		
		$room_idxs = array();
        for ($i = 0; $i < count($idx); $i++) {
				
				$return['result'] = $this->Global_m->put('orderinfo', ['status' => $status[$i]], ['idx' => $idx[$i]]);
				
				$order = $this->Global_m->get_row("orderinfo", array("idx" => $idx[$i]));
				$return['status'] = $order;
				
				
				
				
				if($order->status == 3)
				{	
					 
						
					if($order->member_idx == 0)
					{
						$return['room'] = $this->Global_m->get_row("chat_room", array("agent" => $order->agent, "ip" => $order->ip));
						$return['room_idx'] = $return['room']->idx;
						array_push($room_idxs, $return['room']->idx);
					}
					else
					{
						$this->db->order_by("idx", "desc");
						$return['room'] = $this->Global_m->get_row("chat_room", array("member_idx" => $order->member_idx));
						$return['room_idx'] = $return['room']->idx;
						array_push($room_idxs, $return['room']->idx);
					}
				}
				if($order->service == 'coupon' && $status[$i] == 3)
				{
					$coupon = $this->Global_m->get_row("coupon", array("idx" => $order->coupon_idx));
					for($i = 0; $i < $order->coupon_cnt; $i++)
					{
						$insert_data = array(
							"member_idx" => $order->member_idx,
							"coupon_idx" => $order->coupon_idx,
							"coupon_name" => $coupon->NAME,
							"service_idx" => $coupon->service_idx,
							"useYn" => 0				
						);
						$this->Global_m->post("mycoupon", $insert_data);
					}
				}
        }
		$return['room_idxs'] = $room_idxs;
        print_r(json_encode($return));

    }
}