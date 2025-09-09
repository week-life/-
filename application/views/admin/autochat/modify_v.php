<form id="<?php echo $table; ?>Form" >
<input type='hidden' name='mode' value='u' />		
<input type='hidden' name='idx' value='<?php echo $data->idx; ?>' />		
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">채팅 응답 수정</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">

								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">응답 정보</span></h6>
										<hr class="mb-5"></hr>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">아이콘</div>
											<div class="col-span-2">
												<input class="input <?php if(!$file){ echo "required"; } ?>" name='attachedFiles' type="file" autocomplete="off" placeholder="">
												
												<div class="file-name">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
														<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
													</svg>
													<a href="/admin/common/download/<?php echo $file->idx; ?>"><?php echo $file->file_name; ?></a>
													<button type='button' class="btn btn-solid btn-xs delBtn" data-idx="<?php echo $file->idx; ?>" data-table="attached_files">삭제</button>
												</div>
												
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">제목</div>
											<div class="col-span-2 flex items-center gap-1">
												<input type="text" name='title' value="<?php echo $data->title; ?>" class="input input-sm required">
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
											<div class="font-semibold">내용</div>
											<div class="col-span-2 flex items-center gap-1">
												<textarea name='content' class="input input-textarea required"><?php echo $data->content; ?></textarea>
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
				<div class="flex items-center gap-1">
					<button class="btn btn-default" type="button" onclick="history.back();">돌아가기</button>
					<button class="btn btn-solid" type="submit">저장</button>
				</div>
			</div>
		</div>
	</main>
	<!-- Content end -->
</form>