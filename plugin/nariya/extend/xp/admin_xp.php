<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
global $config, $g5, $stx, $sst, $sod, $sfl, $page;

if(isset($_POST['post_action']) && isset($_POST['token'])){

	check_demo();

	check_admin_token();

	// 페이지 이동
	$url = G5_ADMIN_URL.'/view.php?call=nariya_xp';
	if($qstr)
		$url .= '&amp;'.$qstr;

	if($_POST['post_action'] == 'insert') {

		auth_check($auth[$this->na_xp_number], 'w');

		$mb_id = strip_tags($_POST['mb_id']);
		$xp_point = strip_tags($_POST['xp_point']);
		$xp_content = strip_tags($_POST['xp_content']);
	
		$mb = get_member($mb_id);

		if (!$mb['mb_id'])
		    alert('존재하는 회원아이디가 아닙니다.');

		if (($xp_point < 0) && ($xp_point * (-1) > $mb['as_exp']))
		    alert('경험치를 깎는 경우 현재 경험치보다 작으면 안됩니다.');

		na_insert_xp($mb_id, $xp_point, $xp_content, '@passive', $mb_id, $member['mb_id'].'-'.uniqid(''));

	} else if($_POST['post_action'] == 'delete') {

		auth_check($auth[$this->na_xp_number], 'd');

		$count = count($_POST['chk']);
		if(!$count)
			alert($_POST['act_button'].' 하실 항목을 하나 이상 체크하세요.');

		for ($i=0; $i<$count; $i++) {

			// 실제 번호를 넘김
			$k = $_POST['chk'][$i];
			$xp_id = (int) $_POST['xp_id'][$k];
			$str_mb_id = sql_real_escape_string($_POST['mb_id'][$k]);

			// 경험치 내역정보
			$row = sql_fetch(" select * from {$g5['na_xp']} where xp_id = '{$xp_id}' ");

			if(!$row['xp_id'])
				continue;

			// 경험치 내역삭제
			sql_query(" delete from {$g5['na_xp']} where xp_id = '{$xp_id}' ");

			// 경험치 정리
			na_sum_xp(get_member($str_mb_id));
		}
	}

	goto_url($url);
}

auth_check($auth[$this->na_xp_number], 'r');


$sql_common = " from {$g5['na_xp']} ";

$sql_search = " where (1) ";

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_id' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "xp_id";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$mb = array();
if ($sfl == 'mb_id' && $stx)
    $mb = get_member($stx);

$colspan = 7;

if (strstr($sfl, "mb_id"))
    $mb_id = $stx;
else
    $mb_id = "";
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    <span class="btn_ov01"><span class="ov_txt">전체 </span><span class="ov_num"> <?php echo number_format($total_count) ?> 건 </span></span>
    <?php
    if (isset($mb['mb_id']) && $mb['mb_id']) {
        echo '&nbsp;<span class="btn_ov01"><span class="ov_txt">' . $mb['mb_id'] .' 님 경험치 합계 </span><span class="ov_num"> ' . number_format($mb['as_exp']) . '</span></span>';
    } else {
        $row2 = sql_fetch(" select sum(xp_point) as sum_point from {$g5['na_xp']} ");
        echo '&nbsp;<span class="btn_ov01"><span class="ov_txt">전체 합계</span><span class="ov_num">'.number_format($row2['sum_point']).'</span></span>';
    }
    ?>
</div>

<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
<input type="hidden" name="call" value="nariya_xp">
<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id"); ?>>회원아이디</option>
    <option value="xp_content"<?php echo get_selected($_GET['sfl'], "xp_content"); ?>>내용</option>
</select>
<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
<input type="submit" class="btn_submit" value="검색">
</form>

<form name="fpointlist" id="fpointlist" method="post" onsubmit="return fpointlist_submit(this);">
<input type="hidden" name="call" value="nariya_xp">
<input type="hidden" name="post_action" value="delete">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">
            <label for="chkall" class="sound_only">경험치 내역 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col"><?php echo subject_sort_link('mb_id') ?>회원아이디</a></th>
        <th scope="col">이름</th>
        <th scope="col">닉네임</th>
        <th scope="col"><?php echo subject_sort_link('po_content') ?>경험치 내용</a></th>
        <th scope="col"><?php echo subject_sort_link('po_point') ?>경험치</a></th>
        <th scope="col"><?php echo subject_sort_link('po_datetime') ?>일시</a></th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        if ($i==0 || ($row2['mb_id'] != $row['mb_id'])) {
            $sql2 = " select mb_id, mb_name, mb_nick, mb_email, mb_homepage, mb_point from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
            $row2 = sql_fetch($sql2);
        }

        $mb_nick = get_sideview($row['mb_id'], $row2['mb_nick'], $row2['mb_email'], $row2['mb_homepage']);

        $link1 = $link2 = '';
        if (!preg_match("/^\@/", $row['xp_rel_table']) && $row['xp_rel_table']) {
            $link1 = '<a href="'.get_pretty_url($row['xp_rel_table'], $row['xp_rel_id']).'" target="_blank">';
            $link2 = '</a>';
        }

        $bg = 'bg'.($i%2);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td class="td_chk">
            <input type="hidden" name="mb_id[<?php echo $i ?>]" value="<?php echo $row['mb_id'] ?>" id="mb_id_<?php echo $i ?>">
            <input type="hidden" name="xp_id[<?php echo $i ?>]" value="<?php echo $row['xp_id'] ?>" id="xp_id_<?php echo $i ?>">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo $row['xp_content'] ?> 내역</label>
            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
        </td>
        <td class="td_left"><a href="?sfl=mb_id&amp;stx=<?php echo $row['mb_id'] ?>"><?php echo $row['mb_id'] ?></a></td>
        <td class="td_left"><?php echo get_text($row2['mb_name']); ?></td>
        <td class="td_left sv_use"><div><?php echo $mb_nick ?></div></td>
        <td class="td_left"><?php echo $link1 ?><?php echo $row['xp_content'] ?><?php echo $link2 ?></td>
        <td class="td_num td_pt"><?php echo number_format($row['xp_point']) ?></td>
        <td class="td_datetime"><?php echo $row['xp_datetime'] ?></td>
    </tr>

    <?php
    }

    if ($i == 0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>

<div class="btn_fixed_top">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
</div>

</form>

<?php 
$qstr = ($qstr) ? $qstr.'&amp;call=nariya_xp' : 'call=nariya_xp';
echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page=");
?>

<section id="point_mng">
    <h2 class="h2_frm">개별회원 경험치 증감 설정</h2>

    <form name="fpointlist2" method="post" id="fpointlist2" autocomplete="off">
	<input type="hidden" name="call" value="nariya_xp">
	<input type="hidden" name="post_action" value="insert">
	<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
	<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="<?php echo $token ?>">

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="mb_id">회원아이디<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="mb_id" value="<?php echo $mb_id ?>" id="mb_id" class="required frm_input" required></td>
        </tr>
        <tr>
            <th scope="row"><label for="xp_content">경험치 내용<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="xp_content" id="xp_content" required class="required frm_input" size="80"></td>
        </tr>
        <tr>
            <th scope="row"><label for="xp_point">경험치<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="xp_point" id="xp_point" required class="required frm_input"></td>
        </tr>
        </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit btn">
    </div>

    </form>

</section>

<script>
function fpointlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}
</script>
