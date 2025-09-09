<form id="<?php echo $table; ?>Form" >
<input type='hidden' name='mode' value='u' />		
<input type='hidden' name='idx' value='<?php echo $data->idx; ?>' />		
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">쿠폰 수정</h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">

								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">쿠폰 정보</span></h6>
										<hr class="mb-5"></hr>
										
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">사용 가능한 서비스</div>
											<div class="col-span-2">
												<select name="service_idx" class="input input-sm input-short">
													<option value="">선택</option>
													<?php foreach($service as $val){ ?>
													<option value="<?php echo $val->idx; ?>" <?php if($val->idx == $data->service_idx){ echo "selected"; } ?>><?php echo $val->name; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">쿠폰명</div>
											<div class="col-span-2">
												<input type="text" name="NAME" class="input input-sm input-short required" value="<?php echo $data->NAME; ?>">
											</div>
										</div>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">쿠폰 최소 구매</div>
											<div class="col-span-2 flex items-center gap-1">
												<input type="text" name="min_by_cnt" class="input input-sm input-short required" value="<?php echo $data->min_by_cnt; ?>"><span>장</span>
											</div>
										</div>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">쿠폰 최대 구매</div>
											<div class="col-span-2 flex items-center gap-1">
												<input type="text" name="max_by_cnt" class="input input-sm input-short required" value="<?php echo $data->max_by_cnt; ?>"><span>장</span>
											</div>
										</div>
										<div class="grid md:grid-cols-3 gap-4 py-2 border-b border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold">단위</div>
											<div class="col-span-2 flex items-center gap-1">
												<input type="text" name="limit_unit" class="input input-sm input-short required" value="<?php echo $data->limit_unit; ?>"><span>장 단위</span>
											</div>
										</div>

										<div class="grid md:grid-cols-3 gap-4 py-2 items-center">
											<div class="font-semibold">단위별 가격</div>
											<div class="col-span-2 flex items-center gap-1">
												<input type="text" name="price" class="input input-sm input-short required" value="<?php echo $data->price; ?>"><span>원</span>
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
