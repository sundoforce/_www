<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$cache_time = $_POST['cache_time'];
$page_cnt = $_POST['page_cnt'];
if($_POST['page_cnt'] < 100) alert("페이지 개수는 100보다 큰수만 입력가능합니다.");

$sql = sql_query(" update g_analytics set cache_time = '{$cache_time}', page_cnt = '{$page_cnt}' ");

goto_url(G5_ADMIN_URL.'/analytics/setting.php');
?>