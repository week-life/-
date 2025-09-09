$(function() {
	
	$(".status").change(function(){
		var _this = $(this);
		var val = _this.find('option:selected').val();
		var coupon = _this.data('coupon');
		var idx = _this.data('idx');
		
		if(coupon == 'coupon')
		{
			if(val == 3)
			{
				customAlert2("알림", "쿠폰을 지급 하시겠습니까?", "changeStatus('"+val+"', '"+idx+"')" );	
			}
			else
			{
				customAlert2("알림", "쿠폰을 지급을 취소 하시겠습니까?", "changeStatus('"+val+"', '"+idx+"')" );	
			}			
		}
		else
		{
			
			
			
			customAlert2("알림", "상태를 변경 하시겠습니까?", "changeStatus('"+val+"', '"+idx+"')" );	
		}
	});
});





function changeStatus(status, idx)
{
	var formData = new FormData();   
	formData.append('status', status);
	formData.append('idx', idx);
	$.ajax({
		url:"/admin/orderinfo/status",
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
			
			if(status == 3)
			{
				$.unblockUI();
				
				
				firebaseAdd(commessage, false, Number(data.room_idx));
				
			}
			else
			{
				location.reload();
			}
			//location.reload();		
		},
		complete : function(xhr, textStatus) {
			$.unblockUI();
		}
	});
}
$(document).on("keyup",".numbersOnly",function(e){
	$(this).val(this.value.replace(/[^0-9\.]/g,''));
});
$(document).on("keyup",".englishOnly",function(e){
	 $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''));
});

$(document).on("click",".delBtn",function(e){	
	var _this = $(this);
	var idx = _this.data("idx");
	var table = _this.data("table");
	customAlert("알림", "삭제 하시겠습니까?", "del_data('"+table+"','"+idx+"')");	
});
function del_data(table, idx)
{
	
	var formData = new FormData();   
	formData.append('table', table);
	formData.append('idx', idx);
	$.ajax({
		url:"/admin/common/del_one_proc",
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
		}
	});
}

function blockUI()
{
	$.blockUI({ message: '<img src="/assets/admin/images/loading.gif" style="width:50px;margin:0 auto;"/>' , css: {border:'0px solid #FFFFFF',cursor:'wait', backgroundColor:"transparent"}	}); 
}
function locationGo(url)
{
	location.href = url;
}
function replaceGo(url)
{
	location.replace(url);
}
function checkValidation()
{
	var check = true;
	$(".required").each(function(index, item){	
		var _this = $(this);
		if(_this.hasClass("select"))
		{
			if(!_this.find('option:selected').val())
			{
				_this.addClass("input-invalid");
				check = false;	
			}
			else
			{
				_this.removeClass("input-invalid");
			}
		}
		else
		{
			if(!$.trim(_this.val()))
			{
				_this.addClass("input-invalid");
				check = false;	
			}
			else
			{
				_this.removeClass("input-invalid");
			}
		}
	});
	return check;
}
function customAlert(title, message, e)
{
	const html = `<div class="modal fade" id="alertDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog dialog">
				<div class="dialog-content">
					<span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
					</span>
					<h5 class="mb-4">`+title+`</h5>
					<p>`+message+`</p>
					<div class="text-right mt-6">
						<button data-bs-dismiss="modal" class="btn btn-solid" onclick="`+e+`">Okay</button>
					</div>
				</div>
			</div>
		</div>`;
	$('#customAlert').append(html);
	$("#alertDialog").modal('show');
}

function customAlert2(title, message, e)
{
	const html = `<div class="modal fade" id="alertDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog dialog">
				<div class="dialog-content">
					<span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal" onclick="location.reload()">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
					</span>
					<h5 class="mb-4">`+title+`</h5>
					<p>`+message+`</p>
					<div class="text-right mt-6">
						<button data-bs-dismiss="modal" class="btn btn-solid" onclick="`+e+`">Okay</button>
					</div>
				</div>
			</div>
		</div>`;
	$('#customAlert').append(html);
	$("#alertDialog").modal('show');
}
function cutomNotification(type, title, message ) {
    const notificationTypeHtml = {
		Success: `<div class="toast fade" id="notificationToastSuccess">
			<div class="notification">
				<div class="notification-content">
					<div class="mr-3">
						<span class="text-2xl text-emerald-400">
							<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
						</span>
					</div>
					<div class="mr-4">
						<div class="notification-title">`+title+`</div>
						<div class="notification-description">
							`+message+`
						</div>
					</div>
				</div>
			</div>
		</div>`,
		Info: `<div class="toast fade" id="notificationToastInfo">
			<div class="notification">
				<div class="notification-content">
					<div class="mr-3">
						<span class="text-2xl text-blue-400">
							<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
							</svg>
						</span>
					</div>
					<div class="mr-4">
						<div class="notification-title">`+title+`</div>
						<div class="notification-description">
							`+message+`
						</div>
					</div>
				</div>
			</div>
		</div>`,
		Danger: `<div class="toast fade" id="notificationToastDanger">
			<div class="notification">
				<div class="notification-content">
					<div class="mr-3">
						<span class="text-2xl text-red-400">
							<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
							</svg>
						</span>
					</div>
					<div class="mr-4">
						<div class="notification-title">`+title+`</div>
						<div class="notification-description">
							`+message+`
						</div>
					</div>
				</div>
			</div>
		</div>`,
		Warning: `<div class="toast fade" id="notificationToastWarning">
			<div class="notification">
				<div class="notification-content">
					<div class="mr-3">
						<span class="text-2xl text-yellow-400">
							<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
							</svg>
						</span>
					</div>
					<div class="mr-4">
						<div class="notification-title">`+title+`</div>
						<div class="notification-description">
							`+message+`
						</div>
					</div>
				</div>
			</div>
		</div>`
	}
    $('#notification-toast').append(notificationTypeHtml[type])
    $('#notification-toast .toast:last-child').toast('show');
    setTimeout(function(){ 
        $('#notification-toast .toast:first-child').remove();
    }, 5000);
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
			console.log(docRef);
			
		if(message != commessage)
		{
			$("#message").val('');						
		}
			

		
		
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