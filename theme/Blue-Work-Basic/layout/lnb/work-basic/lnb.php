<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$nt_lnb_url.'/lnb.css">', 0);
add_javascript('<script src="'.$nt_lnb_url.'/lnb.js"></script>', 0);

$tweek = array("일", "월", "화", "수", "목", "금", "토");
?>

<aside id="nt_lnb" class="f-small">
	<div class="nt-container">
		<!-- 
		<div class="pull-left left-lnb">
			<ul>
				<li><a href="javascript:;" id="favorite">즐겨찾기</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
				<li><a><?php echo date('m월 d일');?>(<?php echo $tweek[date("w")];?>)</a></li>
			</ul>
		</div>
		-->
		<div class="pull-right right-lnb">
			<ul>
			<?php if($is_member) { // 로그인 상태 ?>
				<li><?php echo $member['sideview'] ?></li>
				<?php if ($is_admin == 'super' || $member['is_auth']) { ?>
					<li><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리</a></li>
				<?php } ?>
				<li><a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="win_memo">
					쪽지<?php if ($member['mb_memo_cnt']) { ?> <b class="orangered"><?php echo number_format($member['mb_memo_cnt']) ?></b><?php } ?>
					</a>
				</li>
                <li>
                    <a href="<?php echo G5_ATTENDANCE_URL;?>/attendance.php">출석</a>
                </li>
				<?php if(IS_NA_NOTI) { // 알림 ?>
					<li><a href="<?php echo G5_BBS_URL ?>/noti.php">
						알림<?php if ($member['as_noti']) { ?> <b class="orangered"><?php echo number_format($member['as_noti']) ?></b><?php } ?>
						</a>
					</li>
				<?php } ?>
				<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" class="win_scrap">
						스크랩<?php if($member['mb_scrap_cnt']) { ?> <b><?php echo number_format($member['mb_scrap_cnt']) ?></b><?php } ?>
					</a>
				</li>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class="win_point">
						포인트 <b class="red"><?php echo number_format($member['mb_point']) ?></b>
					</a>
				</li>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">
						정보수정
					</a>
				</li>
			<?php } else { // 로그아웃 상태 ?>
				<li><a href="javascript:;" id="favorite">이 사이트를 즐겨찾기에 추가하기</a></li>
				<li><a><?php echo date('m월 d일');?>(<?php echo $tweek[date("w")];?>)</a></li>
			<?php } ?>

            <?php if($is_member) { ?>
                <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php } ?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</aside>
