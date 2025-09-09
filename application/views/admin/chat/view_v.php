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
<input type='hidden' name='member_idx' id="member_idx" value='<?php echo $this->session->userdata('idx'); ?>'>

<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">채팅 보기</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">

								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">채팅 (<?php if($room->member_idx == 0){ echo $room->ip; } else { echo $member->userId; }?>)</span></h6>
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
	<button id='audioBtn' style='display:none'>asdf</button>
	
	<script>
var roomid;
const audio = new Audio( '/assets/sound.mp3' );
$(function () {
	$("#audioBtn").click(function(){
		audio.play();
	});	
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
		 firebaseAdd(message, false, room_idx);
		 
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
  var temp = true;
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
					
						if(temp == false)
						{
							
							
							$("#audioBtn").click();
						}
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
		temp = false;
		$("#chatArea").append(newMessage);
		$(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
	});	
	
}



	</script>