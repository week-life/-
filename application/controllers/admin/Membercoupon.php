<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Membercoupon extends CI_Controller {
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
	/*
		$last_idx = $this->Global_m->getLimitCoupon(2629, 2, 3);		
		$temp = $this->Global_m->get_all("mycoupon", array("member_idx" => 2629));
		print_r($temp);
		echo $last_idx;
		exit;
	*/	
		
		
		$data['mainMenu'] = strtolower(__CLASS__);
		$data['subMenu'] = __FUNCTION__;
		$data['idx'] = $this->input->get("idx");
		$data['member'] = $this->Global_m->get_row("member", array("idx" => $data['idx']));
		$this->db->order_by("idx", "desc");
		$data['coupon'] = $this->Global_m->get_all("coupon", array());
		$data['table'] = 'membercoupon';
		$this->load->view('admin/header_v', @$data);  	
		$this->load->view('admin/'.strtolower(__CLASS__).'/'.__FUNCTION__.'_v', @$data);  	
		$this->load->view('admin/footer_v', @$data);  
    }		
	public function proc()
	{			
		$sql_data = $this->input->post();	
		
		
		$idxs = explode("||", $sql_data['idxs']);
		$vals = explode("||", $sql_data['vals']);
		
		
		foreach($idxs as $key => $val)
		{
			$idx = $val;
			$cnt = (int)$vals[$key];
			$bcnt = $this->Global_m->getCouponCnt($sql_data['member_idx'], $idx);
			$coupon = $this->Global_m->get_row("coupon", array("idx" => $idx));
			if($bcnt != $cnt)
			{
				
				//늘어 났을때
				if($bcnt < $cnt)
				{
					$diff = $cnt - $bcnt;
					for($i = 0; $i < $diff; $i++)
					{
						$insert_data = array(
							"member_idx" => $sql_data['member_idx'],
							"coupon_idx" => $idx,
							"coupon_name" => $coupon->NAME,
							"service_idx" => $coupon->service_idx,
							"useYn" => 0				
						);
						$this->Global_m->post("mycoupon", $insert_data);
					}
					
				}
				else
				{
	
					$diff = $cnt;
					
					if($diff < 0)
					{
						$this->Global_m->delete("mycoupon", array("member_idx" => $sql_data['member_idx'], "coupon_idx" => $idx));
					}
					else
					{
						$last_idx = $this->Global_m->getLimitCoupon($sql_data['member_idx'], $idx, $diff);
						
						$this->Global_m->delete("mycoupon", array("member_idx" => $sql_data['member_idx'], "coupon_idx" => $idx, "idx >=" => $last_idx));
					}
					
				}
			}
			
			
		}
		$data['result'] = true;
		
		
		
		print_r(json_encode($data));
		exit;
		
		
		
		
		
		
		
		
		$return_data['result'] = $result;
		$return_data['qr'] = $this->db->last_query();
		print_r(json_encode($return_data));	
	}
}