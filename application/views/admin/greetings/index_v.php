<form id="greetingsForm" >
		
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">인사말 수정</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">

								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">인사말 정보</span></h6>
										<hr class="mb-5"></hr>

											<div class="font-semibold">인사말</div>
											<div class="col-span-2 flex items-center gap-1">
                                                <textarea name="greetings" class="input input-textarea required"><?php echo $data->greetings; ?></textarea>
                                            </div>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="stickyFooter" class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4 border-t bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">                                                   
				<div class="flex items-center gap-1">
					<button class="btn btn-default" type="button" onclick="history.back();">돌아가기</button>
					<button class="btn btn-solid" type="submit">저장</button>
				</div>
			</div>
		</div>
	</main>
	<!-- Content end -->
</form>
<script>
$(function(){
    $("#greetingsForm").submit(function(){
		var form = $('#greetingsForm')[0];  	
		var formData = new FormData(form);  	
		$.ajax({
			url:"/admin/greetings/proc",
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
				if(data.result)
                {
                    alert("저장되었습니다.");
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
});
</script>