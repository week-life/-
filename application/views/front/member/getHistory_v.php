<div class="history-cnt">
	<img src="/assets/front/images/icons/bell.png" alt="" class="bell">
	<span><b><?php if(!$this->session->userdata('logged_in')){ echo "비회원"; }else { echo $this->session->userdata('name'); } ?></b> 님 : 총 <b class="rc-txt"><?php echo number_format(count($order)); ?></b>건의 신청내역이 있습니다.</span>
</div>

<ul class="history-list">
	<?php foreach($order as $val){ 
		
	if($val->service != "coupon")
	{
		$service = $this->Global_m->get_row("service", array("idx" => $val->service));
		
	}
	else
	{
		$coupon = $this->Global_m->get_row("coupon", array("idx" => $val->coupon_idx));
	}	
	?>
	<li>
		<p class="date"><?php echo $val->reg_date; ?></p>
		<p><span class="rc-txt">서비스</span> : 
						<?php
						if($val->service != "coupon")
						{
							echo $service->name;
						}
						else
						{
							echo $coupon->NAME."( ".$val->coupon_cnt." 장)";
						}
							
						?>
		</p>
		<p><span class="rc-txt">이용요금</span> : <?php echo number_format($val->price); ?>원 <?php if($val->usec == 1){
							$useCoupon = $this->Global_m->get_row("coupon", array("idx" => $val->useCoupon));
							
							echo "(".$useCoupon->NAME." 사용)"; } ?></p>
							
		<p><span class="rc-txt">진행상태</span> : 
		
		
		<?php
						if($val->service != "coupon")
						{
			
							$this->db->order_by("idx","asc");
							$ing = $this->Global_m->get_all("orderinfo", array("status" => 1));
							$rank = 0;
							foreach($ing as $sub_key => $sub_val)
							{
								if($val->idx == $sub_val->idx)
								{
									$rank = $sub_key+1;
								}
							}
							
							
							
							if($val->status == 0){ echo "입금대기"; }else if($val->status == 1){ echo "입금 완료"." - 대기".$rank."번"; }else if($val->status == 2){ echo "진행중"; }else if($val->status == 3){ echo "진행완료"; }
						}
						else
							
						{	
							if($val->status == 0){ echo "입금대기"; }else if($val->status == 3){ echo "쿠폰 지급완료"; }
							
						}
							
						?></p>
	</li>
	<?php } ?>
	
</ul>