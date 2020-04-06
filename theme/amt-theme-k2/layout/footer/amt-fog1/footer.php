<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$nt_footer_url.'/footer.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$nt_footer_url.'/amt/css/amt-fog1.css">', 0);

add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/theme/amt-theme-k2/amt/misc/themify-icons/themify-icons.css" type="text/css">',1);


?>

<footer id="nt_footer" class="amt-fog1">
	<div class="nt-container">
		<div class="amt-fog1-wrap">
			<div class="amt-linkwrap">
				<ul class="pull-left">
					<li><a href="<?php echo get_pretty_url('content', 'privacy'); ?>"><span class="amt-font">개인정보처리방침</span></a></li>
					<li><a href="<?php echo get_pretty_url('content', 'noemail'); ?>">이메일 무단수집거부</a></li>
				</ul>
				<div class="clearfix"></div>
				<ul>
					<li><a href="<?php echo get_pretty_url('content', 'guide'); ?>">이용안내</a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/qalist.php">문의하기</a></li>
					<li><a href="<?php echo get_device_change_url(); ?>"><?php echo (G5_IS_MOBILE) ? 'PC' : '모바일';?>버전</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		
			<div class="nt-infos">
				<div class="nt-container">
					<div class="amt-about">
						<ul>
							<li>(우) 12345 어뮤즈도 어뮤즈시 어뮤즈1922번길 123(어뮤즈동) 어뮤즈파크 12동 3층</li>
							<li>TEL.01)987-1000 FAX. 01)123-9876 사업자등록번호.111-83-11119</li>
							<li class="amt-copyright">Copyright<i class="fa fa-copyright"></i> 2019 <?php echo get_text($config['cf_title']); ?> All rights reserved.</li>
						</ul>
					</div>
					<ul class="pull-right amt-sns">
						<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
				
		</div>
	</div>
</footer>