
<div class="h-full flex flex-auto flex-col justify-between">
<!-- Content start -->
<main class="h-full">
	<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
		<div class="flex flex-col gap-4 h-full">
			<div class="lg:flex items-center justify-between mb-4 gap-3">
				<div class="mb-4 lg:mb-0">
					<h3>회원 관리</h3>
				</div>
			</div>
			
			<div class="flex flex-wrap items-center justify-between gap-1">
				<form id='searchForm' action='/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>' method='get' class="form-horizontal" role="form">
				<div class="flex flex-wrap items-center gap-2">
				
					<select name="sfl" id="sfl" class="input input-sm input-short">
						<option value="">선택</option>
						<option value="userId" <?php if($sfl == 'userId'){ echo "selected"; } ?>>아이디</option>
						<option value="name" <?php if($sfl == 'name'){ echo "selected"; } ?>>이름</option>
						<option value="cellphone" <?php if($sfl == 'cellphone'){ echo "selected"; } ?>>휴대폰</option>
					</select>
					<input type="text" name="stx" value="<?php echo $stx; ?>" class="input input-sm input-short">
					<button type="submit" class="btn btn-sm btn-solid w-100">검색</button>
				</div>
				</form>				
			</div>
			<div class="card adaptable-card">
				<div class="card-body">
					<div class="table-box">
						<table id="" class="table-default table-hover">
							<thead>
								<tr>
									<th>번호</th>
									<th>아이디</th>
									<th>이름</th>
									<th>휴대폰</th>
									<th>보유쿠폰수</th>
									<th>가입일시</th>
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
										
										$sql ="select count(*) as cnt from mycoupon where member_idx = '".$val->idx."'";
										$query = $this->db->query($sql);
										$coupon_cnt = $query->row();
									?>									
									<tr>
										<td><?php echo $Number; ?></td>
										<td><span class="font-semibold text-emerald-500"><?php echo $val->userId; ?></span></td>
										<td><?php echo $val->name; ?></td>
										<td><?php echo $val->cellphone; ?></td>
										<td><a href='/admin/membercoupon?idx=<?php echo $val->idx; ?>'><?php echo number_format($coupon_cnt->cnt); ?>개</a></td>
										
										<td><?php echo $val->reg_date; ?></td>
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

