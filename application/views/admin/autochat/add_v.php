<form id="<?php echo $table; ?>Form" >
<input type='hidden' name='mode' value='w' />		
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">채팅 응답 등록</h3>
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
												<input class="input required" name='attachedFiles' type="file" autocomplete="off" placeholder="">
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">제목</div>
											<div class="col-span-2 flex items-center gap-1">
												<input type="text" name='title' class="input input-sm required">
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
											<div class="font-semibold">내용</div>
											<div class="col-span-2 flex items-center gap-1">
												<textarea name='content' class="input input-textarea required"></textarea>
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