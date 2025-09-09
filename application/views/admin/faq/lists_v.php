
<div class="h-full flex flex-auto flex-col justify-between">
<!-- Content start -->
<main class="h-full">
	<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
		<div class="flex flex-col gap-4 h-full">
			<div class="lg:flex items-center justify-between mb-4 gap-3">
				<div class="mb-4 lg:mb-0">
					<h3>FAQ 관리</h3>
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
				<a href="/<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>/add" class="btn btn-solid btn-sm black-btn items-center flex w-100">FAQ 추가하기</a>
			</div>
			<div class="card adaptable-card">
				<div class="card-body">
					<div class="table-box">
						<table id="" class="table-default table-hover">
							<thead>
								<tr>
									<th>번호</th>
									<th>제목</th>
									<th>내용</th>
									<th>관리</th>
								</tr>
								<tbody>
									<?php if(!$list){ ?>
									<tr>
										<td colspan="4">데이터가 없습니다.</td>
									</tr>
									<?php } else { ?>
									<?php foreach($list as $val){ 
										
									?>									
									<tr>
										<td><?php echo $Number; ?></td>
										<td><span class=" font-semibold text-emerald-500"><?php echo $val->title; ?></span></td>
										<td>
											<span class="chat_auto_content"><?php echo $val->content; ?></span>
										</td>
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