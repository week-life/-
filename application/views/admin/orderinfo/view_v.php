
<?php

if($data->service != "coupon")
{
	$service = $this->Global_m->get_row("service", array("idx" => $data->service));
	$serviceName = $service->name; 
}
else
{
	$coupon = $this->Global_m->get_row("coupon", array("idx" => $data->coupon_idx));
	$serviceName = $coupon->NAME."(수량 : ".$data->coupon_cnt.")"; 
}



?>
<input type='hidden'  id="ip" value='<?php echo $ip; ?>'>
<input type='hidden' id="agent" value='<?php echo $agent; ?>'>
<input type='hidden' id="room_idx" value='<?php echo $room->idx; ?>'>	
<input type='hidden' name='member_idx' id="member_idx" value='<?php echo $member_idx; ?>'>

<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">주문관리 보기</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">


								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">주문 정보</span></h6>
										<hr class="mb-5"></hr>
										<form action="#">
											<div class="form-container vertical">
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">아이디</div>
													<div class="col-span-2">
														<?php if($data->member_idx){ echo $data->userId; } else { echo "비회원"; } ?>
													</div>
													<div class="font-semibold">이름</div>
													<div class="col-span-2">
														<?php echo $data->name; ?>
													</div>
												</div>
                                                <div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">입금자명</div>
													<div class="col-span-2">
														<?php echo $data->depositor; ?>
													</div>
													<div class="font-semibold">연락처</div>
													<div class="col-span-2">
														<?php echo $data->cellphone; ?>
													</div>
												</div>
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">OTP</div>
													<div class="col-span-2">
														<?php if($data->otp == 1){ echo "사용"; }else { echo "미사용"; } ?>
													</div>
													<div class="font-semibold">서비스</div>
													<div class="col-span-2">
														<?php echo $serviceName; ?>
													</div>
												</div>
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">아이디 종류</div>
													<div class="col-span-2">
														<?php echo $data->login_type; ?>
													</div>
													<div class="font-semibold">아이디</div>
													<div class="col-span-2">
														<?php echo $data->gameId; ?>
													</div>
												</div>
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">비밀번호</div>
													<div class="col-span-2">
														<?php echo $data->gamePassword; ?>
													</div>
													<div class="font-semibold">2차 비밀번호</div>
													<div class="col-span-2">
														<?php echo $data->gameSecondPassword; ?>
													</div>
												</div>
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">탑클래스</div>
													<div class="col-span-2">													
                                                    <?php if($data->topc == 1){ echo "사용중"; }else if($data->topc == 2){ echo "없음"; }else if($data->topc == 3){ echo "보관함에 있음"; }else if($data->topc == 4){ echo "구매요청"; }
													echo "<br/>";
													if($data->tbuy == 1){ echo "TOP"; } else if($data->tbuy == 2){ echo "TOP+";  }else if($data->tbuy == 3){ echo "TOP+A"; }   ?>
														
													</div>
													<div class="font-semibold">쿠폰</div>
													<div class="col-span-2">
														<?php if($data->cbuy == 1){ echo "사용안함"; } else if($data->cbuy == 2){ echo "쿠폰 모두 사용"; } else if($data->cbuy == 3){ echo "직접입력".$data->cnt_result."장"; } ?>
													</div>
												</div>
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">이용요금</div>
													<div class="col-span-2">
														<span class="capitalize font-semibold text-emerald-500"><?php echo number_format($data->price); ?>원 <?php if($data->usec == 1){
											$useCoupon = $this->Global_m->get_row("coupon", array("idx" => $data->useCoupon));
											
											echo "(".$useCoupon->NAME." 사용)"; } ?></span>
													</div>
													<div class="font-semibold">주문일시</div>
													<div class="col-span-2">
														<?php echo $data->reg_date; ?>
													</div>
												</div>
												<div class="grid md:grid-cols-6 gap-4 py-3 border-b border-gray-200 dark:border-gray-600 items-center contact-box">
													<div class="font-semibold">상태</div>
													<div class="col-span-2">
														<?php
														if($data->service != "coupon")
														{
														?>
														<select class="input input-sm status"   data-idx="<?php echo $data->idx; ?>" data-coupon="<?php echo $data->service; ?>">
															<option value="0" <?php if($data->status == 0){ echo "selected"; } ?>>입금전</option>
															<option value="1" <?php if($data->status == 1){ echo "selected"; } ?>>입금완료</option>
															<option value="2" <?php if($data->status == 2){ echo "selected"; } ?>>진행중</option>
															<option value="3" <?php if($data->status == 3){ echo "selected"; } ?>>진행완료</option>
														</select>
														<?php } else { ?>
															
														<select class="input input-sm status"   data-idx="<?php echo $data->idx; ?>" data-coupon="<?php echo $data->service; ?>">
															<option value="0"  <?php if($data->status == 0){ echo "selected"; } ?>>입금전</option>
															<option value="3" <?php if($data->status == 3){ echo "selected"; } ?>>지급완료</option>
															
														</select>
														<?php } ?>
													</div>
												</div>
												<?php if($data->service == 9){ 
													$pname = explode("||", $data->pname);
													$pjo = explode("||", $data->pjo);
													$puk = explode("||", $data->puk);
													$pcoupon = explode("||", $data->pcoupon);
													
																
												?>
												
												<div class="grid md:grid-cols-6 gap-4 py-3 items-center contact-box ">
													<div class="font-semibold">선별대낙 정보</div>
													<div class="col-span-5 table-box">
														<table class='table-default table-hover'>
															<tr>
																<td>선수 이름</td>
																<td>가격(조/억)</td>
																<td>쿠폰</td>
															</tr>														
															<?php foreach($pname as $key => $val){ ?>
															<tr>
																<td><?php echo $val; ?></td>
																<td><?php echo $pjo[$key]; ?>조 <?php echo $puk[$key]; ?>억</td>
																<td><?php echo $pcoupon[$key]; ?></td>
															</tr>
															<?php } ?>
														</table>
														
													</div>
												</div>
												<?php } ?>
												
												
												
												<div class="grid md:grid-cols-6 gap-4 py-3 items-center contact-box ">
													<div class="font-semibold">신청 추가 내용</div>
													<div class="col-span-5">
														<?php echo nl2br($data->memo); ?>&nbsp;
													</div>
												</div>
											
												
											</div>

											
										</form>
									</div>
								</div>

								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">채팅</span></h6>
										<div class="chat-cont">
											<div class="chat-box border-t border-gray-200 dark:border-gray-600">
												<ul class="chat-log" id="chatArea">
                                                    
												</ul>
											</div>
											<div class="write-box flex justify-between items-center gap-1 border-t border-gray-200 dark:border-gray-600">
												<input type="text" id="message" class="input input-sm" placeholder="내용을 입력해주세요.">
												<label for="sendfile"><img src="/assets/admin/img/chat_icons/chat_file_icon.svg" alt=""></label>
                                                <input type='file' id='sendfile' class="chat-file">
												<button type="button" id="sendBtn" class="btn btn-solid black-btn btn-sm">보내기</button>
											</div>
										</div>
									</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="stickyFooter" class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4 border-t bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">                                                   
				<div class="flex items-center gap-2">
					<button class="btn btn-default" type="button" onclick="history.back();">돌아가기</button>
				
				</div>
			</div>
		</div>
	</main>
	<!-- Content end -->
	
	<script>
var roomid;

$(function () {
	 $("#sendfile").change(function(){
		var formData = new FormData();   
		formData.append('attachedFiles', $(this).prop('files')[0]);		
		$.ajax({
			url:"/admin/chat/file_upload",
			type:'post',
			dataType:"JSON",
			data:formData,						
			cache: false,
			contentType: false,
			processData: false,	
			beforeSend : function(xhr){
				blockUI();
			},
			success: function(data){ 
				
					
				sendMessage("<img src='"+data.path+"'>");
				$("#sendfile").val('');
				return false;
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
	});
	 if(room_idx)
	 {
		 realTime();
		 roomRealTime();
	 }
	 $("#sendBtn").click(function(){
		var message = $.trim($("#message").val());
		if(!message)
		{
			alert("메세지를 입력해 주세요");
			return false;
		}
		sendMessage(message);
	});
	$("#message").on("keyup",function(key){  
		if(key.keyCode==13) {  
			var message = $.trim($("#message").val());
			if(!message)
			{
				alert("메세지를 입력해 주세요");
				return false;
			}
			sendMessage(message);
		} 
	});
 });

 function sendMessage(message)
 {

	 if(!room_idx)
	 {
		var member_idx = $("#member_idx").val();
		var ip = $("#ip").val();
		var agent = $("#agent").val();
		
		var formData = new FormData();   
		formData.append('member_idx', member_idx);
		formData.append('ip', ip);
		formData.append('agent', agent);
		
		$.ajax({
			url:"/chat/room_check",
			type:'post',
			dataType:"JSON",
			data:formData,						
			cache: false,
			contentType: false,
			processData: false,	
			beforeSend : function(xhr){
				blockUI();
			},
			success: function(data){ 
				
				if(data.newFlag == true)
				{
					room_idx = data.room_idx;					
					realTime();
					
				}
				firebaseAdd(message, data.newFlag, data.room_idx)				
				return false;
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
	 }
	 else
	 {
		 firebaseAdd(message, false, room_idx)
	 }
 }
 
 function roomRealTime()
 {
	 db.collection('room').where('room_idx', '==', room_idx).onSnapshot(function(snapshot) {		 
		 snapshot.docChanges().forEach(function(change) {	
			 roomid = change.doc.id;
			 db.collection("room").doc(roomid).update({readFlag: ""});
		 });
	 });
 }
 function realTime(){		
	var member_idx = $("#member_idx").val();
	var ip = $("#ip").val();
	var agent = $("#agent").val();
	
	db.collection('chat').where('room_idx', '==', room_idx).orderBy("time").onSnapshot(function(snapshot) {
		var newMessage = '';			
		snapshot.docChanges().forEach(function(change) {			
			if (change.type === "added") {
				var dayInfo = formatDate(change.doc.data().time.seconds);
				if (change.doc.data().msgType != 'customer') {
					
						newMessage += '<li class="right">'+
									'		<div class="name">'+
									'			<img src="/assets/admin/img/chat_icons/client.png" alt="">'+
									'			<span>상담사</span>'+
									'		</div>'+
									'		<div class="chat-content client-bg">'+
									'			<div class="content mb-15">'+
									'				'+change.doc.data().message+
									'			</div>'+
									'			<div class="date">'+
									'				'+change.doc.data().ymd+' '+change.doc.data().hi+
									'			</div>'+
									'		</div>'+
									'	</li>';
						
						
						
				}else{

						newMessage += '<li class="left">'+
									'		<div class="name">'+
									'			<img src="/assets/admin/img/chat_icons/client.png" alt="">'+
									'			<span>고객님</span>'+
									'		</div>'+
									'		<div class="chat-content support-bg">'+
									'			<div class="content mb-15">'+
									'				'+change.doc.data().message+
									'			</div>'+
									'			<div class="date">'+
									'				'+change.doc.data().ymd+' '+change.doc.data().hi+
									'			</div>'+
									'		</div>'+
									'	</li>';
				}
			
				
			}
			if (change.type === "modified") {
			   
			}
			if (change.type === "removed") {
				
			}			
		});		
		$("#chatArea").append(newMessage);
		$(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
	});	
	
}


	</script>