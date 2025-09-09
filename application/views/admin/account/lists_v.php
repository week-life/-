<?php
    include('header.php');
?>


<div class="h-full flex flex-auto flex-col justify-between">
<!-- Content start -->
<main class="h-full">
	<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
		<div class="flex flex-col gap-4 h-full">
			<div class="lg:flex items-center justify-between mb-4 gap-3">
				<div class="mb-4 lg:mb-0">
					<h3>계좌 관리</h3>
				</div>
			</div>

            <div class="flex flex-wrap items-center justify-end gap-1">
				<a href="/admin/account/add" class="btn btn-solid btn-sm black-btn items-center flex w-100">계좌번호 추가하기</a>
			</div>
			<div class="card adaptable-card">
				<div class="card-body">
					<div class="table-box">
						<table id="" class="table-default table-hover">
							<thead>
								<tr>
                                    <th>은행명</th>
                                    <th>계좌번호</th>
									<th>예금주</th>
									<th width="200">관리</th>
								</tr>
								<tbody>
									<!--tr>
										<td colspan="4">데이터가 없습니다.</td>
									</tr-->

									<tr>
										<td>
											카카오뱅크
										</td>
                                        <td>3333-00-00000000</td>
                                        <td>홍길동</td>
										<td>
											<a href=""><a href="/admin/account/modify">수정</a></a>
											/
											<a href="" onclick="">삭제</a>
										</td>
									</tr>

								</tbody>
							</thead>
						</table>
					</div>

				</div>
			</div>
		</div>  
	</div>
</main>
<!-- Content end -->

<?php
    include('footer.php');
?>
