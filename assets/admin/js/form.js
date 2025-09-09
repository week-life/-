$(function() {	
    $("#loginForm").submit(function(){
		var form = $('#loginForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}
		$.ajax({
			url:"/admin/common/login_proc",
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
				if(data.result == 0)
				{
					cutomNotification('Warning', '알림', '아이디 또는 패스워드를 확인해주세요 :)');					
					return false;
				}	
				else if(data.result == 2)
				{
					cutomNotification('Warning', '알림', '3분후에 로그인 가능합니다 :)');
					return false;
				}
				else if(data.result == 3)
				{
					cutomNotification('Info', '알림', '관리자 승인후 로그인이 가능합니다 :)');
					return false;
				}
				else
				{
					console.log(data);
					if($("#remember").is(":checked"))
					{
						localStorage.setItem("userid", $("#userid").val());
						//localStorage.setItem("password", $("#password").val());
					}
					else
					{
						localStorage.removeItem("userid");
						//localStorage.removeItem("password");
					}
					window.location.replace('/admin/dashboard');					
					return false;
				}
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
		return false;
	});
	$("#membercouponForm").submit(function(){
		var idxs = new Array();
		var vals = new Array();
		
		$(".cnt").each(function(index, item){
			vals.push($(this).val());
			idxs.push($(this).data("idx"));
			
		});
		var form = $('#membercouponForm')[0];  	
		var formData = new FormData(form); 
		formData.append('idxs', idxs.join("||"));
		formData.append('vals', vals.join("||"));
		
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/membercoupon/proc",
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
				
				
				location.reload();										
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
		
		console.log(idxs);
		console.log(vals);
		
		
		return false;
		
	});
    $("#statusForm").submit(function(){
		var form = $('#statusForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/orderinfo/allStatus",
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
				
				if(data.room_idxs.length == 1)
				{
					
					$("#ip").val(data.room.ip);
					$("#agent").val(data.room.agent);
					$("#member_idx").val(data.room.member_idx);
					$("#room_idx").val(data.room.idx);
					
					firebaseAdd('신청주신 작업이 완료되었습니다. 이용해주셔서 감사합니다.', false, Number(data.room_idxs[0]));
					
					setTimeout(function(){  location.reload();}, 1000);
				}
				else
				{
					location.reload();										
				}
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	
	$("#faqForm").submit(function(){
		var form = $('#faqForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/faq/proc",
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
				window.location.replace('/admin/faq/lists');	
				
				/*
				if(data.result == 'over')
				{
					cutomNotification('Info', '알림', '이미 사용 중인 아이디 입니다');
					return false;
				}
				else if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/lists');			
				}
				*/
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	
	$("#serviceForm").submit(function(){
		var form = $('#serviceForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/service/proc",
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
				window.location.replace('/admin/service/lists');					
				/*
				if(data.result == 'over')
				{
					cutomNotification('Info', '알림', '이미 사용 중인 아이디 입니다');
					return false;
				}
				else if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/lists');			
				}
				*/
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	
	$("#accountForm").submit(function(){
		var form = $('#accountForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/account/proc",
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
			
				window.location.replace('/admin/account');									
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	$("#termsForm").submit(function(){
		var form = $('#termsForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/terms/proc",
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
			
				window.location.replace('/admin/terms');									
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	
	$("#noticeForm").submit(function(){
		var form = $('#noticeForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/notice/proc",
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
			
				window.location.replace('/admin/notice');									
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	
	$("#recForm").submit(function(){
		var form = $('#recForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/rec/proc",
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
				window.location.replace('/admin/rec/lists');					
				/*
				if(data.result == 'over')
				{
					cutomNotification('Info', '알림', '이미 사용 중인 아이디 입니다');
					return false;
				}
				else if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/lists');			
				}
				*/
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	
	
	$("#bannerForm").submit(function(){
		var form = $('#bannerForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/banner/proc",
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
				window.location.replace('/admin/banner/lists');					
				/*
				if(data.result == 'over')
				{
					cutomNotification('Info', '알림', '이미 사용 중인 아이디 입니다');
					return false;
				}
				else if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/lists');			
				}
				*/
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});	
	function base64EncodeUnicode(str) {
		return btoa(unescape(encodeURIComponent(str)));
	}
	$("#couponplayerForm").submit(function(){
		
		var form = $('#couponplayerForm')[0];  	
		var formData = new FormData(form);  
		formData.append("name", base64EncodeUnicode($("#name").val()));
		
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/couponplayer/proc",
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
				window.location.replace('/admin/couponplayer/lists');	
				
				/*
				if(data.result == 'over')
				{
					cutomNotification('Info', '알림', '이미 사용 중인 아이디 입니다');
					return false;
				}
				else if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/lists');			
				}
				*/
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});
	$("#couponForm").submit(function(){
		var form = $('#couponForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/coupon/proc",
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
				window.location.replace('/admin/coupon/lists');	
				
				/*
				if(data.result == 'over')
				{
					cutomNotification('Info', '알림', '이미 사용 중인 아이디 입니다');
					return false;
				}
				else if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/lists');			
				}
				*/
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});
	$("#autochatForm").submit(function(){
		var form = $('#autochatForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		$.ajax({
			url:"/admin/autochat/proc",
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
				
				if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/autochat/lists');			
				}
				
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});
	
	
	$("#adminForm").submit(function(){
		var form = $('#adminForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}	
		var password = $("#userPassword").val();
		var userPasswordConfirm = $("#userPasswordConfirm").val();
		if(password != userPasswordConfirm)
		{
			cutomNotification('Info', '알림', '패스워드가 일치하지 않습니다.');
			return false;
		}
		
		$.ajax({
			url:"/admin/common/adminModifyProc",
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
				
				if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/common/adminModify');			
				}
				
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});
	$("#memberForm").submit(function(){
		var form = $('#memberForm')[0];  	
		var formData = new FormData(form);  
		var validation = checkValidation();		
		if(!validation)
		{
			return false;
		}			
		$.ajax({
			url:"/admin/member/proc",
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
				
				if(data.result == 'files')
				{
					cutomNotification('Info', '알림', data.error);
					return false;
				}
				else
				{
					window.location.replace('/admin/member/lists');			
				}
				
			},
			complete : function(xhr, textStatus) {
				$.unblockUI();
			},					
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
		return false;
	});
	
	
});