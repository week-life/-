<!DOCTYPE html>
<html lang="kr" dir="ltr" class="light">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="shortcut icon" href="/assets/admin/img/favicon.ico">
		<title>대리팡 관리자</title>
		<link rel="stylesheet" type="text/css" href="/assets/admin/css/style.css?ver=<?php echo time()?>">
		<link rel="stylesheet" type="text/css" href="/assets/admin/css/style.css?ver=<?php echo time()?>">
	</head>
	<body>
	<!-- App Start-->
	<div id="root">
		<!-- App Layout-->
		<div class="app-layout-blank flex flex-auto flex-col h-[100vh]">
			<main class="h-full">
				<div class="page-container relative h-full flex flex-auto flex-col">
					<div class="h-full">
						<div class="container mx-auto flex flex-col flex-auto items-center justify-center min-w-0 h-full">
							<div class="card min-w-[320px] md:min-w-[450px] card-shadow" role="presentation">
								<div class="card-body md:p-10">
									<div class="text-center">
										<div class="logo">
											<img class="mx-auto mb-3" src="/assets/admin/img/logo/logo-light-full.png" alt="" style="max-width: 300px;">
										</div>
									</div>
									<div class="text-center">
										<div>
											<form id="loginForm">
												<div class="form-container vertical">
													<div class="form-item vertical">
														<label class="form-label mb-2">아이디</label>
														<div>
															<input class="input required" type="text" name="userid"  id="userid" autocomplete="off" id="userid" placeholder="아이디" value="" >
														</div>
													</div>
													<div class="form-item vertical">
														<label class="form-label mb-2">비밀번호</label>
														<div>
															<input class="input pr-8 required" type="password" name="password" autocomplete="off" placeholder="비밀번호" id="password" value="">
														</div>
													</div>
													<div class="flex justify-between mb-6">
														<label class="checkbox-label mb-0">
															<input class="checkbox" type="checkbox" value="true"  id="remember">
															<span class="ltr:ml-0 rtl:mr-2">아이디 저장</span>
														</label>
													</div>
													<button class="btn btn-solid w-full" type="submit" >로그인</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>                
		</div>
	</div>
	<div id="notification-toast" class="toast-wrapper top-end"></div>
	<div id="customAlert"></div>
	<script src="/assets/admin/js/vendors.min.js"></script>
	<script src="/assets/admin/js/app.min.js"></script>
	<script src="/assets/admin/js/jquery.blockUI.js"></script>
	<script src="/assets/admin/js/common.js?ver=<?php echo date("YmdHis"); ?>"></script>
	<script src="/assets/admin/js/form.js?ver=<?php echo date("YmdHis"); ?>"></script>
	<script>
			$(function() {	
				
				if(localStorage.getItem("userid"))
				{
					$("#userid").val(localStorage.getItem("userid"));
					//$("#password").val(localStorage.getItem("password"));
					$("#remember").prop('checked', true);
				}
			});
        </script>
	</body>
</html>