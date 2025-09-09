
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
			<div class="flex flex-wrap items-center justify-between gap-1">
				<form id='searchForm' action='/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>' method='get' class="form-horizontal" role="form">
				<div class="flex flex-wrap items-center gap-2">				
					<select name="sfl" id="sfl" class="input input-sm input-short">
						<option value="">선택</option>
						<option value="title" <?php if($sfl == 'title'){ echo "selected"; } ?>>제목</option>
						<option value="content" <?php if($sfl == 'content'){ echo "selected"; } ?>>내용</option>
					</select>
					<input type="text" name="stx" value="<?php echo $stx; ?>" class="input input-sm input-short">
					<button type="submit" class="btn btn-sm btn-solid w-100">검색</button>
				</div>
				</form>
				<a href="/<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>/add" class="btn btn-solid btn-sm black-btn items-center flex w-100">채팅 응답 추가하기</a>
			</div>
			<div class="card adaptable-card">
				<div class="card-body">
					<div class="table-box">
						<table id="" class="table-default table-hover">
							<thead>
								<tr>
									<th>번호</th>
									<th>아이콘</th>
									<th>제목</th>
									<th>내용</th>
									<th>관리</th>
								</tr>
								<tbody>
									<?php if(!$list){ ?>
									<tr>
										<td colspan="6">데이터가 없습니다.</td>
									</tr>
									<?php } else { ?>
									<?php foreach($list as $val){ 
										$file = $this->Global_m->get_row("attached_files", array("upload_type" => $table, "parent_idx" => $val->idx));
									?>									
									
									<tr>
										<td><?php echo $Number; ?></td>
										<td>
											<div class="chat-icon-box">
												<img src="/uploads/files/<?php echo $file->real_path; ?>" alt="">

												<!--이미지가 없을 경우-->
												<!--svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
												</svg-->
											</div>
										</td>
										<td><?php echo $val->title; ?></td>
										<td><span class="chat_auto_content"><?php echo $val->content; ?></span></td>
										<td>
											<a href="/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/modify/<?php echo $val->idx; ?>">수정</a>
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

					<ul class="pagination">
						<?php echo $this->pagination->create_links(); ?>
					</ul>	
				</div>
			</div>
		</div>  
	</div>
</main>
<!-- Content end -->