<form id="<?php echo $table; ?>Form" >
<input type='hidden' name='mode' value='u' />		
<input type='hidden' name='idx' value='<?php echo $data->idx; ?>' />		
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<div class="container mx-auto">
				<h3 class="mb-4">관리자 정보 수정</h3>
				<form action="#">
					<div class="form-container vertical">
						<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
							<div class="lg:col-span-2">
								<div class="card adaptable-card pb-6 py-4 rounded-br-none rounded-bl-none">
									<div class="card-body">
										<div class="form-item vertical">
											<label class="form-label mb-2">아이디</label>
											<h5><?php echo $data->userid; ?></h5>
										</div> 
										<div class="form-item vertical">
											<label class="form-label mb-2">이름</label>
											<input class="input required" type="text" name='name' autocomplete="off" placeholder="이름" value="<?php echo $data->name; ?>">
										</div> 
										<div class="form-item vertical">
											<label class="form-label mb-2">비밀번호</label>
											<input class="input required" type="password" name='password' id='userPassword' autocomplete="off" placeholder="비밀번호">
										</div> 
										<div class="form-item vertical">
											<label class="form-label mb-2">비밀번호 확인</label>
											<input class="input required" type="password" id="userPasswordConfirm"  autocomplete="off" placeholder="비밀번호 확인" value="">
										</div>										
									</div>
								</div>

							</div>
						</div>
						<div id="stickyFooter" class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4 border-t bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">                                                   
							<div class="md:flex items-center">
								<button class="btn btn-solid w-100" type="submit">저장</button>
							</div>
						</div>
					</div>
				</form>
			</div>    
		</div>
	</main>
	<!-- Content end -->
</form>