<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

?>
<div id="reg_result" class="register<?php echo ($tset['page_sub']) ? ' headsub' : ' no-headsub';?>">
	<ul class="list-group">
		<li class="list-group-item bg-light">
			<strong><?php echo $mb['mb_name'] ?></strong>님의 회원가입을 축하합니다.
		</li>
		<li class="list-group-item">
			<ul style="list-style:disc; padding-left:20px">
			<?php if (is_use_email_certify()) {  ?>
				<li>회원 가입 시 입력하신 이메일 주소로 인증메일이 발송되었습니다.</li>
				<li>발송된 인증메일을 확인하신 후 인증처리를 하시면 사이트를 원활하게 이용하실 수 있습니다.</li>
				<li>이메일 주소를 잘못 입력하셨다면, 사이트 관리자에게 문의해주시기 바랍니다.
					<br>
					<table class="table table-bordered" style="margin-top:7px;">
					<tbody>
					<tr class="bg-light">
						<th class="col-xs-4 text-center">아이디</th>
						<th class="text-center">이메일</th>
					</tr>
					<tr>
						<td class="text-center">
							<?php echo $mb['mb_id'] ?>
						</td>
						<td class="text-center">
							<?php echo $mb['mb_email'] ?>
						</td>
					</tr>
					</tbody>
					</table>
				</li>
			<?php } ?>
				<li>회원님의 비밀번호는 아무도 알 수 없는 암호화 코드로 저장되므로 안심하셔도 좋습니다.</li>
				<li>아이디, 비밀번호 분실시에는 회원가입시 입력하신 이메일 주소를 이용하여 찾을 수 있습니다.</li>
				<li>회원 탈퇴는 언제든지 가능하며 일정기간이 지난 후, 회원님의 정보는 삭제하고 있습니다.</li>
				<li>감사합니다.</li>
			</ul>
		</li>
		<?php if(IS_YC && $default['de_member_reg_coupon_use'] && get_session('ss_member_reg_coupon') == 1) { ?>
			<li id="result_coupon" class="list-group-item bg-light">
				주문시 사용하실 수 있는 <strong><?php echo display_price($default['de_member_reg_coupon_price']); ?> 할인<?php echo ($default['de_member_reg_coupon_minimum'] ? '(주문금액 '.display_price($default['de_member_reg_coupon_minimum']).'이상)' : ''); ?> 쿠폰</strong>이 발행되었으니, 마이페이지에서 확인하실 수 있습니다.
			</li>
		<?php } ?>
	</ul>

	<div class="text-center">
		<a href="<?php echo G5_URL ?>" class="btn btn_b01" title="홈으로">
			<i class="fa fa-home fa-2x" aria-hidden="true"></i>
			<span class="sound_only">홈으로</span>
		</a>
	</div>
</div>

<div class="h30"></div>