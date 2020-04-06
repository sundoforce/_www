<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 사이드 위치 설정 - left, right
$side = ($tset['index_side']) ? $tset['index_side'] : 'right';

add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/theme/amt-theme-k2/amt/misc/themify-icons/themify-icons.css" type="text/css">',1);
add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/theme/amt-theme-k2/index/amt/css/amt-mag1.css" type="text/css">',1);
?>

<style>
    #nt_body {
        overflow: visible;
    }

    .nt-index {
        overflow: hidden;
    }
</style>



<div class="h20"></div>

<?php echo na_widget('basic-title', 'title-1', 'height=25%', 'auto=0'); //타이틀 ?>


<!-- 메인 영역 -->

<div class="nt-main amt-mag1">


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
        <div class="amt-widg-con amt-widg-cust">
           <?php echo na_widget('basic-wr-list', 'new-wr', 'bo_list=video ca_list=게임'); ?>

        </div>
        <!-- } 위젯 끝-->
               <!-- 위젯 시작 { -->
                <div class="amt-widg-tit">
                    <h3 class="h3 en">
                        <a href="<?php echo G5_BBS_URL ?>/new.php?view=c">

                            <span class="pull-right more f-small">+</span>
                            최근 댓글
                        </a>
                    </h3>
                </div>
                <div class="amt-widg-con amt-widg-cust">
                    <?php echo na_widget('basic-wr-comment-list', 'new-co', 'bo_list=video ca_list=게임'); ?>

                </div>
                <!-- } 위젯 끝-->
    </div>

    <?php // echo na_widget('basic-wr-comment-list', 'new-co', 'bo_list=video ca_list=게임'); ?>
    <?php //echo na_widget('basic-wr-list', 'new-wr', 'bo_list=video ca_list=게임'); ?>

</div>