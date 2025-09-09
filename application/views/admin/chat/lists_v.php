

<div class="h-full flex flex-auto flex-col justify-between">
<!-- Content start -->
<main class="h-full">
	<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
		<div class="flex flex-col gap-4 h-full">
			<div class="lg:flex items-center justify-between mb-4 gap-3">
				<div class="mb-4 lg:mb-0">
					<h3>채팅 관리</h3>
				</div>
			</div>
			<form id='searchForm' action='/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>' method='get' class="form-horizontal" role="form">
			<input type='hidden' name='status' value='<?php echo $status; ?>'>
			<div class="flex flex-wrap items-center gap-2">			
				<select name="sfl" id="sfl" class="input input-sm input-short" >
					<option value="">선택</option>
					<option value="a.ip" <?php if($sfl == 'a.ip'){ echo "selected"; } ?>>IP</option>
					<option value="b.userId" <?php if($sfl == 'b.userId'){ echo "selected"; } ?>>회원아이디</option>
				</select>
				<input type="text" name="stx" value="<?php echo $stx; ?>" class="input input-sm input-short">
				<button type="submit" class="btn btn-sm btn-solid w-100">검색</button>
			</div>
			</form>
			<div class="card adaptable-card">
				<div class="card-body">
					<div class="table-box">
						<table id="" class="table-default table-hover">
							<thead>
								<tr>
									
                                    <th>회원여부</th>
									<th>아이디 (IP)</th>
                                    
									<th>채팅 메시지</th>
									<th>관리</th>
								</tr>
								<tbody id="roomTobody">
									<?php if(!$list){ ?>
									<tr>
										<td colspan="14">데이터가 없습니다.</td>
									</tr>
									<?php } else { ?>
									<?php foreach($list as $val){ 											
										
									?>
										
									
									<tr>
										
                                        <td><?php if($val->member_idx != 0){ echo "회원"; } else { echo "비회원"; } ?></td>
										<td>
											<span class="font-semibold text-emerald-500"><?php if($val->member_idx != 0){ echo $val->userId; } else { echo $val->ip; } ?></span>
										</td>

										<td id="newMessage_<?php echo $val->idx; ?>"></td>
										<td>
											<a href="/admin/chat/view/<?php echo $val->idx; ?>">보기</a>
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
					<audio id="al">
						<source src="/assets/sound.mp3">
					</audio>
				</div>
			</div>
		</div>  
	</div>
	

</main>
<!-- Content end -->
<button id='audioBtn' style='display:none'>asdf</button>
<script>


$(function () {	
	const audio = new Audio( '/assets/sound.mp3' );
	roomRealTime();	
	$("#audioBtn").click(function(){
		
		audio.play();
	});	
});
var first = false;
function roomRealTime()
 {
	  db.collection('room').onSnapshot(function(snapshot) {		 
		 snapshot.docChanges().forEach(function(change) {	
			 roomid = change.doc.id;
			 if(first == false)
			 {
				 if(!change.doc.data().readFlag)
				 {				 
					 $("#newMessage_"+change.doc.data().room_idx).html('');				 
				 }
				 else
				 {
					
					//document.getElementById('al').play();
					 $("#newMessage_"+change.doc.data().room_idx).html('<span class="font-semibold text-red-500">새 메시지</span>');			
					 var temp = $("#newMessage_"+change.doc.data().room_idx).parent().html();				
					 $("#newMessage_"+change.doc.data().room_idx).parent().remove();
					 $("#roomTobody").prepend("<tr>"+temp+"</tr>");
				 }
			 }
			 else
			 {
				 if (change.type === "added") {
					
					 location.reload();
				 }
				 
				if (change.type === "modified") {
					if(!change.doc.data().readFlag)
					 {				 
						 $("#newMessage_"+change.doc.data().room_idx).html('');				 
					 }
					 else
					 {
						
						setTimeout(function(){
						$("#audioBtn").click();
						}, 1000);
						 $("#newMessage_"+change.doc.data().room_idx).html('<span class="font-semibold text-red-500">새 메시지</span>');			
						 var temp = $("#newMessage_"+change.doc.data().room_idx).parent().html();				
						 $("#newMessage_"+change.doc.data().room_idx).parent().remove();
						 $("#roomTobody").prepend("<tr>"+temp+"</tr>");
					 }
				}
				 
			 }
			

			 //db.collection("room").doc(roomid).update({readFlag: ""});
		 });
			
			if(first === false)
			{
				first = true;				
				return false;
			}
	 });
 }
</script>