<!DOCTYPE html>
<html lang="kr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naver-site-verification" content="9a77ba5f2fb3d872e5bd487299598f4495b59544" />
		<meta name="google-site-verification" content="1H0xqXksxTLjzWDS52JheBtGlU5yjbkPxfLxCHwqU94" />
        <meta name="description" content="피파대낙 최저가 500원부터! 제일 빠른 피파대낙사이트는 대낙팡! FC온라인대낙 & 피파온라인4 PC방 버닝 이벤트 피파대리업체 대리팡 피파대낙업체 대낙팡 추천">
        <meta name="keywords" content="피파대낙,피파대리,피파대낙업체,피파대낙사이트,피파대낙추천,피파대낙500원,피파대낙700원,피파대낙무료,피파버닝대리,FC온라인대낙,대낙사이트,피파4대낙,대낙,대리,피파로,싸커대낙">
		
        <!--fav-->
        <link rel="shortcut icon" href="/assets/front/images/favicon.ico">
        <!--fav-->
        <link type="text/css" rel="stylesheet" href="/assets/front/css/jquery-ui.css" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/reset.css" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/fonts.css" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/layout.css?ver=<?php echo time()?>" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/responsive.css?ver=<?php echo time()?>" />
		
		<?php		
			$terms = $this->Global_m->get_row("terms", array());
			
		?>
	
        <script type="text/javascript" src="/assets/front/js/jquery-3.6.1.min.js"></script>

		<script type="text/javascript" src="/assets/front/js/jquery.blockUI.js"></script>
		<!-- Firebase App is always required and must be first -->
		<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>
		<!-- Add additional services that you want to use -->
		<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-auth.js"></script>
		<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-firestore.js"></script>	
		<input type='hidden' id='orderMessage' value='<?php echo $terms->terms_4; ?>'>
		<input type='hidden' id='commess' value='<?php echo $terms->terms_6; ?>'>
		<script>
			<?php if($room){ ?>
			var room_idx = <?php echo $room->idx; ?>;
			<?php } else { ?>
			var room_idx;
			<?php } ?>
			
			
			
			var orderMessage = document.getElementById("orderMessage").value;
			var commessage = document.getElementById("commess").value;
			console.log(orderMessage);
		
		</script>
		<script type="text/javascript" src="/assets/front/js/firebase-config.js?ver=<?php echo time(); ?>"></script>		
		<script type="text/javascript" src="/assets/front/js/chat2.js?ver=<?php echo time(); ?>"></script>
		<script type="text/javascript" src="/assets/front/js/app.common2.js?ver=<?php echo time(); ?>"></script>
        <title>대낙팡 - 피파대낙 최저가 500원부터</title>   
    </head>
    <body>
        <header>
            <div class="wrap header">
                <div class="header-wrap">
                    <div class="logo-box">
                        <p>PC방 이벤트 피파대낙 전문</p>
                        <div class="logo">
                            <img src="/assets/front/images/logo/logo_wc.png" alt="">
                            <span><b>대낙팡</b>.com</span>
                        </div>
                    </div>
                    <div class="welcome">
                        <!--로그인 이전-->
						<?php if(!$this->session->userdata('logged_in')){ ?>
                        <span class="expl"><b>대낙팡</b>에 로그인하세요.</span>
                        <div class="btn-wrap">
                            <a class="register-modal">
                                <img src="/assets/front/images/icons/sign_up.png" alt="">
                                <span>회원가입</span>
                            </a>
                            <span class="divider"></span>
                            <a class="login-modal">
                                <img src="/assets/front/images/icons/sign_in.png" alt="">
                                <span>로그인</span>
                            </a>
                        </div>
						<?php } else { ?>
		
                        <!--로그인 이후-->
						<span class="expl"><b><?php echo $this->session->userdata('name'); ?></b>님 안녕하세요.</span>
                        <div class="btn-wrap">
                            <a class="modify-modal">
                                <img src="/assets/front/images/icons/mypage.png" alt="">
                                <span>정보수정</span>
                            </a>
                            <span class="divider"></span>
                            <a href="/member/logout">
                                <img src="/assets/front/images/icons/logout.png" alt="">
                                <span>로그아웃</span>
                            </a>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </header>
<main>
    <h1><font color="#FFFFFF">피파대낙 피파대리 전문 대낙팡!</font></h1>
	<!--메인 배너 영역-->
	<section>
		<div class="wrap">
			<!--배너 비율 16 / 9-->
			<?php foreach($banner as $val){ 
				$file = $this->Global_m->get_row("attached_files", array("upload_type" => "banner", "parent_idx" => $val->idx)); 
			?>
			<div class="banner-wrap">			
				<img src="/uploads/files/<?php echo $file->real_path; ?>" alt="">
			</div>
			<?php } ?>
		</div>
	</section>

	
	<input type='hidden'  id="ip" value='<?php echo $ip; ?>'>
	<input type='hidden' id="agent" value='<?php echo $agent; ?>'>
	<input type='hidden' id="room_idx" value='<?php echo $room->idx; ?>'>
	<?php if(!$terms->ins) { ?>
	<form id="requestForm2">
	<input type='hidden' name='member_idx' id="member_idx" value='<?php echo $this->session->userdata('idx'); ?>'>
	
	<input type='hidden' name='userId' value='<?php echo $this->session->userdata('userId'); ?>'>	
	
	
	<section>
		<div class="wrap">
			<div class="input-wrap">
				<div class="box">
					<p>신청자명</p>
					<input type="text" name="name" value="<?php echo $member->name; ?>" placeholder="신청자 이름을 입력해주세요." required>
				</div>
				<div class="box">
					<p>입금자명</p>
					<input type="text" name="depositor" value="<?php echo $member->name; ?>" placeholder="입금자 이름을 입력해주세요." required>
				</div>
				<div class="box">
					<p>전화번호</p>
					<input type="text" class="numbersOnly" name="cellphone" value="<?php echo $member->cellphone; ?>" placeholder="전화번호를 입력해주세요. (- 제외)" required>
				</div>
			</div>

			<div class="input-wrap">
				<div class="box">
					<p>로그인 방식</p>
					<select name='login_type' id="login_type" required>
						<option value="">선택</option>
						<option value="넥슨" data-area="1" <?php if($member->login_type == "넥슨"){ echo "selected"; } ?>>넥슨</option>
						<option value="네이버" data-area="2"  <?php if($member->login_type == "네이버"){ echo "selected"; } ?>>네이버</option>
						<option value="구글" data-area="3"  <?php if($member->login_type == "구글"){ echo "selected"; } ?>>구글</option>
						<option value="페이스북" data-area="4"  <?php if($member->login_type == "페이스북"){ echo "selected"; } ?>>페이스북</option>
						<option value="애플" data-area="5"  <?php if($member->login_type == "애플"){ echo "selected"; } ?>>애플</option>
						<option value="넥슨 일회용 로그인" data-area="6"  >넥슨 일회용 로그인</option>
					</select>
					
					<!--네이버 선택시 노출-->
					<div class="rc-box mt-10 area" id="area_2">
						<div class="basic-tit">
							<img src="/assets/front/images/icons/bell.png" alt="">네이버 로그인시 추가 인증이 발생될 수 있으므로 신청서 작성과 입금을 하신 뒤에 꼭 [채팅문의]에서 대기해주세요.
						</div>
					</div>

					<!--구글 선택시 노출-->
					<div class="rc-box mt-10 area" id="area_3">
						<div class="basic-tit">
							<img src="/assets/front/images/icons/bell.png" alt="">구글 로그인은 [채팅문의]를 통해 인증번호 보내드리니 신청서 작성과 입금을 하신 뒤에 꼭 [채팅문의]에서 대기해주세요.
						</div>
					</div>

					<!--페이스북 선택시 노출-->
					<div class="rc-box mt-10 area" id="area_4">
						<div class="basic-tit">
							<img src="/assets/front/images/icons/bell.png" alt="">페이스북 로그인시 추가 인증이 발생될 수 있으므로 신청서 작성과 입금을 하신 뒤에 꼭 [채팅문의]에서 대기해주세요.
						</div>
					</div>

					<!--애플 선택시 노출-->
					<div class="rc-box mt-10 area" id="area_5">
						<div class="basic-tit">
							<img src="/assets/front/images/icons/bell.png" alt="">애플 로그인시 [채팅문의]를 통해 인증번호 보내주셔야하니 신청서 작성과 입금을 하신 뒤에 꼭 [채팅문의]에서 대기해주세요.
						</div>
					</div>

					<!--넥슨 일회용 로그인 선택시 노출-->
					<div class="rc-box mt-10 area" id="area_6">
						<p class="nexon-link">
							<img src="/assets/front/images/icons/question.png" alt="">
							<a href="https://nexonplay.nexon.com/disposable_login.html" target="_blank">넥슨 일회용 신청방법 바로가기</a>
						</p>
						<div class="basic-tit">
							<img src="/assets/front/images/icons/bell.png" alt="">넥슨 일회용 로그인 신청시 [채팅문의]를 통해 8자리의 숫자를 보내주셔야하니 신청서 작성과 입금을 하신 뒤에 꼭 [채팅문의]에서 대기해주세요.
						</div>
					</div>

				</div>
				<div class="box">
					<p class="bc-txt">OTP 사용</p>
					<div class="radio-box">
						<label>
							<input type="radio" name="otp" value='1' class="otp-on" required>
							<span>사용</span>
						</label>
						<label>
							<input type="radio" name="otp" value='2'>
							<span>사용 안함</span>
						</label>
					</div>
					<!--사용 선택시 노출-->
					<div class="rc-box mt-10 otp-content">
						<div class="basic-tit">
							<img src="/assets/front/images/icons/bell.png" alt="">OTP 사용시 [채팅문의]를 통해 인증번호를 보내드리니 신청서 작성과 입금을 하신 뒤에 꼭 [채팅문의]에서 대기해주세요.
						</div>
					</div>
				</div>
				<div class="loginBox">
					<div class="box">
						<p>아이디</p>
						<input type="text" onkeyup="checkReg(event)" name="gameId" value="<?php echo $member->gameId; ?>" placeholder="게임 아이디를 입력해주세요 (한글 입력 불가)" class='' required>
					</div>
					<div class="box">
						<p>비밀번호</p>
						<input type="text" onkeyup="checkReg(event)"  id='gamePassword' value="<?php echo $member->gamePassword; ?>" placeholder="게임 비밀번호를 입력해주세요 (한글 입력 불가)" class='' required>
					</div>
                </div>
                <div class="box">
                    <p>2차 비밀번호</p>
                    <input type="text" name="gameSecondPassword" value="<?php echo $member->gameSecondPassword; ?>" placeholder="2차 비밀번호를 입력해주세요. (숫자 4자리)" class='numbersOnly' required maxlength=4>
                </div>
			</div>
		</div>
	</section>


    <!--찾아오신 경로-->
    <section>
        <div class="wrap">
            <div class="input-wrap">
				<div class="box">
					<p>찾아오신 경로</p>
					<select name="rec" id="rec" required>
                        <option value="" selected>찾아오신 경로 선택</option>
                        <option value="해당 없음">해당 없음</option>
						<?php foreach($rec as $val){ ?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
						<?php } ?>
                    </select>
				</div>
			</div>
        </div>
    </section>
	

	<section>
		<div class="wrap">
			
			<!--배너 비율 16 / 9-->
			<?php foreach($banner2 as $val){ 
				$file = $this->Global_m->get_row("attached_files", array("upload_type" => "banner", "parent_idx" => $val->idx)); 
			?>
	
			<div class="warning-area">
                <img src="/uploads/files/<?php echo $file->real_path; ?>" alt="<?php echo $val->title; ?>">
            </div>
			<?php } ?>
			
		</div>
	</section>

	<section>
		<div class="wrap">
			<div class="input-wrap">
				<div class="box">
					<p class="bc-txt">대낙 서비스 선택</p>
					<div class="radio-column">
						<?php foreach($service as $key => $val){ ?>
						<label>
							<input type="radio" class="service-radio service" data-dn="<?php echo $val->dn; ?>" data-cp="<?php echo $val->cp; ?>" data-price="<?php echo $val->price; ?>" name="service" value="<?php echo $val->idx; ?>" <?php if($key == 0){ echo "required"; } ?> data-name="<?php echo $val->name; ?>">
							<span><?php echo $val->name; ?></span>
						</label>
						<!--PC방 대낙 (모두 받기만 가능) 선택시 노출-->
						<div class="rc-box mb-0  service-content service-fir">
							<div class="basic-tit">
								<img src="/assets/front/images/icons/bell.png" alt=""><?php echo nl2br($val->memo); ?>
							</div>
						</div>
						<?php } ?>

                        <!--신규서비스 241010-->
						
						
						
                      
						
						
                        <div class="each-box" id='playerForm' style='display:none'>
                            <ul class="each-area">
                                <li class="th">
                                    <div>선수 이름</div>
                                    <div>가격(조/억)</div>
                                    <div>쿠폰</div>
                                </li>

                                <li class="service-item">
                                    <div>
                                        <input type="text" name='pname[]' class='pname' placeholder="선수 이름">
                                    </div>
                                    <div>
                                        <input type="text" name='pjo[]' class='pjo numbersOnly' maxlength='4' placeholder="조">
										/
										<input type="text" name='puk[]' class='puk numbersOnly' maxlength='4' placeholder="억">
                                    </div>
                                    <div>
									
                                        <select name="pcoupon[]" class='pcoupon'>
                                            <option value="">선택</option>
											<?php foreach($player as $val){ ?>
                                            <option value="<?php echo base64_encode($val->name); ?>"><?php echo $val->name; ?></option>
											<?php } ?>
                                        </select>
                                    </div>
                                </li>
                            </ul>

                            <!--5개 생성시 추가 버튼에 dis 클래스 생성 및 추가 X-->
                            <div class="btn-wrap">
                                <button type="button" class="plus-btn ">추가</button>
                                <button type="button" class="minus-btn">삭제</button>
                            </div>
                        </div>

                        <script>
                            var i=1;
                            $(document).on("click",".plus-btn",function(e){                                 
								if(i == 5)
								{
									
									return false;
								}
								
                                $(".each-area").append(
                                    "<li class='service-item'>"+
                                        "<div>"+
                                            "<input type='text' name='pname[]' class='pname' placeholder='선수 이름' required>"+
                                        "</div>"+
                                        "<div>"+
                                            "<input type='text' name='pjo[]' class='pjo numbersOnly' placeholder='조' required maxlength='4'>/<input type='text' name='puk[]' class='puk numbersOnly' placeholder='억' required maxlength='4'>"+
                                        "</div>"+
                                        "<div>"+
                                            "<select name='pcoupon[]' class='pcoupon' required>"+
                                                "<option value=''>선택</option>"+
												<?php foreach($player as $val){ ?>
                                                "<option value='<?php echo base64_encode($val->name); ?>'><?php echo $val->name; ?></option>"+
												<?php } ?>
                                            "</select>"+
                                        "</div>"+
                                    "</li>"
                                );
                                i++;
								if(i == 5)
								{
									$(this).addClass("dis");
									
								}
                            });
							$(document).on("click",".minus-btn",function(e){                                 
								$(".plus-btn").removeClass("dis");
								if(i == 1)
								{
									return false;
								}
								$(".service-item:last-child").remove();								
                                i--;
                            });
                        </script>
							
						<label>
							<input type="radio" class="service-radio service" data-dn=""  name="service" value="coupon">
							<span class="rc-txt">할인쿠폰 구매</span>
						</label>
						<!--할인쿠폰 구매 (로그인시 미노출)-->
						
						<?php if(!$this->session->userdata('logged_in')){ ?>
						
						<div class="rc-box mb-0 service-content ">
							<div class="basic-tit">
								<div class="simple-cont">
									<span class="simple-content"><img src="/assets/front/images/icons/bell.png" alt="">할인쿠폰 구매는 회원만 구매가능합니다. 회원가입을 하고 사용하세요.</span> <a class="drc-sign register-modal">회원가입 바로가기</a>
								</div>
							</div>
						</div>
						<?php } else { ?>

						<!--할인쿠폰 종류 설명 (로그인시 노출)-->
						<div class="rc-box mb-0 service-content ">
							<div class="basic-tit">
								<div class="simple-cont">
									<span class="simple-content"><img src="/assets/front/images/icons/bell.png" alt="">할인쿠폰 종류와 수량을 선택후 신청서를 넣어주세요. 입금이 완료되면 쿠폰이 발행됩니다. 10분 안에 입금하지 않으시면 신청서 삭제됩니다. 할인쿠폰은 입금 후 환불불가입니다. 내용을 잘 확인하시고 신청해주세요.
								</div>
							</div>
						</div>
						<?php } ?>
						
						
						
						<!--할인쿠폰 종류 설명 (로그인시 노출)-->
						<div class="box service-content " id="buyCoupon">
							<p class="bc-txt">ㄴ할인쿠폰 종류</p>
							<div class="radio-column">
								<div class="burning-select column">
									<select name="coupon_idx" id="coupon_idx" class="coupon-type">
										<option value="" selected>-할인쿠폰 종류 선택-</option>
										<?php foreach($coupon as $val){ ?>
											<option value="<?php echo $val->idx; ?>" data-min="<?php echo $val->min_by_cnt; ?>" data-max="<?php echo $val->max_by_cnt; ?>" data-limit="<?php echo $val->limit_unit; ?>" data-price="<?php echo $val->price; ?>"><?php echo $val->NAME; ?></option>
										<?php } ?>
									</select>
									<div class="coupon-flex">
										<select name="coupon_cnt" id="coupon_cnt">
											<option value="" selected>수량</option>
											
										</select>
										<input type="text" id="coupon_price" value="0원" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--PC방 대낙 (모두 받기만 가능) / 10분 접속 + 대낙 선택시 노출-->
				<div class="box topc-section topclass">
					<p class="bc-txt">탑클래스 보유</p>
					<div class="radio-column">
						<label>
							<input type="radio" class="topc" name="topc" value="1">
							<span>사용중</span>
						</label>
						<!--사용중 선택시 노출-->
						<div class="blue-box topc-content topc-fir">
							<div class="basic-tit">
								<img src="/assets/front/images/icons/bell.png" alt="">탑클래스 보유 여부를 있음으로 작성했지만 탑클래스가 없는 경우 미인지 상태에서 대낙이 진행되더라도 발생한 손해 BP에 대한 보상은 해드리지 않습니다. 최초 신청서를 정확하게 작성 부탁 드립니다.
							</div>
						</div>

						<label>
							<input type="radio" class="topc" name="topc" value="2">
							<span>없음</span>
						</label>
						<!--없음 선택시 노출-->
						<div class="blue-box topc-content topc-sec">
							<div class="basic-tit">
								<img src="/assets/front/images/icons/bell.png" alt="">탑클래스가 없는 경우 구매요청 가능합니다.
							</div>
						</div>

						<label>
							<input type="radio" class="topc" name="topc" value="3">
							<span class="bc-txt">보관함에 있음</span>
						</label>
						<!--보관함에 있음 선택시 노출-->
						<div class="blue-box topc-content topc-thi">
							<div class="basic-tit">
								<img src="/assets/front/images/icons/bell.png" alt="">별도의 요청 사항이 없으면 보관함 내 탑클래스 중 임의로 선택합니다.
							</div>
						</div>

						<label>
							<input type="radio" class="topc" name="topc" value="4">
							<span class="rc-txt">구매요청</span>
						</label>
						<!--구매요청 선택시 노출-->
						<div class="blue-box topc-content topc-fou">
							<div class="basic-tit">
								<img src="/assets/front/images/icons/bell.png" alt="">탑클래스 대신 구매 요청 가능합니다.
							</div>
						</div>
					</div>
				</div>

				<!--탑클래스 보유 > 구매요청 선택시 노출-->
				<div class="box topc-buy-section topclass">
					<div id='buyClass' style='display:none'>
					<p class="bc-txt">탑클래스 구매</p>
					<div class="radio-column">
						<label>
							<input type="radio" class="topc-buy-1" name="tbuy" value="1">
							<span>TOP</span>
						</label>
						<label>
							<input type="radio" class="topc-buy-2" name="tbuy" value="2">
							<span>TOP+</span>
						</label>

						<label>
							<input type="radio" class="topc-buy-3" name="tbuy" value="3">
							<span>TOP+A</span>
						</label>
						<div class="rc-box">
							<div class="basic-tit">
								<img src="/assets/front/images/icons/bell.png" alt="">탑클래스 구매요청시 반드시 보유중인 FC가 있어야 합니다.
							</div>
						</div>
					</div>
					</div>
				</div>

				<!--PC방 대낙 (모두 받기만 가능) / 10분 접속 + 대낙 선택시 노출-->
				<div class="box ncoupon-section topclass" id='cpArea'>
					<p class="bc-txt">수수료 쿠폰 사용 수량</p>
					<div class="radio-column">
						<!--label>
							<input type="radio" class="cbuy" name="cbuy" value="1" >
							<span>사용안함</span>
						</label-->
						<label>
							<input type="radio" class="cbuy" name="cbuy" value="2">
							<span>쿠폰 모두사용 <b class="rc-txt">(*가격 높은순, 할인율 높은순, 쿠폰 팔린 선수만큼)</b></span>
						</label>

						<label>
							<input type="radio" class="cbuy" name="cbuy" value="3">
							<div class="coupon-box">
								<span>직접입력</span>
								<input type="number" name='cnt_result' id="cnt_result" value="0">
								<span>장</span>
								<div class="cnt-btn-wrap">
									<button type="button" onclick='count("plus_5")'>+5장</button>
									<button type="button" onclick='count("plus_10")'>+10장</button>
								</div>
							</div>
						</label>
					</div>
				</div>

			</div>
		</div>
	</section>

	
	<section >
		<div class="wrap">
			<div class="input-wrap" >
				<div class="box">
					<div class="box">
						<p class="bc-txt">대낙팡 할인쿠폰 <b class="sm-tit">(사용가능한 쿠폰만 보여집니다.)</b></p>
						<div class="radio-column">
							<label>
								<input type="radio" class="topc-buy-2 usec" name="usec" value="2" checked>
								<span>사용안함</span>
							</label>	
							
							<!--사용 가능한 쿠폰이 있을시 노출-->
							<label class='couponarea' style='display:none'>
								<input type="radio" class="topc-buy-1 usec" name="usec" value="1">
								<span>사용</span>
							</label>
							<div class="coupon-use-select couponarea" style='display:none'>
								<select name="useCoupon" id="useCoupon" class="burning-part">
									<option selected>-할인쿠폰 종류 선택-</option>
								
								</select>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<section>
		<div class="wrap">
			<div class="input-wrap">
				<div class="box">
					<p>신청 추가 내용</p>
					<textarea name="memo" placeholder="상세 내용을 입력해주세요.&#13;&#10;내용이 없으면 높은금액, 할인률 높은순으로 사용합니다.&#13;&#10;선별대낙 원할 시 선별대낙 상품을 꼭 이용해 주셔야 합니다. 선별대낙 상품 이외에 대낙이 포함된 모든 상품은 모두 받기만 가능합니다."></textarea>
				</div>
			</div>
		</div>
	</section>

	<!--section>
		<div class="wrap">
			<div class="input-wrap">
				<div class="box">
					<p class="bc-txt">대낙팡을 찾아오신 경로</p>
					<div class="radio-box">
						<label>
							<input type="radio" name="path" class="otp-on">
							<span>BJ 000</span>
						</label>
						<label>
							<input type="radio" name="path">
							<span>구글</span>
						</label>
						<label>
							<input type="radio" name="path">
							<span>네이버</span>
						</label>
						<label>
							<input type="radio" name="path">
							<span>기타</span>
						</label>
					</div>
				</div>
			</div>
		</div>
	</section-->

	<section>
		<div class="wrap">
			<div class="terms-wrap">
				<label>
					<input type="checkbox" id="terms_all">
					<span class="rc-txt">전체 동의</span>
				</label>
				<div class="box">
					<div class="terms-content"><?php echo $terms->terms_1; ?></div>
					<label>
						<input type="checkbox" class="terms_chk"  required>
						<span>이용약관에 동의합니다.</span>
					</label>
				</div>
				<div class="box">
					<div class="terms-content"><?php echo $terms->terms_2; ?></div>
					<label>
						<input type="checkbox" class="terms_chk"  required>
						<span>개인정보수집 및 활용에 동의합니다.</span>
					</label>
				</div>
				<div class="box">
					<div class="terms-content"><?php echo $terms->terms_3; ?></div>
					<label>
						<input type="checkbox" class="terms_chk"  required>
						<span>쿠키사용 및 활용에 동의합니다.</span>
					</label>
				</div>
			</div>
		</div>
	</section>
	


	<script>
		$("#terms_all").click(function() {
            if ($("#terms_all").is(":checked")) $(".terms_chk").prop("checked", true);
            else $(".terms_chk").prop("checked", false);
        });

        $(".terms_chk").click(function() {
            var total = $(".terms_chk").length;
            var checked = $(".terms_chk:checked").length;

            if (total != checked) $("#terms_all").prop("checked", false);
            else $("#terms_all").prop("checked", true);
        });
	</script>


    <!--오늘의 보상 시세-->
    <section>
        <div class="wrap">
            <div class="input-wrap">
                <div class="box">
                    <p>오늘의 보상 시세</p>
                    <div class="today-box">
                        <img src="/assets/front/images/icons/today_icon.png" alt=""><?php echo $terms->terms_5; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section>
		<div class="wrap">
			<div class="input-wrap">
				<div class="box">
					<p>입금 계좌번호</p>
					<div class="account-box">
						<input type="text" placeholder="" readonly value="<?php echo $account->bank; ?> <?php echo $account->account_number; ?> <?php echo $account->account_holder; ?>">
						<button type="button" id="account_btn" onclick="copyToClipboard();">복사</button>
					</div>
				</div>
				<div class="box">
					<p>이용요금</p>
                    <input type="text"  id='view_price' class="rc-border" placeholder="" readonly value="0원">
					<input type="hidden" name='price' id='price' class="rc-border" placeholder="" readonly value="0">
				</div>
			</div>
		</div>
	</section>
	

	<section>
		<div class="wrap">
			<div class="apply-wrap">
				<button type="submit">신청하기</button>
			</div>

			<div class="copy-wrap">
				<img src="/assets/front/images/logo/logo_mc.png" alt="">
				<p>COPYRIGHT 2024. <b>대낙팡</b> ALL RIGHTS RESERVED.</p>
			</div>
		</div>
	</section>
	</form>
<?php } else { ?>
<div class="ins-area">
    <div class="content">
        <img src="/assets/front/images/common/dn_check.png" alt="">
        <div class="expl">
            <?php echo nl2br($terms->content); ?>
        </div>
    </div>
</div>
<?php } ?>


</main>

        <div class="bottom-wrap">
            <ul class="bottom-nav">
                <li>
                    <a class="faq-modal">
                        <img src="/assets/front/images/icons/bottom_faq.png" alt="">
                        <span>FAQ</span>
                    </a>
                </li>
                <li>
                    <a class="chat-modal">
                        <img src="/assets/front/images/icons/bottom_chat.png" alt="">
                        <span>채팅문의</span>
                    </a>
                </li>
                <li>
                    <a class="history-modal">
                        <img src="/assets/front/images/icons/bottom_history.png" alt="">
                        <span>신청내역</span>
                    </a>
                </li>
                
				
				<?php if(!$this->session->userdata('logged_in')){ ?>
                <li>
                    <a class="login-modal">
                        <img src="/assets/front/images/icons/bottom_login.png" alt="">
                        <span class="yc-txt">로그인</span>
                    </a>
                </li>
				<?php } else { ?>
				<li>
                    <a class="coupon-modal">
                        <span class="coupon-cnt"><?php echo number_format($coupon_cnt->cnt); ?></span>
                        <span class="yc-txt">마이쿠폰</span>
                    </a>
                </li>
                <li>
                    <a href="/member/logout">
                        <img src="/assets/front/images/icons/bottom_logout.png" alt="">
                        <span class="yc-txt">로그아웃</span>
                    </a>
                </li>
				<?php } ?>
            </ul>
        </div>

        <!--채팅-->
        <div class="chat">
            <div class="tit-box">
                <span>채팅문의</span>
                <div class="right-box">
                    <!--button type="button" class="my-chat">내 채팅보기</button-->
                    <button tpye="button" class="modal-close chat-close">
                        <img src="/assets/front/images/icons/close_wc.png" alt="">
                    </button>
                </div>
            </div>
            <div class="chat-cont">
                <div class="chat-box">
                    <ul class="chat-log" id="chatArea">
						
                        <!--웰컴 메시지-->
                        <li class="left">
                            <div class="name">
                                <img src="/assets/front/images/icons/support.png" alt="">
                                <span>상담사</span>
                            </div>
                            <div class="chat-content support-bg">
                                <div class="content">
                                    <?php echo $greetings[0]->greetings; ?>
                                </div>
                            </div>
                        </li>
                        <!--질문 버튼 모음-->
                        <li class="chat-question">
							<?php foreach($autochat as $val){ 
								$file = $this->Global_m->get_row("attached_files", array("upload_type" => "autochat", "parent_idx" => $val->idx));	
							?>
                            <button type="button" class="question-box" data-content="<?php echo $val->content; ?>">
                                <img src="/uploads/files/<?php echo $file->real_path; ?>" alt="">
                                <span><?php echo $val->title; ?></span>
                            </button>
							<?php } ?>  
                        </li>

                    </ul>
                </div>
                <div class="write-box">
                    <input type="text" id="message" placeholder="문의사항을 입력해주세요.">
					<label for="sendfile"><img src="/assets/front/images/icons/chat_file_icon.svg" alt=""></label>
                    <input type='file' id='sendfile' class="chat-file">
                    <button type="button" id="sendBtn">보내기</button>
                </div>
            </div>
        </div>

    </body>
</html>


<!--임시 모달-->
<div class="modal center-modal" >
    <div class="cont">
        <div class="tit-box center">
            <span>서비스 완료</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box center">
            <div class="notice-content">신청하신 서비스가 완료되었습니다.<br/>이용해 주셔서 감사합니다.</div>

            <div class="apply-wrap">
				<button type="button" class="bc-btn modal-close">확인</button>
			</div>
        </div>
    </div>
</div>

<!--공지사항 모달-->
<?php if($notice->viewFlag == 1){ ?>
	
<div class="modal notice" style='display:block'>
    <div class="cont">
        <div class="tit-box center">
            <span>공지사항</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box center">
            <div class="notice-content"><?php echo nl2br($notice->content); ?></div>

            <div class="apply-wrap">
				<button type="button" class="bc-btn modal-close">닫기</button>
			</div>
        </div>
    </div>
</div>
<?php } ?>
				
<div class="modal complete">
    <div class="cont">
        <div class="tit-box">
            <span>알림</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="notice-content">
				서비스 신청이 완료 되었습니다!<br>
				입금 완료 후 1:1 대화를 확인 부탁드립니다.
			</div>

            <div class="apply-wrap">
				<button type="button" class="bc-btn modal-close">닫기</button>
			</div>
        </div>
    </div>
</div>

<!--FAQ 모달-->
<div class="modal faq">
    <div class="cont">
        <div class="tit-box">
            <span>FAQ</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="faq-content">
                <ul>
					<?php foreach($faq as $val){ ?>
                    <li>
                        <div class="faq-tit">
                            <span class="bc-txt">
                                <img src="/assets/front/images/icons/expl.png" alt=""><?php echo $val->title; ?>
                            </span>
                            <img src="/assets/front/images/icons/arrow_down_bc.png" alt="" class="faq-arrow">
                        </div>
                        <div class="f-content"><?php echo nl2br($val->content); ?></div>
                    </li>
					<?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!--로그인 모달-->
<div class="modal login">
<form id="loginForm">
    <div class="cont">
        <div class="tit-box">
            <span>로그인</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="input-wrap">
                <div class="box">
                    <p>아이디</p>
					<input type="text" name="userId" onkeyup="checkReg(event)"  placeholder="아이디를 입력해주세요." required>
                </div>
                <div class="box">
                    <p>비밀번호</p>
					<div class="flex-box">
                        <input type="password"  id='userPassword3' onkeyup="checkReg(event)" class="input-password" placeholder="비밀번호를 입력해주세요." required>
                        <button type="button" class="pw-btn"></button>
                    </div>
                </div>
                <label class="save-id">
                    <input type="checkbox" id="remember">
                    <span>아이디 저장</span>
                </label>
            </div>

            <div class="apply-wrap">
				<button type="submit">로그인</button>
			</div>
        </div>
    </div>
</form>
</div>

<!--회원가입 모달-->
<div class="modal register">
<form id="signUpForm">
    <div class="cont">
        <div class="tit-box">
            <span>회원가입</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="bc-box">
				<div class="expl-box p-0">
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						회원가입시 아이디는 <span class="yc-txt">6자리 이상이어야 하며 특수문자는 불가</span>합니다.
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						<span class="yc-txt">회원가입시 이름은 실명으로 입력해주세요.</span> (실명으로 입력하셔야 입금 확인이 가능합니다.)
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						원활한 진행을 위해 핸드폰 번호를 정확히 입력해주세요.
					</p>
                    <p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						<span class="yc-txt">일회용 로그인 방식은 회원가입이 불가합니다.</span>
					</p>
                    <p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						<span class="yc-txt">회원가입을 하신다면 피파대낙 서비스를 더 저렴한 가격에 이용 가능하십니다.</span>
					</p>
				</div>
			</div>
            <!--div class="rc-box">
				<a>
					<div class="simple-tit">
						<img src="/assets/front/images/icons/bell.png" alt="" class="bell">
						<span>2차 회원가입 이벤트 (1+1 이벤트)</span>
					</div>
				</a>
			</div-->
            <!--div class="bc-box">
				<div class="expl-box p-0">
					<p class="wc-txt">
						<img src="/assets/front/images/icons/gift.png" alt="">
						<span class="yc-txt">1+1 이벤트 : 회원가입+유료대낙 1번 => 무료쿠폰 1개</span>
					</p>
                    <div class="expl-sub">
                        <p>① 회원가입을 하세요!</p>
                        <p>② 유료로 ( 대낙 또는 10분접속) 한번을 이용하세요.</p>
                        <p>③ 유료 신청서의 넥슨아이디 정보로 정상적으로 로그인되어 완료되면 회원가입 무료쿠폰이 1장이 발행됩니다. (최초 1번)</p>
                        <p>④ 회원가입 무료쿠폰이 1장이 발행됩니다. (최초 1번)</p>
                    </div>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/gift.png" alt="">
						가입시 <span class="yc-txt">게임아이디/비밀번호/2차비번을 반드시 입력</span>하세요!!
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/gift.png" alt="">
						회원가입시 무료쿠폰 발급은 <span class="yc-txt">*넥슨 게임 아이디당 1개*</span>입니다. 입력하신 게임아이디로 무료쿠폰사용 이력이 있으면 발급이 되었더라도 해당 가입 무료쿠폰은 사용하실수 없습니다.
					</p>
                    <p class="wc-txt">
						<img src="/assets/front/images/icons/gift.png" alt="">
						<span class="yc-txt">가입시 입력하신 넥슨 게임 아이디/비밀번호/2차 비번으로 정상적으로 로그인</span>이 되어야 발급된 무료쿠폰으로 신청서 진행이 됩니다.
					</p>
				</div>
			</div-->
            <div class="input-wrap">
                <div class="box">
                    <p class="required">아이디</p>
					<div class="flex-box">
                        <input type="text" name='userId' onkeyup="checkReg(event)" placeholder="아이디를 입력해주세요." required>
                        <button type="button" id="id-chk" class="id-chk">중복체크</button>
                    </div>
                </div>
                <div class="box">
                    <p class="required">비밀번호</p>
					<div class="flex-box">
                        <input type="password" onkeyup="checkReg(event)"  id='userPassword' class="input-password" placeholder="비밀번호를 입력해주세요." required>
                        <button type="button" class="pw-btn"></button>
                    </div>
                </div>
                <div class="box">
                    <p class="required">비밀번호 확인</p>
					<input type="password" onkeyup="checkReg(event)" class="passwordConfirm" placeholder="비밀번호를 한번더 입력해주세요." required>
                </div>
                <div class="box">
                    <p class="required">이름</p>
					<input type="text" name="name" placeholder="실명을 입력하세요. (입금확인용)" required>
                </div>
                <div class="box">
                    <p class="required">핸드폰</p>
					<input type="text" name="cellphone" class="numbersOnly" placeholder="핸드폰 번호를 입력해주세요. (- 제외)" required>
                </div>
            </div>

            <div class="input-wrap">
                <div class="rc-box">
                    <div class="basic-tit">
                        <img src="/assets/front/images/icons/bell.png" alt="">넥슨 게임 아이디 정보는 필수사항입니다. 정확히 입력하셔야 회원가입 혜택을 받으실 수 있습니다.
                    </div>
                </div>

                <div class="box">
                    <p class="bc-txt required">로그인 방식</p>
					<div class="flex-box">
                        <select name="login_type" required>
                            <option value="">넥슨 로그인 방식 선택</option>
                            <option value="넥슨">넥슨</option>
                            <option value="네이버">네이버</option>
                            <option value="구글">구글</option>
                            <option value="페이스북">페이스북</option>
                            <option value="애플">애플</option>
                        </select>
                    </div>
                </div>
				
					<div class="box">
						<p class="bc-txt required">게임 아이디</p>
						<input type="text" onkeyup="checkReg(event)" name="gameId" placeholder="게임 아이디를 입력해주세요 (한글 입력 불가)" required>
					</div>
					<div class="box">
						<p class="bc-txt required">게임 비밀번호</p>
						<input type="text" onkeyup="checkReg(event)"  id='gamePassword2' placeholder="게임 비밀번호를 입력해주세요 (한글 입력 불가)" required>
					</div>
					<div class="box">
						<p class="bc-txt required">2차 비밀번호</p>
						<input type="text" maxlength=4 class='numbersOnly secondPwJoin' name="gameSecondPassword" placeholder="2차 비밀번호를 입력해주세요. (4자리)" required>
					</div>
					<div class="box">
						<p class="bc-txt required ns">이용약관</p>
						<div class="terms-content"><?php echo $terms->terms_1; ?></div>
						<label>
							<input type="checkbox" name="service_chk" required>
							<span>이용약관에 동의합니다.</span>
						</label>
					</div>
				
            </div>
            <div class="apply-wrap">
                <button type="button" class="bc-btn modal-close">취소</button>
				<button type="submit">등록하기</button>
			</div>
        </div>
    </div>
</form>
</div>

<!--신청내역 모달-->
<div class="modal history">
    <div class="cont">
        <div class="tit-box">
            <span>신청내역</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="history-box" id='historyArea'>
                
				
				<div class="history-cnt">
                    <img src="/assets/front/images/icons/bell.png" alt="" class="bell">
                    <span><b><?php if(!$this->session->userdata('logged_in')){ echo "비회원"; }else { echo $this->session->userdata('name'); } ?></b> 님 : 총 <b class="rc-txt"><?php echo number_format(count($order)); ?></b>건의 신청내역이 있습니다.</span>
                </div>
				
                <ul class="history-list">
					<?php foreach($order as $val){ 
						
					if($val->service != "coupon")
					{
						$service = $this->Global_m->get_row("service", array("idx" => $val->service));
						
					}
					else
					{
						$coupon = $this->Global_m->get_row("coupon", array("idx" => $val->coupon_idx));
					}	
					?>
                    <li>
                        <p class="date"><?php echo $val->reg_date; ?></p>
                        <p><span class="rc-txt">서비스</span> : 
										<?php
										if($val->service != "coupon")
										{
											echo $service->name;
										}
										else
										{
											echo $coupon->NAME."( ".$val->coupon_cnt." 장)";
										}
											
										?>
						</p>
                        <p><span class="rc-txt">이용요금</span> : <?php echo number_format($val->price); ?>원 <?php if($val->usec == 1){
											$useCoupon = $this->Global_m->get_row("coupon", array("idx" => $val->useCoupon));
											
											echo "(".$useCoupon->NAME." 사용)"; } ?></p>
											
						<p><span class="rc-txt">진행상태</span> : 
						
						
						<?php
							
						if($val->service != "coupon")
						{
							
							$this->db->order_by("idx","asc");
							$ing = $this->Global_m->get_all("orderinfo", array("status" => 1));
							$rank = 0;
							foreach($ing as $sub_key => $sub_val)
							{
								if($val->idx == $sub_val->idx)
								{
									$rank = $sub_key+1;
								}
							}
							
							
							
							if($val->status == 0){ echo "입금대기"; }else if($val->status == 1){ echo "입금 완료"." - 대기".$rank."번"; }else if($val->status == 2){ echo "진행중"; }else if($val->status == 3){ echo "진행완료"; }
							
							
						}
						else
							
						{	
							if($val->status == 0){ echo "입금대기"; }else if($val->status == 3){ echo "쿠폰 지급완료"; }
							
						}
							
						?>
						
						
						</p>
                    </li>
					<?php } ?>
					
                </ul>
            </div>

            <div class="apply-wrap">
                <button type="button" class="bc-btn modal-close">닫기</button>
			</div>
        </div>
    </div>
</div>

<!--마이쿠폰 모달-->
<div class="modal coupon">
    <div class="cont">
        <div class="tit-box">
            <span>마이쿠폰정보</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="bc-box">
				<div class="expl-box p-0">
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						'대낙팡 쿠폰'은 회원제로만 운영합니다. 이용하시려면 <span class="yc-txt">회원가입</span>을 하세요!
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						<span class="yc-txt">발급된 쿠폰 사용은 신청서 작성시 선택하여 사용가능합니다.</span>
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						쿠폰은 <span class="yc-txt">유효기간</span> 이전에 사용하셔야 됩니다. (유효기간이 지나면 자동 삭제 됩니다.)
					</p>
                    <p class="wc-txt">
                        <div class="simple-cont">
                            <span class="simple-content"><img src="/assets/front/images/icons/expl.png" alt="">모두받기 대낙 10회 이용권을 8,000원에 구매 가능</span> <a class="drc-sign coupon-link">할인쿠폰 구매 바로가기</a>
                        </div>
                    </p>
				</div>
			</div>

            <div class="coupon-box">
                <div class="coupon-cnt">
                    <span>사용 가능한 쿠폰</span>
                    <div class="all-cnt">총<span class="cnt"><?php echo number_format($coupon_cnt->cnt); ?></span>장</div>
                </div>

                <ul class="coupon-list">
					<?php foreach($mycoupon as $val){ ?>
                    <li>
                        <span><b class="rc-txt">쿠폰명</b> : <?php echo $val->coupon_name; ?></span>
                        <span><b class="rc-txt"><?php echo number_format($val->cnt); ?></b>장</span>
                    </li>
					<?php } ?>
					
                </ul>
            </div>
            
            <div class="apply-wrap">
                <button type="button" class="bc-btn modal-close">닫기</button>
			</div>
        </div>
    </div>
</div>



<!--정보수정 모달-->
<div class="modal modify">
<form id="modifyForm">
    <div class="cont">
        <div class="tit-box">
            <span>정보수정</span>
            <button tpye="button" class="modal-close">
                <img src="/assets/front/images/icons/close_wc.png" alt="">
            </button>
        </div>
        <div class="content-box">
            <div class="bc-box">
				<div class="expl-box p-0">
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						아이디는 <span class="yc-txt">변경불가!</span>
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						사용하는 <span class="yc-txt">넥슨 로그인 추가정보를 사전에 입력</span>해두시면 신청서 작성시 로그인 정보를 편리하게 입력하실수 있습니다.
					</p>
					<p class="wc-txt">
						<img src="/assets/front/images/icons/expl.png" alt="">
						핸드폰 번호를 정확히 입력하지 않으시면 원할한 진행이 어렵습니다.
					</p>
				</div>
			</div>
            <div class="input-wrap">
                <div class="box">
                    <p class="required">아이디</p>
					<div class="flex-box">
                        <input type="text" name='userId' class="englishOnly modify-input" placeholder="아이디를 입력해주세요." required disabled value="<?php echo $member->userId; ?>">
                    </div>
                </div>
                <div class="box">
                    <p class="required">비밀번호</p>
					<div class="flex-box">
                        <input type="password"  id='userPassword4' class="input-password" placeholder="비밀번호를 입력해주세요." required>
                        <button type="button" class="pw-btn"></button>
                    </div>
                </div>
                <div class="box">
                    <p class="required">비밀번호 확인</p>
					<input type="password" class="passwordConfirm" placeholder="비밀번호를 한번더 입력해주세요." required>
                </div>
                <div class="box">
                    <p class="required">이름</p>
					<input type="text" name="name" value="<?php echo $member->name; ?>" placeholder="실명을 입력하세요. (입금확인용)" required>
                </div>
                <div class="box">
                    <p class="required">핸드폰</p>
					<input type="text" name="cellphone" value="<?php echo $member->cellphone; ?>" class="numbersOnly" placeholder="핸드폰 번호를 입력해주세요. (- 제외)" required>
                </div>
            </div>

           <div class="input-wrap">
                <div class="box">
                    <p class="bc-txt required">로그인 방식</p>
					<div class="flex-box">
                        <select name="login_type" required>
                            <option value="" >넥슨 게임 로그인 방식</option>
                            <option value="넥슨" <?php if($member->login_type == '넥슨'){ echo "selected"; } ?>>넥슨</option>
                            <option value="네이버" <?php if($member->login_type == '네이버'){ echo "selected"; } ?>>네이버</option>
                            <option value="구글" <?php if($member->login_type == '구글'){ echo "selected"; } ?>>구글</option>
                            <option value="페이스북" <?php if($member->login_type == '페이스북'){ echo "selected"; } ?>>페이스북</option>
                            <option value="애플" <?php if($member->login_type == '애플'){ echo "selected"; } ?>>애플</option>
                        </select>
                    </div>
                </div>
                <div class="box">
                    <p class="bc-txt required">게임 아이디</p>
					<input type="text" onkeyup="checkReg(event)" name="gameId" value="<?php echo $member->gameId; ?>" placeholder="게임 아이디를 입력해주세요." required>
                </div>
                <div class="box">
                    <p class="bc-txt required">게임 비밀번호</p>
					<input type="text" onkeyup="checkReg(event)"  id='gamePassword7' value="<?php echo $member->gamePassword; ?>" placeholder="게임 비밀번호를 입력해주세요." required>
                </div>
                <div class="box">
                    <p class="bc-txt required">2차 비밀번호</p>
					<input type="text" name="gameSecondPassword" maxlength=4 class='numbersOnly secondPwModify' value="<?php echo $member->gameSecondPassword; ?>" placeholder="2차 비밀번호를 입력해주세요. (4자리)" required>
                </div>
            </div>

            <div class="apply-wrap">
                <button type="button" class="bc-btn modal-close">취소</button>
				<button type="submit">수정하기</button>
			</div>
        </div>
    </div>
</form>	
</div>

<button id='audioBtn' style='display:none'>asdf</button>


<input type="hidden" value="<?php echo $account->bank; ?> <?php echo $account->account_number; ?> <?php echo $account->account_holder; ?>" id="link-aera">
<script>
const audio = new Audio( '/assets/sound.mp3' );

$(document).ready(function(){
	$("#audioBtn").click(function(){
		audio.play();
	});	
	
});


//쿠폰 카운트
function count(type)  {
	// 결과를 표시할 element
	const resultElement = document.getElementById('cnt_result');

	// 현재 화면에 표시된 값
	let number = Number($("#cnt_result").val());

	// 더하기/빼기
	if(type === 'plus_5') {
		number = parseInt(number) + 5;
	}else if(type === 'plus_10')  {
		number = parseInt(number) + 10;
	}
	
	// 결과 출력
	resultElement.innerText = number;
	$("#cnt_result").val(number);
	  $('input[name="cbuy"]').each(function() {
        var value = $(this).val();             
	
        if(value == "3")
		  {
			$(this).prop('checked', true);
		  }
    });
	
}
//입금 계좌번호 복사하기
<?php if(!$terms->ins) { ?>
document.getElementById("account_btn").onclick = () => {
	
	
  
    $("#link-aera").attr("type", "text");	
	$("#link-aera").select();
	var sc = document.execCommand("copy");
	$("#link-aera").attr("type", "hidden");
	if(sc)
	{
		alert("계좌 정보가 복사 되었습니다");
	}
};
<?php } ?>

//모달 닫기
$(".modal-close").click(function(){
	$(".modal").hide();
	$('body').css("overflow", "auto");
});

//할인쿠폰 구매 바로가기
$(".coupon-link").click(function(){
	$(".modal.coupon").hide();
	$('body').css("overflow", "auto");
	$("input:radio[id='coupon_buy']").prop("checked", true);
	$('.coupon-type').focus();
});

//토요버닝 바로가기(회원) 바로가기
$(".burning-link").click(function(){
	$("input:radio[id='burning_service']").prop("checked", true);
	$('.burning-part').focus();
});

//로그인 모달
$(".login-modal").click(function(){
	$(".modal.login").show();
	$('body').css("overflow", "hidden");
	$('.modal').css("overflow-y", "auto");
});

//회원가입 모달
$(".register-modal").click(function(){
	$(".modal.register").show();
	$('body').css("overflow", "hidden");
	$('.modal').css("overflow-y", "auto");
});

//신청내역 모달
$(".history-modal").click(function(){
	var formData = new FormData();  		
	$.ajax({
		url:"/member/getHistory",
		type:'post',
		dataType:"JSON",
		data:formData,						
		cache: false,
		contentType: false,
		processData: false,	
		beforeSend : function(xhr){
			blockUI();
		},
		success: function(data){  
		
			$("#historyArea").html(data.html);
			$(".modal.history").show();
			$('body').css("overflow", "hidden");
			$('.modal').css("overflow-y", "auto");
			
			return false;

		},
		complete : function(xhr, textStatus) {
			$.unblockUI();
		},					
		error:function(request, status, error){
			alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});	
	//historyArea
	
	/*
	$(".modal.history").show();
	$('body').css("overflow", "hidden");
	$('.modal').css("overflow-y", "auto");
	*/
});

//마이쿠폰 모달
$(".coupon-modal").click(function(){
	$(".modal.coupon").show();
	$('body').css("overflow", "hidden");
	$('.modal').css("overflow-y", "auto");
});

//정보수정 모달
$(".modify-modal").click(function(){
	$(".modal.modify").show();
	$('body').css("overflow", "hidden");
	$('.modal').css("overflow-y", "auto");
});

//FAQ 모달
$(".faq-modal").click(function(){
	$(".modal.faq").show();
	$('body').css("overflow", "hidden");
	$('.modal').css("overflow-y", "auto");
});

//FAQ 토글
$(".faq-tit").click(function(){
	$(this).next().slideToggle(300);
	$(this).toggleClass("show")
	if($(this).hasClass("on")) {
		$(this).removeClass("on");
	} else {
		$(this).addClass("on");
	}
});

//채팅 show / hide
$(".chat-modal").click(function(){
	if($('.chat').hasClass("on")) {
		$('.chat').removeClass("on");
	} else {
		$('.chat').addClass("on");
	}
});

$(".chat-close").click(function(){
	if($('.chat').hasClass("on")) {
		$('.chat').removeClass("on");
	} else {
		$('.chat').addClass("on");
	}
});
$(document).on("keyup",".numbersOnly",function(e){
	$(this).val(this.value.replace(/[^0-9\.]/g,''));
});
</script>