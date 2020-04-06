<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 사이드 위치 설정 - left, right
$side = ($tset['index_side']) ? $tset['index_side'] : 'right';

add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/theme/amt-theme-k2/amt/misc/themify-icons/themify-icons.css" type="text/css">',1);
add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/theme/amt-theme-k2/index/amt/css/amt-mag1.css" type="text/css">',1);


?>

<style>
#nt_body { overflow:visible; }
.nt-index { overflow:hidden; }

</style>


<div class="nt-index">
	

	<div class="h20"></div>
	
	<div class="nt-container">
		<div class="row nt-row">
			<!-- 메인 영역 -->
			<div class="nt-main amt-mag1">
				<div class="row fix-gutters-10">
					<div class="col-sm-6 col-xs-12">

						<div class="amt-widgwrap">
							<!-- 위젯 시작 { -->
							<div class="amt-widg-tit">
								<h3 class="h3 en">
									<a href="<?php echo get_pretty_url('video'); ?>">
										<span class="pull-right more f-small">+</span>
										서비스 소개
									</a>
								</h3>
							</div>
							<div class="amt-widg-con amt-widg-cust">
								<?php echo na_widget('basic-wr-gallery', 'amt-gall-1', 'item=2 lg=2 md=2 sm=2 xs=2 rows=2'); ?>
							</div>
							<!-- } 위젯 끝-->
						</div>
						
						<div class="h20"></div>
						
					</div>
					<div class="col-sm-6 col-xs-12">

						<div class="amt-widgwrap">
							<!-- 위젯 시작 { -->
							<div class="amt-widg-tit">
								<h3 class="h3 en">
									<a href="<?php echo get_pretty_url('video'); ?>">
										<span class="pull-right more f-small">+</span>
										서비스 안내
									</a>
								</h3>
							</div>
							<div class="amt-widg-con  amt-widg-cust">
								<?php echo na_widget('basic-wr-gallery', 'amt-gall-2', 'item=2 lg=2 md=2 sm=2 xs=2 rows=2'); ?>
							</div>
							<!-- } 위젯 끝-->
						</div>
						
						<div class="h20"></div>

					</div>
				</div>
				
				
				<div class="amt-widgwrap">
					<!-- 위젯 시작 { -->
					<div class="amt-widg-tit">
						<h3 class="h3 en">
							<a href="<?php echo get_pretty_url('video'); ?>">
								<span class="pull-right more f-small">+</span>
								이벤트
							</a>
						</h3>
					</div>
					<div class="amt-widg-con">
						<?php echo na_widget('basic-banner', 'amt-banr-3', 'item=4 lg=4 md=3 sm=2 xs=1 '); ?>
					</div>
					<!-- } 위젯 끝-->
				</div>
				
				
				<div class="h20"></div>

				<div class="row fix-gutters-10">
					<div class="col-sm-4">

						<div class="amt-widgwrap">
							<!-- 위젯 시작 { -->
							<div class="amt-widg-tit">
								<h3 class="h3 en">
									<a href="<?php echo get_pretty_url('video'); ?>">
										<span class="pull-right more f-small">+</span>
										일간 인기글
									</a>
								</h3>
							</div>
							<div class="amt-widg-con">
								<?php echo na_widget('basic-wr-list', 'amt-list-1', ''); ?>
							</div>
							<!-- } 위젯 끝-->
						</div>
						
						<div class="h20"></div>

					</div>
					<div class="col-sm-4">

						<div class="amt-widgwrap">
							<!-- 위젯 시작 { -->
							<div class="amt-widg-tit">
								<h3 class="h3 en">
									<a href="<?php echo get_pretty_url('video'); ?>">
										<span class="pull-right more f-small">+</span>
										주간 인기글
									</a>
								</h3>
							</div>
							<div class="amt-widg-con">
								<?php echo na_widget('basic-wr-list', 'amt-list-2', 'rows=7'); ?>
							</div>
							<!-- } 위젯 끝-->
						</div>
						
						<div class="h20"></div>
						
					</div>
					<div class="col-sm-4">

						<div class="amt-widgwrap">
							<!-- 위젯 시작 { -->
							<div class="amt-widg-tit">
								<h3 class="h3 en">
									<a href="<?php echo get_pretty_url('video'); ?>">
										<span class="pull-right more f-small">+</span>
										월간 인기글
									</a>
								</h3>
							</div>
							<div class="amt-widg-con">
								<?php echo na_widget('basic-wr-list', 'amt-list-3', 'rows=7'); ?>
							</div>
							<!-- } 위젯 끝-->
						</div>
						
						<div class="h20"></div>

					</div>
				</div>
				<div class="row fix-gutters-10">
					<div class="col-sm-6 col-xs-12">
						<?php echo na_widget('basic-title', 'title-1', 'height=35%', 'auto=0 nav=1'); //타이틀 ?>
						<div class="h20"></div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<?php echo na_widget('basic-title', 'title-2', 'height=35%', 'auto=0 nav=1'); //타이틀 ?>
						<div class="h20"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- .nt-index -->