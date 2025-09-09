var roomid;

$(function () {
	var dateInfo = formatDate();
	
	
	$("#sendfile").change(function(){
		var formData = new FormData();   
		formData.append('attachedFiles', $(this).prop('files')[0]);		
		$.ajax({
			url:"/chat/file_upload",
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
				
				console.log(data);		
				sendMessage("<img src='"+data.path+"' onclick='window.open(this.src);'");
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
 
 
 function sendMessage2(message)
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
				firebaseAdd2(message, data.newFlag, data.room_idx)				
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
		 firebaseAdd2(message, false, room_idx)
	 }
 }
 
 function roomRealTime()
 {
	 db.collection('room').where('room_idx', '==', room_idx).onSnapshot(function(snapshot) {		 
		 snapshot.docChanges().forEach(function(change) {	
			 roomid = change.doc.id;
		 });
	 });
 }
 function realTime(){		
	var member_idx = $("#member_idx").val();
	var ip = $("#ip").val();
	var agent = $("#agent").val();
	db.collection('chat').where('room_idx', '==', room_idx).orderBy("time").onSnapshot(function(snapshot) {
		var newMessage = '';	
		var message_type = "";
		var temp = true;
		snapshot.docChanges().forEach(function(change) {			
			if (change.type === "added") {
				message_type = change.doc.data().msgType;
					
				var dayInfo = formatDate(change.doc.data().time.seconds);
				if (change.doc.data().msgType == 'customer') {
					/*
					if(!$('.chat').hasClass("on"))
					{
							$("#audioBtn").click();
							$('.chat').addClass("on");
					}
					*/
					
						
						newMessage += '<li class="right">'+
									'		<div class="name">'+
									'			<img src="assets/front/images/icons/client.png" alt="">'+
									'			<span>고객님</span>'+
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
					
						/*
						if(!$('.chat').hasClass("on"))
						{
							$('.chat').addClass("on");
						}
						$("#audioBtn").click();
						*/
						/*
						if(temp == false)
						{
							if(!$('.chat').hasClass("on"))
							{
								$('.chat').addClass("on");
							}
							$("#audioBtn").click();
						}
						*/
					
						newMessage += '<li class="left">'+
									'		<div class="name">'+
									'			<img src="assets/front/images/icons/support.png" alt="">'+
									'			<span>상담사</span>'+
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
		/*
		if(message_type != 'customer')
		{
			if(!$('.chat').hasClass("on"))
			{
				$('.chat').addClass("on");
			}
		}
		*/
		$("#chatArea").append(newMessage);
		$(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
		temp = true;
	});	
	
}
function firebaseAdd2(message, newFlag, room_idx)
{
	if(newFlag == true)
	{
		
		db.collection("room").add({
			room_idx: room_idx,
			readFlag: ""
		})
		.then(function(docRef) {	
			
		})
		.catch(function(error) {
			console.error("Error adding document: ", error);
		});
		roomRealTime();
		
		
	}
	
	
	var dateInfo = formatDate();
	console.log(dateInfo[0]);
	console.log(dateInfo[1]);
	var member_idx = $("#member_idx").val();
	var ip = $("#ip").val();
	var agent = $("#agent").val();	
	db.collection("chat").add({
		room_idx: room_idx,
		message : message,
		member_idx : member_idx,
		ip : ip,
		agent : agent,
		ymd : dateInfo[0],
		hi : dateInfo[1],
		msgType : "supporter",
		time : new Date()
	})
	.then(function(docRef) {	
		$("#message").val('');		
		
		db.collection("room").doc(roomid).update({readFlag: "1"});
	})
	.catch(function(error) {
		console.error("Error adding document: ", error);
	});
 }

function firebaseAdd(message, newFlag, room_idx)
{
	if(newFlag == true)
	{
		
		db.collection("room").add({
			room_idx: room_idx,
			readFlag: ""
		})
		.then(function(docRef) {	
			
		})
		.catch(function(error) {
			console.error("Error adding document: ", error);
		});
		roomRealTime();
		
		
	}
	
	
	var dateInfo = formatDate();
	console.log(dateInfo[0]);
	console.log(dateInfo[1]);
	var member_idx = $("#member_idx").val();
	var ip = $("#ip").val();
	var agent = $("#agent").val();	
	db.collection("chat").add({
		room_idx: room_idx,
		message : message,
		member_idx : member_idx,
		ip : ip,
		agent : agent,
		ymd : dateInfo[0],
		hi : dateInfo[1],
		msgType : "customer",
		time : new Date()
	})
	.then(function(docRef) {	
		$("#message").val('');		
		
		db.collection("room").doc(roomid).update({readFlag: "1"});
	})
	.catch(function(error) {
		console.error("Error adding document: ", error);
	});
 }
 function formatDate(date) {
    var d = new Date(),    
    month = '' + (d.getMonth() + 1) , 
    day = '' + d.getDate(), 
    year = d.getYear(),
	hours = d.getHours(),
	minutes = d.getMinutes();
    if (month.length < 2) month = '0' + month; 
    if (day.length < 2) day = '0' + day; 
    var ymd = [month, day].join('/');
	var hi = [hours, minutes].join(':');
    return [ymd, hi];
	
}