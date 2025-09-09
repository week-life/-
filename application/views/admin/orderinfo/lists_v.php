<input type='hidden'  id="ip" value=''>
<input type='hidden' id="agent" value=''>
<input type='hidden' id="room_idx" value=''>	
<input type='hidden' name='member_idx' id="member_idx" value=''>

<div class="h-full flex flex-auto flex-col justify-between">
<!-- Content start -->
<main class="h-full">
	<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
		<div class="flex flex-col gap-4 h-full">
			<div class="lg:flex items-center justify-between mb-4 gap-3">
				<div class="mb-4 lg:mb-0">
					<h3>주문 관리</h3>
				</div>
			</div>
			<div class="tab-box flex items-center">
				<a href="/admin/orderinfo/lists?status=0" class="<?php if($status == 0){ echo "on"; } ?>">입금전</a>
				<a href="/admin/orderinfo/lists?status=1" class="<?php if($status == 1){ echo "on"; } ?>">입금완료</a>
				<a href="/admin/orderinfo/lists?status=2" class="<?php if($status == 2){ echo "on"; } ?>">진행중</a>
				<a href="/admin/orderinfo/lists?status=3" class="<?php if($status == 3){ echo "on"; } ?>">진행완료</a>
			</div>
			<form id='searchForm' action='/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>' method='get' class="form-horizontal" role="form">
			<input type='hidden' name='status' value='<?php echo $status; ?>'>
			<div class="flex flex-wrap items-center gap-2">			
				<select name="sfl" id="sfl" class="input input-sm input-short" >
					<option value="gameId" <?php if($sfl == 'gameId'){ echo "selected"; } ?>>게임 로그인 아이디</option>
					<option value="userId" <?php if($sfl == 'userId'){ echo "selected"; } ?>>회원아이디</option>
                    <option value="depositor" <?php if($sfl == 'depositor'){ echo "selected"; } ?>>입금자명</option>
					<option value="rec" <?php if($sfl == 'rec'){ echo "selected"; } ?>>찾아온경로</option>
					
				</select>
				<input type="text" name="stx" value="<?php echo $stx; ?>" class="input input-sm input-short">
				
				<div class="col-span-2">
					<label class="checkbox-label">
						<input class="checkbox" type="checkbox" name="nomember" value="1" <?php if($nomember){ echo "checked"; } ?> >
						<span>비회원</span>
					</label>
				</div>
				
				<button type="submit" class="btn btn-sm btn-solid w-100">검색</button>
			</form>
			<form id="statusForm">
                <button type="submit" class="btn btn-sm btn-solid w-100">새로고침</button>
			</div>
			<div class="card adaptable-card">
				<div class="card-body">
					<div class="table-box">
						<table id="" class="table-default table-hover">
							<thead>
								<tr>
									<th>번호</th>
									<th>아이디</th>
                                    <th>입금자명</th>
									<th>서비스</th>
									<th>OTP</th>
									<th>이용요금</th>
									<th>찾아온경로</th>
									<th>상태</th>
									<th>로그인 아이디</th>
									<th>아이디 종류</th>
									<th>탑클래스</th>
									<th>쿠폰</th>
									<th>비밀번호</th>
									<th>2차 비밀번호</th>
									<th>주문일시</th>
									<th>채팅 메시지</th>
									<th>관리</th>
								</tr>
								<tbody>
									<?php if(!$list){ ?>
									<tr>
										<td colspan="14">데이터가 없습니다.</td>
									</tr>
									<?php } else { ?>
									<?php foreach($list as $val){ 	
										$member_idx = $val->member_idx;
										if(!$member_idx)
										{
											$member_idx = 0;
										}		
										$agent = $val->agent;
										$ip = $val->ip;
										$room = $this->Global_m->get_row("chat_room", array("member_idx" => $member_idx, "ip" => $ip, "agent" => $agent));
										
										
										
										if($val->service != "coupon")
										{
											$service = $this->Global_m->get_row("service", array("idx" => $val->service));
											
										}
										else
										{
											$coupon = $this->Global_m->get_row("coupon", array("idx" => $val->coupon_idx));
										}
										
										
									?>
										
									
									<tr>
										<td><?php echo $Number; ?></td>
										<td><span class="font-semibold text-emerald-500"><?php if($val->member_idx){ echo $val->userId; } else { echo "비회원"; } ?></span></td>
                                        <td><span class="font-semibold text-emerald-500"><?php echo $val->depositor; ?></span></td>
										<?php
										if($val->service != "coupon")
										{
										?>
										
										<td><?php echo $service->name; ?> </td>
										<?php } else { ?>
										<td><?php echo $coupon->NAME; ?>(수량 : <?php echo $val->coupon_cnt; ?>장)</td>
										<?php } ?>
										<td><?php if($val->otp == 1){ echo "사용"; }else { echo "미사용"; } ?></td>
										<td>
											<span class="font-semibold text-emerald-500"><?php echo number_format($val->price); ?>원</span> <?php if($val->usec == 1){
											$useCoupon = $this->Global_m->get_row("coupon", array("idx" => $val->useCoupon));
											
											echo "(".$useCoupon->NAME." 사용)"; } ?>
										</td>
										<td>
											<?php echo $val->rec; ?>
										</td>
										<td>
                                            <input type="hidden" name="idx[]" value="<?php echo $val->idx; ?>"/>
											<?php
											if($val->service != "coupon")
											{
											?>
											<select class="input input-sm  max-content" name="status[]"  data-idx="<?php echo $val->idx; ?>" data-coupon="<?php echo $val->service; ?>">
												<option value="0" <?php if($val->status == 0){ echo "selected"; } ?>>입금전</option>
												<option value="1" <?php if($val->status == 1){ echo "selected"; } ?>>입금완료</option>
												<option value="2" <?php if($val->status == 2){ echo "selected"; } ?>>진행중</option>
												<option value="3" <?php if($val->status == 3){ echo "selected"; } ?>>진행완료</option>
											</select>
											<?php } else { ?>
												
											<select class="input input-sm " name="status[]"  data-idx="<?php echo $val->idx; ?>" data-coupon="<?php echo $val->service; ?>">
												<option value="0"  <?php if($val->status == 0){ echo "selected"; } ?>>입금전</option>
												<option value="3" <?php if($val->status == 3){ echo "selected"; } ?>>지급완료</option>
												
											</select>
											<?php } ?>
										</td>
										<td><?php echo $val->gameId; ?></td>
										<td><?php echo $val->login_type; ?></td>
										<td><?php if($val->topc == 1){ echo "사용중"; } else if($val->topc == 2){ echo "없음"; } else if($val->topc == 3) { echo "보관함에 있음"; } else if($val->topc == 4) { echo "구매요청"; } ?></td>
										<td>
												
										
											<?php if($val->cbuy == 1){ echo "사용안함"; } else if($val->cbuy == 2){ echo "쿠폰 모두 사용"; } else  if($val->cbuy == 3) { echo "직접입력"."(".$val->cnt_result.")"; } ?></td>
										<td><?php echo $val->gamePassword; ?></td>
										<td><?php echo $val->gameSecondPassword; ?></td>
										<td><?php echo $val->reg_date; ?></td>
										<td id="newMessage_<?php echo $room->idx; ?>">
											
											<!--span class="">없음</span-->
										</td>
										<td>
											<a href="/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/view/<?php echo $val->idx; ?>">보기</a>
											/
											<a href="javascript:void(0);" class="delBtn" data-idx="<?php echo $val->idx; ?>" data-table="<?php echo $table; ?>">삭제</a>
										</td>
									</tr>
									<?php $Number--; } ?>
									<?php } ?>	
									
								</tbody>
							</thead>
						</table>
					</div>
				<div class="pagination">
					<ul>
						<?php echo $this->pagination->create_links($status); ?>
					</ul>	
				</div>
				</div>
			</div>
            </form>
			
		</div>  
	</div>
</main>
<!-- Content end -->

<script>
$(function () {
	roomRealTime();
});
function roomRealTime()
 {
	  db.collection('room').onSnapshot(function(snapshot) {		 
		 snapshot.docChanges().forEach(function(change) {	
			 roomid = change.doc.id;
			
			
			 if(!change.doc.data().readFlag)
			 {				 
				 $("#newMessage_"+change.doc.data().room_idx).html('');				 
			 }
			 else
			 {
				
				 $("#newMessage_"+change.doc.data().room_idx).html('<span class="font-semibold text-red-500">새 메시지</span>');			
			  
			
				 
				 
			 }
			

			 //db.collection("room").doc(roomid).update({readFlag: ""});
		 });
	 });
 }
</script>