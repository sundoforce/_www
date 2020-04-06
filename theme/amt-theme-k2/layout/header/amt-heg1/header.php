<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 모바일 헤드는 메뉴에 들어가 있음. 상단고정문제 때문에...ㅠㅠ

add_stylesheet('<link rel="stylesheet" href="'.$nt_header_url.'/header.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$nt_header_url.'/amt/css/amt-heg1.css">', 0);

?>

<!-- PC Header -->
<header id="header_pc" class="amt-heg1">
	<div class="nt-container">
		<!-- PC Logo -->
		<div class="header-logo">
			<a href="<?php echo NT_HOME_URL ?>">
				<img id="logo_img" src="<?php echo $tset['logo_img'] ?>" alt="<?php echo get_text($config['cf_title']) ?>">
			</a>
		</div>
		
		<div class="clearfix"></div>
	</div>
</header>