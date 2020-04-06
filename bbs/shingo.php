<?php
include_once('./_common.php');

if(!$is_member)
	alert('회원만 이용 가능합니다.', G5_URL);

// 스킨경로
$shingo_skin_path = NA_PLUGIN_PATH.'/skin/shingo/'.$nariya['shingo_skin'];
$shingo_skin_url = NA_PLUGIN_URL.'/skin/shingo/'.$nariya['shingo_skin'];

$g5['title'] = '신고모음';
include_once('./_head.php');

if($is_admin) {
	$sql_common = " from {$g5['na_shingo']} ";
} else {
	$sql_common = " from {$g5['na_shingo']} where flag = '0' ";
}
$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = G5_IS_MOBILE ? $config['cf_mobile_page_rows'] : $config['cf_new_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$list = array();
if($is_admin) {
	$sql = " select * {$sql_common} order by flag desc, id desc limit {$from_record}, {$rows} ";
} else {
	$sql = " select * {$sql_common} order by id desc limit {$from_record}, {$rows} ";
}
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $tmp_write_table = $g5['write_prefix'].$row['bo_table'];

    if (!$row['wr_parent']) {

        // 원글
        $comment = "";
        $comment_link = "";
        $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
        $list[$i] = $row2;

		$onclick = "na_shingo('".$row['bo_table']."', '".$row['wr_id']."');";
        $name = get_sideview($row2['mb_id'], get_text(cut_str($row2['wr_name'], $config['cf_cut_name'])), $row2['wr_email'], $row2['wr_homepage']);

	} else {

        // 코멘트
        $comment = '[코] ';
        $comment_link = '#c_'.$row['wr_id'];
        $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_parent']}' ");
        $row3 = sql_fetch(" select mb_id, wr_name, wr_email, wr_homepage, wr_datetime from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
        $list[$i] = $row2;
        $list[$i]['wr_id'] = $row['wr_id'];
        $list[$i]['mb_id'] = $row3['mb_id'];
        $list[$i]['wr_name'] = $row3['wr_name'];
        $list[$i]['wr_email'] = $row3['wr_email'];
        $list[$i]['wr_homepage'] = $row3['wr_homepage'];

		$onclick = "na_shingo('".$row['bo_table']."', '".$row['wr_id']."', '".$row['wr_parent']."');";
        $name = get_sideview($row3['mb_id'], get_text(cut_str($row3['wr_name'], $config['cf_cut_name'])), $row3['wr_email'], $row3['wr_homepage']);
    }

    $list[$i]['flag'] = $row['flag'];
    $list[$i]['mb_ids'] = $row['mb_id'];
    $list[$i]['onclick'] = $onclick;
    $list[$i]['bo_table'] = $row['bo_table'];
    $list[$i]['name'] = $name;
    $list[$i]['comment'] = $comment;
    $list[$i]['href'] = get_pretty_url($row['bo_table'], $row2['wr_id'], $comment_link);
    $list[$i]['wr_subject'] = $row2['wr_subject'];
    $list[$i]['regdate'] = $row['regdate'];
}

$write_pages = get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "?page=");

include_once($shingo_skin_path.'/shingo.skin.php');

include_once('./_tail.php');
?>