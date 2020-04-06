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

<?php
// WING
if($nt_wing_path)
	@include_once ($nt_wing_path.'/wing.php');
?>

<div class="nt-index">
	<div class="nt-container">


		<div class="row nt-row">
		<!-- 메인 영역 -->
                    <div class="col-md-9<?php echo ($side == "left") ? ' pull-right' : '';?> nt-col nt-main">
                        <div class="nt-main amt-mag1">
                      	<?php echo na_widget('basic-title', 'title-1', 'height=25%', 'auto=0'); //타이틀 ?>
                        <div class="h20"></div>
                            <div class="row fix-gutters-10">
                                <div class="col-sm-6 col-xs-12">

                                    <div class="amt-widgwrap">
                                        <!-- 위젯 시작 { -->
                                        <div class="amt-widg-tit">
                                            <h3 class="h3 en">
                                                <a href="<?php echo G5_BBS_URL ?>/new.php?view=w">
                                                    <span class="pull-right more f-small">+</span>
                                                    새로운 글
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="amt-widg-con ">
<!--                                            amt-widg-cust-->
                                            <?php// echo na_widget('basic-wr-gallery', 'amt-gall-1', 'item=2 lg=2 md=2 sm=2 xs=2 rows=2'); ?>
                                            <?php echo na_widget('basic-wr-list', 'new-wr-main', 'bo_list=video ca_list=게임'); ?>

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
                                                 <a href="<?php echo G5_BBS_URL ?>/new.php?view=c">
                                                    <span class="pull-right more f-small">+</span>
                                                    최근 댓글
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="amt-widg-con">
                                            <?php// echo na_widget('basic-wr-gallery', 'amt-gall-2', 'item=2 lg=2 md=2 sm=2 xs=2 rows=2'); ?>
                                            <?php echo na_widget('basic-wr-comment-list', 'new-co-main', 'bo_list=video ca_list=게임'); ?>
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
                                        <a href="<?php echo get_pretty_url('music'); ?>">
                                            <span class="pull-right more f-small">+</span>
                                            음악
                                        </a>
                                    </h3>
                                </div>
                                <div class="amt-widg-con">
                                    <?php// echo na_widget('basic-banner', 'amt-banr-3', 'item=4 lg=4 md=3 sm=2 xs=1 '); ?>
                                    <?php echo na_widget('basic-wr-gallery', 'gallery-1', 'bo_list=video ca_list=게임 rows=8'); ?>
                                </div>
                                <!-- } 위젯 끝-->
                            </div>


                            <div class="h20"></div>

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
                        <?php //echo na_widget('basic-wr-list', 'tlist-2', 'bo_list=video ca_list=게임 rank=green'); ?>
                        <?php //echo na_widget('basic-wr-list', 'tlist-3', 'bo_list=video ca_list=게임 rank=blue'); ?>
                        <?php //echo na_widget('basic-wr-list', 'new-wr-main', 'bo_list=video ca_list=게임'); ?>
                        <?php //echo na_widget('basic-wr-comment-list', 'new-co-main', 'bo_list=video ca_list=게임'); ?>
                    </div>
        	        <!-- 사이드 영역 -->
        			<div class="col-md-3<?php echo ($side == "left") ? ' pull-left' : '';?> nt-col nt-side">
        				<?php
        					// layout/side에서 가져옴
        					list($nt_side_url, $nt_side_path) = na_layout_content('side', 'side-basic'); // side-basic 폴더
        					@include_once($nt_side_path.'/side.php')
        				?>
        			</div>
        		</div>
        	</div>
        </div><!-- .nt-index -->

