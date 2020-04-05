<?php
include_once('./_common.php');

// 메뉴 페이지
function na_menu_page() {

	$p = array();

	$p[] = array('subject'=>'전체검색', 'link'=> './'.G5_BBS_DIR.'/search.php');
	$p[] = array('subject'=>'새글모음', 'link'=> './'.G5_BBS_DIR.'/new.php');
	$p[] = array('subject'=>'현재접속자', 'link'=> './'.G5_BBS_DIR.'/current_connect.php');
	$p[] = array('subject'=>'FAQ', 'link'=> './'.G5_BBS_DIR.'/faq.php');
	$p[] = array('subject'=>'1:1문의', 'link'=> './'.G5_BBS_DIR.'/qalist.php');
	// 게시판 플러그인
	if(IS_NA_BBS) {
		$p[] = array('subject'=>'태그모음', 'link'=> './'.G5_BBS_DIR.'/tag.php');
		$p[] = array('subject'=>'신고모음', 'link'=> './'.G5_BBS_DIR.'/shingo.php');
	}
	// 쇼핑몰
	if(IS_YC) {
		$p[] = array('subject'=>'상품검색', 'link'=> './'.G5_SHOP_DIR.'/search.php');
		$p[] = array('subject'=>'히트상품', 'link'=> './'.G5_SHOP_DIR.'/listtype.php?type=1');
		$p[] = array('subject'=>'추천상품', 'link'=> './'.G5_SHOP_DIR.'/listtype.php?type=2');
		$p[] = array('subject'=>'최신상품', 'link'=> './'.G5_SHOP_DIR.'/listtype.php?type=3');
		$p[] = array('subject'=>'인기상품', 'link'=> './'.G5_SHOP_DIR.'/listtype.php?type=4');
		$p[] = array('subject'=>'할인상품', 'link'=> './'.G5_SHOP_DIR.'/listtype.php?type=5');
		$p[] = array('subject'=>'상품후기', 'link'=> './'.G5_SHOP_DIR.'/itemuselist.php');
		$p[] = array('subject'=>'상품문의', 'link'=> './'.G5_SHOP_DIR.'/itemqalist.php');
		$p[] = array('subject'=>'개인결제', 'link'=> './'.G5_SHOP_DIR.'/personalpay.php');
		$p[] = array('subject'=>'쿠폰존', 'link'=> './'.G5_SHOP_DIR.'/couponzone.php.php');
		$p[] = array('subject'=>'마이페이지', 'link'=> './'.G5_SHOP_DIR.'/mypage.php');
	}
	
	return $p;
}

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
	die('접근권한이 없습니다.');
}

switch($type) {
    case 'group':
        $sql = " select gr_id as id, gr_subject as subject
                    from {$g5['group_table']}
                    order by gr_order, gr_id ";
        break;
    case 'board':
        $sql = " select bo_table as id, bo_subject as subject, gr_id
                    from {$g5['board_table']}
                    order by bo_order, bo_table ";
        break;
    case 'content':
        $sql = " select co_id as id, co_subject as subject
                    from {$g5['content_table']}
                    order by co_id ";
        break;
    case 'category':
        $sql = " select ca_id as id, ca_name as subject
                    from {$g5['g5_shop_category_table']}
                    order by ca_id asc ";
        break;
	default:
        $sql = '';
        break;
}

$list = array();

$is_sql = false;
if($sql) {
	$is_sql = true;
	$result = sql_query($sql);
    for($i=0; $row=sql_fetch_array($result); $i++) {
		$list[$i] = $row;
	}
} if($type == 'page') {
	$is_sql = true;
	$list = na_menu_page();
}

if($is_sql) {

	for($i=0; $i < count($list); $i++) {
		$row = $list[$i];

	if($i == 0) {

	if($type == 'board') {
	    $bbs_subject_title = '게시판 제목';
	} else if($type == 'category') {
	    $bbs_subject_title = '분류명';
	} else {
	    $bbs_subject_title = '제목';
	}
?>

    <table class="table table-hover f-small">
    <thead>
    <tr class="bg-na-navy">
        <th scope="col"><?php echo $bbs_subject_title; ?></th>
        <?php if($type == 'board'){ ?>
            <th scope="col">게시판 그룹</th>
        <?php } else if($type == 'category'){ ?>
            <th scope="col">분류코드</th>
        <?php } ?>
		<th scope="col" class="text-center" style="width:70px;">선택</th>
    </tr>
    </thead>
    <tbody>

<?php }
        switch($type) {
            case 'group':
                $link = './'.G5_BBS_DIR.'/group.php?gr_id='.$row['id'];
                break;
            case 'board':
                $link = './'.G5_BBS_DIR.'/board.php?bo_table='.$row['id'];
                break;
            case 'content':
                $link = './'.G5_BBS_DIR.'/content.php?co_id='.$row['id'];
                break;
            case 'category':
                $link = './'.G5_SHOP_DIR.'/list.php?ca_id='.$row['id'];
                break;
            case 'page':
                $link = $row['link'];
                break;
			default:
                $link = '';
                break;
        }

?>

    <tr>
        <td><p class="form-control-static"><?php echo $row['subject']; ?></p></td>
        <?php
        if($type == 'board'){
        $group = get_call_func_cache('get_group', array($row['gr_id']));
        ?>
        <td><p class="form-control-static"><?php echo $group['gr_subject']; ?></p></td>
        <?php } else if($type == 'category'){ ?>
        <td><p class="form-control-static"><?php echo $row['id']; ?></p></td>
		<?php } ?>
        <td class="text-center">
            <input type="hidden" name="subject[]" value="<?php echo preg_replace('/[\'\"]/', '', $row['subject']); ?>">
            <input type="hidden" name="link[]" value="<?php echo $link; ?>">
            <button type="button" class="add_select btn btn-na-red btn-sm"><span class="sound_only"><?php echo $row['subject']; ?> </span>선택</button>
        </td>
    </tr>

<?php } ?>

    </tbody>
    </table>

<?php } else { ?>

	<ul class="list-group f-small">
		<li class="list-group-item">
			<div class="form-group">
				<label class="col-xs-2 control-label" for="me_name">메뉴<strong class="sr-only"> 필수</strong></label>
				<div class="col-xs-10">
					<input type="text" name="me_name" id="me_name" required class="form-control required" placeholder="Text">
				</div>
			</div>
		</li>
		<li class="list-group-item">
			<div class="form-group">
				<label class="col-xs-2 control-label" for="me_link">링크<strong class="sr-only"> 필수</strong></label>
				<div class="col-xs-10">
					<input type="text" name="me_link" id="me_link" required class="form-control required" placeholder="http://...">
					<p class="help-block">
						그누 루트(./)와 테마 루트(../)는 자동으로 연결됩니다.
					</p>
				</div>
			</div>
		</li>
		<li class="list-group-item">
			<button type="button" id="add_manual" class="btn btn-na-red btn-block">추가하기</button>
		</li>
	</ul>
<?php } ?>
