<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<style>
	.widget-main-side-box { background-color: #ffffff; border-radius: 2px; border: 1px solid #ddd; margin-bottom: 10px; }
    .widget-main-side-box h3 { color: #363838; font-size: 13px; font-weight: bold; font-family: 'Open Sans Bold', sans-serif; margin: 0; padding: 15px; }
    .widget-main-side-box .divline { height: 1px; line-height: 1px; border-bottom: solid 1px rgba(230, 230, 230, 0.5); }
    .widget-small-box { padding: 15px; }
    .more { display: block; margin-right: 12px; margin-top: 12px; opacity: 0.5; }
    .more:hover { display: block; margin-right: 12px; margin-top: 12px; opacity: 0.9; }
    @media (min-width:991px) { .nt-view-side { margin-left:-5px; margin-right:-15px; }}
</style>

<div class="nt-view-side">
<?php if($is_index) { // 인덱스에서만 출력 ?>
	<!-- 로그인 시작 -->
	<div class="hidden-xs">
		<?php echo na_widget('work-outlogin'); // 외부로그인 위젯 ?>
	</div>
	<div class="h10"></div>
	<!-- 로그인 끝 -->
<?php } else { // 페이지에서는 메뉴 출력 ?>

	<?php 
	$mes = array();
	for ($i=0; $i < $menu_cnt; $i++) { 
		// 주메뉴 이하 사이트이고 서브메뉴가 있으면...
		if($menu[$i]['on']) {
			$mes = $menu[$i];
			break;
		}
	}

	// 선택메뉴가 있다면...
	if(!empty($mes)) {
		add_stylesheet('<link rel="stylesheet" href="'.$nt_side_url.'/side.css">', 0);
	?>
		<div id="nt_side_menu">
			<div class="side-menu-head bg-<?php echo NT_COLOR ?> en">
				<i class="<?php echo $mes['icon'] ?>" aria-hidden="true"></i>
				<?php echo $mes['text'];?>					
			</div>
			<?php if(isset($mes['s'])) { ?>
				<ul class="me-ul">
				<?php for ($i=0; $i < count($mes['s']); $i++) { 
					$me = $mes['s'][$i]; 
				?>
				<li class="me-li<?php echo ($me['on']) ? ' active' : ''; ?>">
					<?php if(isset($me['s'])) { //Is Sub Menu ?>
						<i class="fa fa-caret-down tree-toggle me-i"></i>
					<?php } ?>
					<a class="me-a" href="<?php echo $me['href'];?>" target="<?php echo $me['target'];?>">
						<i class="<?php echo $me['icon'] ?>" aria-hidden="true"></i>
						<?php echo $me['text'];?>
					</a>

					<?php if(isset($me['s'])) { //Is Sub Menu ?>
						<ul class="me-ul1 tree <?php echo ($me['on']) ? 'on' : 'off'; ?>">
						<?php for($j=0; $j < count($me['s']); $j++) { 
								$me1 = $me['s'][$j]; 
						?>
							<?php if($me1['line']) { //구분라인 ?>
								<li class="me-line1"><a class="me-a1"><?php echo $me1['line'];?></a></li>
							<?php } ?>

							<li class="me-li1<?php echo ($me1['on']) ? ' active' : ''; ?>">
								<a class="me-a1" href="<?php echo $me1['href'];?>" target="<?php echo $me1['target'];?>">
									<i class="<?php echo $me1['icon'] ?>" aria-hidden="true"></i>
									<?php echo $me1['text'];?>
								</a>
							</li>
						<?php } //for ?>
						</ul>
					<?php } //is_sub ?>
				</li>
				<?php } //for ?>
				</ul>
			<?php } //is_sub ?>
		</div>
		<script>
		$(document).ready(function () {
			$(document).on('click', '#nt_side_menu .tree-toggle', function () {
				$(this).parent().children('ul.tree').toggle(200);
			});
		});
		</script>
		<div class="h10"></div>
	<?php } ?>
<?php } ?>

<!-- 위젯 시작 -->
<div class="widget-main-side-box">
    <ins class="kakao_ad_area" style="display:none;"
         data-ad-unit    = "DAN-rlanapd6v7ll"
         data-ad-width   = "300"
         data-ad-height  = "250"></ins>
    <script type="text/javascript" src="//t1.daumcdn.net/kas/static/ba.min.js" async></script>
</div>
<!-- 위젯 시작 -->

<!-- 위젯 시작 -->
<div class="widget-main-side-box">
     <a href="<?php echo get_pretty_url('free'); ?>">
        <span class="pull-right more">
             <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
        </span>
     </a>
        <h3>알림장</h3>
        <div class="divline"></div>
        <div class="widget-small-box">
            <?php echo na_widget('basic-wr-list', 'notice'); ?>
     </div>
</div>
<!-- 위젯 시작 -->

<!-- 위젯 시작 -->
<div class="widget-main-side-box">
     <a href="<?php echo G5_BBS_URL ?>/new.php?view=w">
        <span class="pull-right more">
             <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
        </span>
     </a>
        <h3>최근글</h3>
        <div class="divline"></div>
        <div class="widget-small-box">
            <?php echo na_widget('basic-wr-list', 'new-wr'); ?>
     </div>
</div>
<!-- 위젯 시작 -->

<!-- 위젯 시작 -->
<div class="widget-main-side-box">
    <ins class="kakao_ad_area" style="display:none;"
         data-ad-unit    = "DAN-1h82kvvvd6alv"
         data-ad-width   = "300"
         data-ad-height  = "250"></ins>
    <script type="text/javascript" src="//t1.daumcdn.net/kas/static/ba.min.js" async></script>
</div>
<!-- 위젯 시작 -->

<!-- 위젯 시작 -->
<div class="widget-main-side-box">
     <a href="<?php echo G5_BBS_URL ?>/new.php?view=c">
        <span class="pull-right more">
             <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
        </span>
     </a>
        <h3>새댓글</h3>
        <div class="divline"></div>
        <div class="widget-small-box">
            <?php echo na_widget('basic-wr-comment-list', 'new-co'); ?>
     </div>
</div>
<!-- 위젯 시작 -->

<!-- 위젯 시작 -->
<div class="widget-main-side-box">
        <h3>사이트 통계</h3>
        <div class="divline"></div>
        <div class="widget-small-box">
            <ul>
	<?php if($stats['now_total']) { ?>
	<li><a href="<?php echo G5_BBS_URL ?>/current_connect.php">
		<span class="pull-right"><?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb'] > 0) ? '(<b class="orangered">'.number_format($stats['now_mb']).'</b>)' : ''; ?> 명</span>현재 접속자</a>
	</li>
	<?php } ?>
	<li><span class="pull-right"><?php echo number_format($stats['visit_today']); ?> 명</span>오늘 방문자</li>
	<li><span class="pull-right"><?php echo number_format($stats['visit_yesterday']); ?> 명</span>어제 방문자</li>
	<li><span class="pull-right"><?php echo number_format($stats['visit_max']); ?> 명</span>최대 방문자</li>
	<li><span class="pull-right"><?php echo number_format($stats['visit_total']); ?> 명</span>전체 방문자</li>
	<?php if($stats['total_write']) { ?>
	<li><span class="pull-right"><?php echo number_format($stats['total_write']); ?> 개</span>전체 게시물</li>
	<li><span class="pull-right"><?php echo number_format($stats['total_comment']); ?> 개</span>전체 댓글수</li>
	<li><span class="pull-right sidebar-tip" data-original-title="<nobr>오늘 <?php echo $stats['join_today'];?> 명 / 어제 <?php echo $stats['join_yesterday'];?> 명</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><?php echo number_format($stats['join_total']); ?> 명</span>전체 회원수
	<?php } ?>
	</li>
</ul>
     </div>
</div>
</div>
<!-- 위젯 시작 -->
