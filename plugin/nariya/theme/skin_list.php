<?php
include_once ('./_common.php');

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
	die('���ٱ����� �����ϴ�.');
}

if(!$board['bo_table'])
	die('�������� �ʴ� �Խ����Դϴ�.');

include_once(NA_PLUGIN_PATH.'/lib/option.lib.php');

$is_skin = $board_skin_path.'/'.$type.'/'.$skin.'/setup.skin.php';
if(is_file($is_skin)) {
	@include_once($is_skin);
}
?>