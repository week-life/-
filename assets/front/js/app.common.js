function blockUI()
{
	$.blockUI({ message: '<img src="/assets/admin/images/loading.gif" style="width:50px;margin:0 auto;"/>' , css: {border:'0px solid #FFFFFF',cursor:'wait', backgroundColor:"transparent"}	}); 
}
let checkID = RegExp(/^[a-z0-9]{6,20}$/);
let checkPW = RegExp(/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[~!@#$%^&*()_+])[A-Za-z\d~!@#$%^&*()_+]{8,}$/);
let checkName = RegExp(/^[가-힣]|[A-Z]|[a-z]$/);
let checkPhone = RegExp(/^[0-9]+$/);        
let checkEmail = RegExp(/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/);
let checkRecommendId = RegExp(/^[a-z0-9]{6,20}$/);            
let special_pattern = /[`~!@#$%^&*|\\\'\";:\/?]/gi;
$(document).on("keyup",".numbersOnly",function(e){
	$(this).val(this.value.replace(/[^0-9\.]/g,''));
});
$(document).on("keyup",".englishOnly",function(e){
	 $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''));
});
function checkReg(event) {
	const regExp = /[^0-9a-zA-Z\s!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?~`']/g; 
	const del = event.target;
	if (regExp.test(del.value)) {
	  del.value = del.value.replace(regExp, '');
	}
};
function getCouponInfo(service_idx)
{
	$(".couponarea").hide();
	var formData = new FormData();   
	formData.append('service_idx', service_idx);
	$.ajax({
		url:"/member/getCopuonInfo",
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
		
			if(data.result == 'user')
			{	
				
			}			
			else
			{
				
				if(data.list.length != 0)
				{
					var html ="<option value=''>-할인쿠폰 종류 선택-</option>";
					for(var i=0; i< data.list.length; i++)
					{
						html +="<option value='"+data.list[i].idx+"'>"+data.list[i].NAME+"</option>";
					}
					$("#useCoupon").html(html);
					$(".couponarea").show();
					
				}
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
}
 $(function () {
	 $(".question-box").click(function(){
		 var content = $(this).data("content");
		 var html = '<li class="left">'+
                    '        <div class="name">'+
                     '           <img src="/assets/front/images/icons/client.png" alt="">'+
                      '          <span>상담사</span>'+
                       '     </div>'+
                        '    <div class="chat-content support-bg">'+
                         '       <div class="content">'+
                          '        '+content+
                           '     </div>'+
                            '</div>'+
                       ' </li>';
		 $("#chatArea").append(html);
		 $(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
	 });
	 $("#useCoupon").change(function(){
		 var val = $("#useCoupon option:selected").val();
		 if(val)
		 {
            $("#view_price").val("0원");
			$("#price").val('0');
		 }
		 else
		 {
			var price =  $(".service:checked").data("price");	
            $("#view_price").val(price + "원");
			$("#price").val(price); 
		 }
	 });
	 $(".topc").click(function(){
		var _this = $(this);		
		var val = $("input[name='topc']:checked").val();
		if(val == 1 || val == 3 || val == 2)
		{
			$('input:radio[name=tbuy]').eq(0).attr("required", false);
			
			$("#buyClass").hide();
		}
		else
		{
			$('input:radio[name=tbuy]').eq(0).attr("required", false);
			$("#buyClass").show();
		}
		 

		$(".topc-content").hide();
		_this.parent().next().show();			 
	 });
	$(".usec").click(function(){
		if($(this).val() == 1)
		{
			$("#useCoupon").attr("required", true);
			//$("#useCouponCnt").attr("required", true);
			
		}
		else
		{
			$("#useCoupon").attr("required", false);
			//$("#useCouponCnt").attr("required", false);
		}
	});
		 
	 $("#coupon_cnt").change(function(){
		var price = $("#coupon_idx option:selected").data("price");
		var _this = $(this);
		var cnt = _this.find('option:selected').data("cnt");
		$("#coupon_price").val((price * cnt) + "원");
        
        $("#view_price").val((price * cnt) + "원" );
		$("#price").val((price * cnt) );
		
	 });
	 $("#coupon_idx").change(function(){		 
		 var _this = $(this);
		 var min = _this.find('option:selected').data("min");
		 var max = _this.find('option:selected').data("max");
		 var limit = _this.find('option:selected').data("limit");
		 var price = _this.find('option:selected').data("price");		
		 var cnt = 1;
		 var html = "<option value=''>선택</option>";		 
		 for(var i = min; i <= max; i += limit)
		 {
			 html += "<option value='"+i+"' data-cnt='"+cnt+"'>"+i+"장</option>";
			 cnt++;
		 }
		 $("#coupon_cnt").html(html);
		 $("#coupon_price").val("0원");
	 });
	 $(".service").click(function(){
		 var _this = $(this);
		 var val = _this.val();
		 var dn = _this.data("dn");
		 var cp = _this.data("cp");
		 var price = _this.data("price");
		 var name = _this.data("name");
	
		 $('input:radio[name=usec]').eq(0).prop("checked", true);
		
		 
		 $(".service-content").hide();
		 _this.parent().next().show();
		 if(dn)
		 {
			 $('input:radio[name=topc]').eq(0).attr("required", true);
			 $('input:radio[name=tbuy]').eq(0).attr("required", false);
			 $('input:radio[name=cbuy]').eq(0).attr("required", true);
			 $('input:radio[name=otp]').eq(0).attr("required", true);
			 
			 
			 $(".topclass").show();
		 }
		 else
		 {
			 $('input:radio[name=topc]').eq(0).attr("required", false);
			 $('input:radio[name=tbuy]').eq(0).attr("required", false);
			 $('input:radio[name=cbuy]').eq(0).attr("required", false);
			 $('input:radio[name=otp]').eq(0).attr("required", false);
			 
			 
			 $('input:radio[name=topc]').prop("checked", false);
			 $('input:radio[name=tbuy]').prop("checked", false);
			 $('input:radio[name=cbuy]').prop("checked", false);
			 $('input:radio[name=otp]').prop("checked", false);
			 $(".topc-content").hide();
			 
			 
			 $(".topclass").hide();
		 }
		 if(cp)
		 {
			 //$('input:radio[name=cbuy]').eq(0).prop("checked", true);
			 $('input:radio[name=cbuy]').eq(0).attr("required", false);
			 $('input:radio[name=tbuy]').prop("checked", false);
			  
			 $("#cpArea").hide();
			 
		 }
		 if(val == 9)
		 {
			$(".pname").each(function(index, item){
				$(this).attr("required", true);				
			});
			$(".pjo").each(function(index, item){
				$(this).attr("required", true);				
			});
			$(".puk").each(function(index, item){
				$(this).attr("required", true);				
			});
			$(".pcoupon").each(function(index, item){
				$(this).attr("required", true);				
			});
			
			
			
			$('input:radio[name=cbuy]').eq(0).attr("required", false);			
			$("#cpArea").hide();
			 
			$("#playerForm").show();
		 }
		 else
		 {
			 $(".pname").each(function(index, item){
				$(this).attr("required", false);				
			});
			$(".pjo").each(function(index, item){
				$(this).attr("required", false);				
			});
			$(".puk").each(function(index, item){
				$(this).attr("required", false);				
			});
			$(".pcoupon").each(function(index, item){
				$(this).attr("required", false);				
			});
			$("#playerForm").hide();
		 }
		 
		 if(val != 'coupon')
		 {	
			 getCouponInfo(val);	 
			 $("#price").val(price);
             $("#view_price").val(price + "원" );
		 }
		 else
		 {	
			 if($("#member_idx").val())
			 {
				 $("#price").val("0");
                 $("#view_price").val("0원" );
				 $("#buyCoupon").show();
			 }
		 }
	 });
	 var area = $("#login_type option:selected").data("area");
	
	$(".area").hide();
	if(area != 1)
	{
		$("#area_"+area).show();
	}
	
	
	 $("#login_type").change(function(){
		var _this = $(this);
		var area = _this.find('option:selected').data("area");
		$(".area").hide();
        $(".loginBox").show();
		$('input:text[name=gameId]').eq(0).attr("required", true);
		$('input:text[name=gamePassword]').eq(0).attr("required", true);
		$('input:text[name=gameSecondPassword]').eq(0).attr("required", true);
		//$(".loginBox").show();
		if(area != 1)
		{
			$("#area_"+area).show();
		}
		if(area == 6)
		{
			$(".loginBox").hide();
			$('input:text[name=gameId]').eq(0).attr("required", false);
			$('input:text[name=gamePassword]').eq(0).attr("required", false);
			$('input:text[name=gameSecondPassword]').eq(0).attr("required", false);
		}
	});
	if(localStorage.getItem("userId"))
	{
		$('#loginForm input[name="userId"]').val(localStorage.getItem("userId"));
		$("#loginForm #remember").prop('checked', true);
	}	
	$("#loginForm").submit(function(){
		var form = $('#loginForm')[0];  	
		var formData = new FormData(form);  	
		var userId = ﻿$('#loginForm input[name="userId"]');
		$.ajax({
			url:"/member/login",
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
				if(data.result == false)
				{
					alert("아이디 또는 패스워드를 확인해 주세요");					
					return false;
				}					
				else
				{
					
					if($("#remember").is(":checked"))
					{
						localStorage.setItem("userId", userId.val());
						//localStorage.setItem("password", $("#password").val());
					}
					else
					{
						localStorage.removeItem("userId");
						//localStorage.removeItem("password");
					}
					location.reload();									
					return false;
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
	
	
	$("#requestForm").submit(function(){		
		if(!$("#member_idx").val() && $(".service:checked").val() == 'coupon')
		{
			alert("할인 쿠폰은 회원만 구매 가능합니다");
			return false;
		}
        var gameSecondPassword = $('input[name="gameSecondPassword"]').val();    
        if (gameSecondPassword.length !== 4) {
            alert('2차 비밀번호는 4자리 숫자로 입력해주세요.');
            return false;
        }
		var form = $('#requestForm')[0];  	
		var formData = new FormData(form);  	
		$.ajax({
			url:"/order/proc",
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
			
				if(data.result == false)
				{
					alert("오류가 발생하였습니다 관리자에게 문의 해주세요");					
					return false;
				}		
				else if(data.result == 'coupon')
				{
					alert("사용 가능한 쿠폰이 아닙니다");
					return false;
				}
				else
				{					
					alert("신청이 완료 되었습니다");
					//sendMessage2(orderMessage);
					location.reload();									
					return false;
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
	
	
	
	 $("#modifyForm").submit(function(){
		 

		var userPassword = ﻿$('#modifyForm input[name="userPassword"]');
		var passwordConfirm = ﻿$('#modifyForm .passwordConfirm');
		var gameSecondPassword = $('.secondPwModify').val();  
        if (gameSecondPassword.length !== 4) {
            alert('2차 비밀번호는 4자리 숫자로 입력해주세요.');
            return false;
        }
		if(userPassword.val() != passwordConfirm.val())
		{
			alert("비밀번호가 일치하지 않습니다");
			userPassword.focus();
			return false;
		}
		var form = $('#modifyForm')[0];  	
		var formData = new FormData(form);  		
		$.ajax({
			url:"/member/modify",
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
			
				
				alert("수정이 완료 되었습니다");
				location.reload();
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
	
	 $("#signUpForm").submit(function(){
        var gameSecondPassword = $('.secondPwJoin').val();    
        if (gameSecondPassword.length !== 4) {
            alert('2차 비밀번호는 4자리 숫자로 입력해주세요.');
            return false;
        }

		var userId = ﻿$('#signUpForm input[name="userId"]');
		var userPassword = ﻿$('#signUpForm input[name="userPassword"]');
		var passwordConfirm = ﻿$('#signUpForm .passwordConfirm');
		
		if(!userId.val())
		{
			alert("아이디를 입력해 주세요");
			userId.focus();
			return false;
		}
		else if(!checkID.test(userId.val()))
		{
			alert("영문 혹은 영문과 숫자를 조합하여 최소 6자리이상 20자리로 입력해주세요.");
			userId.focus();
			return false;
		}	
		
		if(userPassword.val() != passwordConfirm.val())
		{
			alert("비밀번호가 일치하지 않습니다");
			userPassword.focus();
			return false;
		}
		var form = $('#signUpForm')[0];  	
		var formData = new FormData(form);  		
		$.ajax({
			url:"/member/signup",
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
			
				if(data.result == "over")
				{
					alert("이미 사용 중인 아이디 입니다");
					userId.focus();
					return false;
				}			
				else
				{
					alert("회원 가입이 완료 되었습니다");
					location.reload();
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
	
	
	 $("#id-chk").click(function(){
		  var _this = $(this);
		  var userId = _this.prev();
		  
		  
		  if(!userId.val())
		  {
			  alert("아이디를 입력해 주세요");
			  userId.focus();
		  }
		  else if(!checkID.test(userId.val()))
		  {
			  alert("영문 혹은 영문과 숫자를 조합하여 최소 6자리이상 20자리로 입력해주세요.");
			  userId.focus();
		  }		  
		  else
		  {
			  /*
			var form = $('#loginForm')[0];  	
			var formData = new FormData(form);  
			*/
			var formData = new FormData();   
			formData.append('userId', userId.val());
			
			$.ajax({
				url:"/member/idCheck",
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
					if(data.result == 'over')
					{
						alert("이미 사용 중인 아이디 입니다");
						userId.focus();
						return false;
					}	
				
					else
					{
						alert("사용 가능한 아이디 입니다");						
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
		  }
	  });
	  
	 $(".pw-btn").click(function(){	
		 var _this = $(this);
		 var formid = _this.closest("form").attr("id");
		 
		 if(_this.hasClass("on"))
		 {
			_this.prev().attr("type", "password");
			if(formid == "signUpForm")
			{
				$(".passwordConfirm").attr("type", "password");
			}
			_this.removeClass("on");
			
		 }
		 else
		 {
			
			_this.prev().attr("type", "text");
			if(formid == "signUpForm")
			{
				$(".passwordConfirm").attr("type", "text");
			}
			_this.addClass("on");
		 }
	 });
	
	



	function checkForm() {            
		//userID         
		$("#userID").blur(function (){                
			if($("#userID").val() == "" ){
				// alert("아이디를 입력해주세요");
				$(".id").text("아이디를 입력해주세요");
				$("#userID").focus();
				return false;
			}else if(!checkID.test($("#userID").val())) {
				$(".id").text("영문 혹은 영문과 숫자를 조합하여 최소 6자리이상 20자리로 입력해주세요.");
				// alert("형식에 맞게 입력해주세요");
				// $("#userID").val("");
				$("#userID").focus();                
				return false;
			}else if(checkID.test($("#userID").val())) {
				$(".id").text("사용가능한 아이디입니다.").css("color", "#3f8ef7");                
				$("#userPW").focus();
				return true;
			}
		});

		// userPW
		$("#userPW").blur(function(){
			if($("#userPW").val() == "" ){                
				$(".password").text("비밀번호를 입력해주세요");
				$("#userPW").focus();
				return false;
			}else if(!checkPW.test($("#userPW").val())) {
				$(".password").text("3개 이상을 조합하여 8자리 이상 입력해 주세요.").css("color", "red");
				// $("#userPW").focus();                
				return false;
			}else if(checkPW.test($("#userPW").val())) {
				$(".password").text("사용가능한 비밀번호 입니다.").css("color", "#3f8ef7");
				return true;                          
			}
		});

		//비밀번호 서로확인
		$("#userPW_confirm").blur(function(){
			if($("#userPW").val() != $("#userPW_confirm").val()){
				// alert("비밀번호와 일치하게 입력해주세요.");
				$(".password_confirm").text("비밀번호와 일치하게 입력해주세요.");           
				return false;
			}else if ($("#userPW").val() == $("#userPW_confirm").val()){
				$(".password_confirm").text("");
				return true;  
			}
		});

		// userName
		$("#userName").blur(function(){
			if($("#userName").val() == "" ){  
				$(".name").text("이름을 입력해주세요.");             
				// $("#userName").focus();
				return false;
			}else if(!checkName.test($("#userName").val())) {
				$(".name").text("한글 또는 영문으로 입력해주세요.");
				$("#userName").focus();                
				return false;
			}else if(checkName.test($("#userName").val())) {
				$(".name").text("사용가능한 이름입니다.").css("color", "#3f8ef7");                          
				return true;
			}
		});

		// userPhone
		$("#userPhone").blur(function(){
			if($("#userPhone").val() == "" ){ 
				$(".phone").text("휴대폰번호를 입력해주세요.");              
				// $("#userPhone").focus();
				return false;
			}else if(!checkPhone.test($("#userPhone").val())) {
				$(".phone").text("숫자만 입력해주세요.");
				$("#userPhone").focus();                
				return false;
			}else if(checkPhone.test($("#userPhone").val())) {
				$(".phone").text("");
				return true;                          
			}
		});

		// userEmail
		$("#userEmail").blur(function(){
			if($("#userEmail").val() == "" ){                
				$(".email").text("이메일을 입력해주세요.");
				$("#userEmail").focus();
				return false;
			}else if(!checkEmail.test($("#userEmail").val())) {
				$(".email").text("이메일 형식에 맞춰 입력해주세요. ex) ***@naver.com");
				// $("#userEmail").focus();                
				return false;
			}else if(checkEmail.test($("#userEmail").val())) {
				$(".email").text("");
				return true;                          
			}
		});
		// userRecommendId
		$("#userRecommendId").blur(function(){
			if(!checkRecommendId.test($("#userRecommendId").val())){
				$(".recommend").text("아이디 형식에 맞게 입력해주세요.");               
				return false;            
			}else if(checkID.test($("#userRecommendId").val())) {
				$(".recommend").text("");
				return true;              
			}
		});        
	}
	checkForm();    
	   
	// button 클릭시        
	$('.btn-point').click(function(){
		if($("#userID").val() == "" || $("#userPW").val() == "" || $("#userName").val() == "" || $("#userPhone").val() == "" || $("#userEmail").val() == "" ){                
			alert("공백을 입력하세요.");               
			return false;
		}else if ($("#userPW").val() != $("#userPW_confirm").val()){
			alert("비밀번호가 서로 일치하지 않습니다.");
			return false;
		}else if(!checkID.test($("#userID").val()) || !checkPW.test($("#userPW").val()) || !checkName.test($("#userName").val()) || !checkPhone.test($("#userPhone").val()) || !checkEmail.test($("#userEmail").val())) {
			alert("형식에 맞춰 작성해주세요.")                               
			return false;
		}else {
			alert("달리의 가족이 되신걸 환영합니다! :)");
			console.log("userID: " + `${$("#userID").val()}`);
			console.log(`userPW: ${$("#userPW").val()}`);
			console.log(`userName: ${$("#userName").val()}`);
			console.log(`userPhone: ${$("#userPhone").val()}`);
			console.log(`userEmail: ${$("#userEmail").val()}`);
			console.log(`userRecommendId: ${$("#userRecommendId").val()}`);
			return true;
		}                      
	});        
});