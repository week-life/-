<form id="<?php echo $table; ?>Form" >
<input type='hidden' name='mode' value='u' />		
<input type='hidden' name='idx' value='<?php echo $data->idx; ?>' />		
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">회원정보 수정</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">
								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">회원 기본 정보</span></h6>
										<hr class="mb-5"></hr>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">아이디</div>
											<div class="col-span-2">
												<?php echo $data->userId; ?>
											</div>
										</div>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">비밀번호 (변경시에만 입력)</div>
											<div class="col-span-2">
												<input type="password" name="password" class="input input-sm input-short" value="">
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">이름</div>
											<div class="col-span-2">
												<input type="text" name="name" class="input input-sm input-short required" value="<?php echo $data->name; ?>">
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
											<div class="font-semibold">휴대폰</div>
											<div class="col-span-2">
												<input type="cellphone" class="input input-sm input-short required" value="<?php echo $data->cellphone; ?>">
											</div>
										</div>
									</div>
								</div>

								<div class="mt-6 mb-10 h-full flex flex-col">
									<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-4">
										
										<?php if($data->login_type == '넥슨') { ?>
										<div class="card card card-layout-frame">
											<div class="card-body h-full">
												<div class="flex flex-col justify-between h-full">
													<div class="flex mb-3">
														<a class="flex items-center gap-1">
															<span class="avatar-circle" data-avatar-size="25" style="width: 32px; height: 32px; min-width: 32px; line-height: 32px;">
																<img class="avatar-img avatar-circle" src="/assets/admin/img/social/nexon_logo.svg" loading="lazy" alt="">
															</span>
															<h6 class="mc-txt">넥슨 정보</h6>
														</a>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 아이디</div>
														<div class="col-span-2">
															<input type="text" name="gameId" class="input input-sm input-short required" value="<?php echo $data->gameId; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name='gamePassword'  class="input input-sm input-short required" value="<?php echo $data->gamePassword; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
														<div class="font-semibold"> 2차 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name="gameSecondPassword"  class="input input-sm input-short required" value="<?php echo $data->gameSecondPassword; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>									
										<?php } else if($data->login_type == '네이버') { ?>
										

										<div class="card card card-layout-frame">
											<div class="card-body h-full">
												<div class="flex flex-col justify-between h-full">
													<div class="flex mb-3">
														<a class="flex items-center gap-1">
															<span class="avatar-circle" data-avatar-size="25" style="width: 32px; height: 32px; min-width: 32px; line-height: 32px;">
																<img class="avatar-img avatar-circle" src="/assets/admin/img/social/naver_logo.svg" loading="lazy" alt="">
															</span>
															<h6 class="mc-txt">네이버 정보</h6>
														</a>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 아이디</div>
														<div class="col-span-2">
															<input type="text" name="gameId" class="input input-sm input-short required" value="<?php echo $data->gameId; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name='gamePassword'  class="input input-sm input-short required" value="<?php echo $data->gamePassword; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
														<div class="font-semibold"> 2차 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name="gameSecondPassword"  class="input input-sm input-short required" value="<?php echo $data->gameSecondPassword; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } else if($data->login_type == '구글') { ?>

										<div class="card card card-layout-frame">
											<div class="card-body h-full">
												<div class="flex flex-col justify-between h-full">
													<div class="flex mb-3">
														<a class="flex items-center gap-1">
															<span class="avatar-circle" data-avatar-size="25" style="width: 32px; height: 32px; min-width: 32px; line-height: 32px;">
																<img class="avatar-img avatar-circle" src="/assets/admin/img/social/google_logo.svg" loading="lazy" alt="">
															</span>
															<h6 class="mc-txt">구글 정보</h6>
														</a>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 아이디</div>
														<div class="col-span-2">
															<input type="text" name="gameId" class="input input-sm input-short required" value="<?php echo $data->gameId; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name='gamePassword'  class="input input-sm input-short required" value="<?php echo $data->gamePassword; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
														<div class="font-semibold"> 2차 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name="gameSecondPassword"  class="input input-sm input-short required" value="<?php echo $data->gameSecondPassword; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } else if($data->login_type == '페이스북') { ?>

										<div class="card card card-layout-frame">
											<div class="card-body h-full">
												<div class="flex flex-col justify-between h-full">
													<div class="flex mb-3">
														<a class="flex items-center gap-1">
															<span class="avatar-circle" data-avatar-size="25" style="width: 32px; height: 32px; min-width: 32px; line-height: 32px;">
																<img class="avatar-img avatar-circle" src="/assets/admin/img/social/facebook_logo.svg" loading="lazy" alt="">
															</span>
															<h6 class="mc-txt">페이스북 정보</h6>
														</a>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 아이디</div>
														<div class="col-span-2">
															<input type="text" name="gameId" class="input input-sm input-short required" value="<?php echo $data->gameId; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name='gamePassword'  class="input input-sm input-short required" value="<?php echo $data->gamePassword; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
														<div class="font-semibold"> 2차 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name="gameSecondPassword"  class="input input-sm input-short required" value="<?php echo $data->gameSecondPassword; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } else if($data->login_type == '애플') { ?>

										<div class="card card card-layout-frame">
											<div class="card-body h-full">
												<div class="flex flex-col justify-between h-full">
													<div class="flex mb-3">
														<a class="flex items-center gap-1">
															<span class="avatar-circle" data-avatar-size="25" style="width: 32px; height: 32px; min-width: 32px; line-height: 32px;">
																<img class="avatar-img avatar-circle" src="/assets/admin/img/social/apple_logo.svg" loading="lazy" alt="">
															</span>
															<h6 class="mc-txt">애플 정보</h6>
														</a>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 아이디</div>
														<div class="col-span-2">
															<input type="text" name="gameId" class="input input-sm input-short required" value="<?php echo $data->gameId; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
														<div class="font-semibold"> 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name='gamePassword'  class="input input-sm input-short required" value="<?php echo $data->gamePassword; ?>">
														</div>
													</div>
													<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
														<div class="font-semibold"> 2차 비밀번호</div>
														<div class="col-span-2">
															<input type="text" name="gameSecondPassword"  class="input input-sm input-short required" value="<?php echo $data->gameSecondPassword; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										
											
											
										<?php } ?>

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
	<!-- Content end -->
</form>