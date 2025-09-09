<form id="<?php echo $table; ?>Form" >
<input type='hidden' name='member_idx' value='<?php echo $member->idx; ?>' />
<div class="h-full flex flex-auto flex-col justify-between">
	<!-- Content start -->
	<main class="h-full">
		<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
			<h3 class="mb-4">쿠폰 수량 관리 수정 <?php echo $member->userId; ?> - <?php echo $member->name; ?></h3>
			<div class="container mx-auto">
				<div class="flex flex-col xl:flex-row gap-4">
					<div class="w-full box-right">
						<div class="card adaptable-card">
							<div class="card-body">

								<div class="card card-border mb-5">
									<div class="card-body">
										<h6 class="truncate mb-4"><span class="mc-txt">쿠폰 정보</span></h6>
										<hr class="mb-5"></hr>
										<?php foreach($coupon as $val){ 
											$sql ="select count(*) as cnt from mycoupon where member_idx = '".$member->idx."' and useYn = 0 and coupon_idx = '".$val->idx."'";
											$query = $this->db->query($sql);
											$nuse = $query->row();
											$sql ="select count(*) as cnt from mycoupon where member_idx = '".$member->idx."' and useYn = 1 and coupon_idx = '".$val->idx."'";
											$query = $this->db->query($sql);
											$use = $query->row();
										?>
										<div class="grid md:grid-cols-3 gap-4 py-2  border-gray-200 dark:border-gray-600 items-center">
											<div class="font-semibold"><?php echo $val->NAME; ?></div>
											<div class="col-span-2">
												<input type="text"  data-idx="<?php echo $val->idx; ?>" class="input input-sm input-short required cnt"  value="<?php echo $nuse->cnt; ?>" required> 사용 쿠폰 : <?php echo $use->cnt; ?>개
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
</form>
