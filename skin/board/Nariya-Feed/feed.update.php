<?php
include_once('./_common.php');

if(!$is_admin) {
	alert('접권권한이 없습니다.');
}

$count = count($_POST['chk_wr_id']);

if(!$count) {
    alert($_POST['btn_submit'].' 하실 항목을 하나 이상 선택하세요.');
}

$temp = array();

if($_POST['btn_submit'] == '수집제외') {
	$temp = $_POST['chk_wr_id'];
	for ($i=0; $i < $count; $i++) {

		// 글업데이트
		sql_query(" update $write_table set wr_1 = '1' where wr_id = '{$temp[$i]}' ", false);

		// 최근게시물 삭제
		sql_query(" delete from {$g5['board_new_table']} where bo_table = '$bo_table' and wr_parent = '{$temp[$i]}' ", false);
	}
} else {
    alert('올바른 방법으로 이용해 주세요.');
}

goto_url(short_url_clean(G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;page='.$page.$qstr));

?>