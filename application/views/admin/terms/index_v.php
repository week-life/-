<form id="<?php echo $table; ?>Form" >
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">사이트 관리</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">
								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">점검시 내용</span></h6>
										<label class="checkbox-label">
											<input class="checkbox" type="checkbox" name="ins" value="1" <?php if($terms->ins){ echo "checked"; } ?>>
											<span>점검</span>
										</label>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='content' class="input input-textarea"><?php echo $terms->content; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">서비스 이용 약관</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_1' class="input input-textarea"><?php echo $terms->terms_1; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								
                                <div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">서비스 이용 약관</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_1' class="input input-textarea"><?php echo $terms->terms_1; ?></textarea>
											</div>
										</div>
									</div>
								</div>

                                <div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">개인정보수집 및 활용</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_2' class="input input-textarea"><?php echo $terms->terms_2; ?></textarea>
											</div>
										</div>
									</div>
								</div>

                                <div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">쿠키사용 및 활용</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_3' class="input input-textarea"><?php echo $terms->terms_3; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">구매 신청시 자동 답변</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_4' class="input input-textarea"><?php echo $terms->terms_4; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">BP 현금보상</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_5' class="input input-textarea"><?php echo $terms->terms_5; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">완료멘트</span></h6>
										<hr class="mb-5"></hr>

										<div class="grid md:grid-cols-1 gap-4 py-2 items-center">
											<div class="flex items-center gap-1">
												<textarea name='terms_6' class="input input-textarea"><?php echo $terms->terms_6; ?></textarea>
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
				<div class="flex items-center gap-2">
					<button class="btn btn-default" type="button" onclick="history.back();">돌아가기</button>
                    <button class="btn btn-solid" type="submit">저장</button>
				
				</div>
			</div>
		</div>
	</main>
	<!-- Content end -->
	
</form>