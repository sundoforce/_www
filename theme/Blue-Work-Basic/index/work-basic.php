<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 사이드 위치 설정 - left, right
$side = 'right';

?>
<style>
	.widget-main-box { background-color: #ffffff; border-radius: 2px; border: 1px solid #ddd; margin-bottom: 10px; }
    .widget-main-box h3 { color: #363838; font-size: 13px; font-weight: bold; font-family: 'Open Sans Bold', sans-serif; margin: 0; padding: 15px; }
    .widget-main-box .divline { height: 1px; line-height: 1px; border-bottom: solid 1px rgba(230, 230, 230, 0.5); }
    .widget-small-box { padding: 15px; }
    .more { display: block; margin-right: 12px; margin-top: 12px; opacity: 0.5; }
    .more:hover { display: block; margin-right: 12px; margin-top: 12px; opacity: 0.9; }
    .col-sm-4 { padding-right:0px; margin-right:-5px;}
    .last-box { padding-right:5px; }
    @media (max-width:991px) { .col-sm-4 { padding-right:20px; } .last-box { padding-right:20px; } }
</style>

<!--<?php
// WING
if($nt_wing_path)
    @include_once ($nt_wing_path.'/wing.php');
?>-->

<div class="nt-container">
	<div class="row nt-row">
		<!-- 메인 영역 -->
		<div class="col-md-9<?php echo ($side == "left") ? ' pull-right' : '';?> nt-col nt-main">

			<?php echo na_widget('basic-title', 'title-1', 'height=25%', 'auto=0'); //타이틀 ?>

			<div class="h10"></div>

			<div class="row">
				<div class="col-sm-4">

                    <!-- 위젯 시작 -->
					<div class="widget-main-box">
                        <a href="<?php echo G5_BBS_URL ?>/new.php?view=w">
                            <span class="pull-right more">
                                <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                            </span>
                        </a>
                        <h3>최근글</h3>
                        <div class="divline"></div>
                            <div class="widget-small-box">
                                <?php echo na_widget('basic-wr-list', 'tlist-1'); ?>
                        </div>
                    </div>
                    <!-- 위젯 끝 -->

				</div>
				<div class="col-sm-4">

					<!-- 위젯 시작 -->
					<div class="widget-main-box">
                        <a href="<?php echo G5_BBS_URL ?>/new.php?view=c">
                            <span class="pull-right more">
                                <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                            </span>
                        </a>
                        <h3>새댓글</h3>
                        <div class="divline"></div>
                            <div class="widget-small-box">
                                <?php echo na_widget('basic-wr-comment-list', 'tlist-2'); ?>
                        </div>
                    </div>
                    <!-- 위젯 끝 -->

				</div>
				<div class="col-sm-4 last-box">

					<!-- 위젯 시작 -->
					<div class="widget-main-box">
                        <a href="<?php echo get_pretty_url('notice'); ?>">
                            <span class="pull-right more">
                                <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                            </span>
                        </a>
                        <h3>오늘의 추천글</h3>
                        <div class="divline"></div>
                            <div class="widget-small-box">
                                <?php echo na_widget('basic-wr-list', 'tlist-3'); ?>
                        </div>
                    </div>
                    <!-- 위젯 끝 -->

				</div>
			</div>

			<!-- 갤러리 시작 -->
			<div class="widget-main-box">
                 <a href="<?php echo get_pretty_url('music'); ?>">
                     <span class="pull-right more">
                          <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                     </span>
                 </a>
                 <h3>음악</h3>
                 <div class="divline"></div>
                 <div class="widget-small-box">
                     <?php echo na_widget('basic-wr-gallery', 'gallery-1'); ?>
                 </div>
            </div>
            <!-- 갤러리 끝 -->

			<div class="row">
				<div class="col-sm-4">

                    <!-- 위젯 시작 -->
					<div class="widget-main-box">
                        <a href="<?php echo get_pretty_url('qna'); ?>">
                            <span class="pull-right more">
                                <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                            </span>
                        </a>
                        <h3>토론|질문답변|팁|강좌</h3>
                        <div class="divline"></div>
                            <div class="widget-small-box">
                                <?php echo na_widget('basic-wr-list', 'tlist-4'); ?>
                        </div>
                    </div>
                    <!-- 위젯 끝 -->

				</div>
				<div class="col-sm-4">

					<!-- 위젯 시작 -->
					<div class="widget-main-box">
                        <a href="<?php echo get_pretty_url('free'); ?>">
                            <span class="pull-right more">
                                <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                            </span>
                        </a>
                        <h3>자유게시판</h3>
                        <div class="divline"></div>
                            <div class="widget-small-box">
                                <?php echo na_widget('basic-wr-list', 'tlist-5'); ?>
                        </div>
                    </div>
                    <!-- 위젯 끝 -->

				</div>
				<div class="col-sm-4 last-box">

					<!-- 위젯 시작 -->
					<div class="widget-main-box">
                        <a href="<?php echo get_pretty_url('pds'); ?>">
                            <span class="pull-right more">
                                <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                            </span>
                        </a>
                        <h3>자료실</h3>
                        <div class="divline"></div>
                            <div class="widget-small-box">
                                <?php echo na_widget('basic-wr-list', 'tlist-6'); ?>
                        </div>
                    </div>
                    <!-- 위젯 끝 -->

				</div>
			</div>

			<!-- 갤러리 시작 -->
			<div class="widget-main-box">
                 <a href="<?php echo get_pretty_url('free'); ?>">
                     <span class="pull-right more">
                          <img src="<?php echo G5_THEME_URL ?>/img/more-icon.png">
                     </span>
                 </a>
                 <h3>게시판</h3>
                 <div class="divline"></div>
                 <div class="widget-small-box">
                     <?php echo na_widget('basic-banner', 'banner-2'); ?>
                 </div>
            </div>
            <!-- 갤러리 끝 -->

		</div>
		<!-- 사이드 영역 -->
		<div class="col-md-3<?php echo ($side == "left") ? ' pull-left' : '';?> nt-col nt-side">
			<?php 
				// layout/side에서 가져옴
				list($nt_side_url, $nt_side_path) = na_layout_content('side', 'work-basic'); // side-basic 폴더
				@include_once($nt_side_path.'/side.php') 
			?>
		</div>
	</div>
</div>
