<?php
include_once('./_common.php');

if (isset($_REQUEST['sort']))  {
    $sort = trim($_REQUEST['sort']);
    $sort = preg_replace("/[\<\>\'\"\%\=\(\)\s]/", "", $sort);
} else {
    $sort = '';
}

//태그삭제, 리카운트
if($is_admin == 'super' && $opt) {

	if($opt == 'del') {
		$cn = $_POST['chk_id'];
		$cnt = count($cn);
		for($i=0; $i < $cnt; $i++) {
			$n = $cn[$i];
			$id = $_POST['id'][$n];

			if(!$id) continue;

			// 태그 삭제 - 로그 없는 태그도 삭제
			sql_query(" delete from {$g5['na_tag']} where id = '$id' or cnt = '0' ", false);

			// 태그로그 삭제
			sql_query(" delete from {$g5['na_tag_log']} where tag_id = '$id' ", false);
		}
	} else if($opt == 'cnt') {
		// 등록일이 없는 태그로그 삭제
        sql_query(" delete from {$g5['na_tag_log']} where it_time = '0000-00-00 00:00:00' ", false);

		$result = sql_query(" select * from {$g5['na_tag']} ", false);
	    while ($row = sql_fetch_array($result)) {
			$cnt = sql_fetch(" select count(*) as cnt from {$g5['na_tag_log']} where tag_id = '{$row['id']}' ", false);
			if($row['cnt'] != $cnt['cnt']) {
				sql_query("update {$g5['na_tag']} set cnt = '{$cnt['cnt']}' where id = '{$row['id']}'", false);
			}
		}
	}

	$go_url = './tag.php';
	if($sort) 
		$go_url .= '?sort='.$sort;

	goto_url($go_url);
}

// 스킨
$tag_skin_path = NA_PLUGIN_PATH.'/skin/tag/'.$nariya['tag_skin'];
$tag_skin_url = NA_PLUGIN_URL.'/skin/tag/'.$nariya['tag_skin'];

// 검색결과
if($q || $stx) {
	$q = ($stx) ? $stx : $q;
	$q = strip_tags($q);
	$q = get_search_string($q); // 특수문자 제거

    $op1 = '';

    // 검색어를 구분자로 나눈다. 여기서는 공백
    $s = explode(',', strip_tags($q));

    // 검색필드를 구분자로 나눈다. 여기서는 +
    $field = array('tag');

    $str = '(';
    for ($i=0; $i<count($s); $i++) {
        if (trim($s[$i]) == '') continue;

        $search_str = $s[$i];

        // 인기검색어
        //insert_popular($field, $search_str);

        $str .= $op1;
        $str .= "(";

        $op2 = '';
        // 필드의 수만큼 다중 필드 검색 가능 (필드1+필드2...)
        for ($k=0; $k<count($field); $k++) {
            $str .= $op2;
			
			if($eq) { //포함일 경우
				if (preg_match("/[a-zA-Z]/", $search_str))
					$str .= "INSTR(LOWER({$field[$k]}), LOWER('{$search_str}'))";
				else
					$str .= "INSTR({$field[$k]}, '{$search_str}')";
			} else { //일치
				$str .= "{$field[$k]} = '{$search_str}'";
			}
            $op2 = " or ";
        }
        $str .= ")";

        $op1 = " or ";

    }
    $str .= ")";

    $sql_search = $str;

	$sql_common = "from {$g5['na_tag_log']} where $str group by it_id, bo_table, wr_id";

	$row = sql_query(" select count(*) as cnt $sql_common ");
	$total_cnt = @sql_num_rows($row);

    $rows = (G5_IS_MOBILE) ? $config['cf_mobile_page_rows'] : $config['cf_page_rows'];

	$total_count = (int)$total_cnt;
	$total_page  = ceil($total_count / $rows);
	$page = ($page > 1) ? $page : 1;
	$start_rows = ($page - 1) * $rows;
	$result = sql_query(" select * $sql_common order by id desc limit $start_rows, $rows ", false);
	for ($i=0; $row=sql_fetch_array($result); $i++) { 
		$post = sql_fetch(" select * from {$g5['write_prefix']}{$row['bo_table']} where wr_id = '{$row['wr_id']}' ", false);
		$list[$i]['href'] = get_pretty_url($row['bo_table'], $row['wr_id']);
		$list[$i]['subject'] = na_get_text($post['wr_subject']);

		// 비밀글은 검색 불가
		if (strstr($post['wr_option'], 'secret'))
			$post['wr_content'] = '비밀글 입니다.';

		$list[$i]['content'] = na_cut_text($post['wr_content'], 80);
		$list[$i]['hit'] = $post['wr_hit'];
		$list[$i]['comment'] = $post['wr_comment'];
		$list[$i]['date'] = $post['wr_datetime'];
	}

	$write_page_rows = (G5_IS_MOBILE) ? $config['cf_mobile_pages'] : $config['cf_write_pages'];
	$list_page = $_SERVER['PHP_SELF'].'?q='.urlencode($q).'&amp;eq='.$eq.'&amp;page=';

	$tag_skin_file = $tag_skin_path.'/tag.search.skin.php';

} else {
	$rank = 10; //랭킹묶음
	$trow = 100; //페이지당 출력 태그수

	//등록태그 현황
	$row = sql_fetch(" select count(*) as cnt from {$g5['na_tag']} where cnt > 0 ");
	$total_cnt = $row['cnt'];

	$total_count = $total_cnt;
	$total_page  = ceil($total_count / $trow);
	if($page > $total_page) {
		$start_row = $trow = 0;
	} else {
		$page = ($page > 1) ? $page : 1;
		$start_row = ($page - 1) * $trow;
	}

	if($sort == 'index') {
		$idx = '';
		$result = sql_query(" select * from {$g5['na_tag']} where cnt > 0 order by type, idx, tag, cnt desc limit $start_row, $trow ");
		for ($i=0; $row=sql_fetch_array($result); $i++) {
			$list[$i] = $row;
			$list[$i]['href'] = './tag.php?q='.urlencode($row['tag']);
			$list[$i]['is_sp'] = ($idx != $row['idx']) ? true : false;
			$idx = $row['idx'];
		}
	} else if($sort == 'popular') {
		$result = sql_query(" select * from {$g5['na_tag']} where cnt > 0 order by cnt desc, type, idx, tag limit $start_row, $trow ");
		for ($i=0; $row=sql_fetch_array($result); $i++) {
			$list[$i] = $row;
			$list[$i]['rank'] = ($page > 1) ? $i + $start_row + 1 : $i + 1;
			$list[$i]['href'] = './tag.php?q='.urlencode($row['tag']);
			$list[$i]['is_sp'] = ($i%$rank == 0) ? true : false;
			$list[$i]['last'] = $i + $rank + $start_row;
		}
	} else {
		$idx = '';
		$result = sql_query(" select * from {$g5['na_tag']} where cnt > 0 order by year(lastdate) desc, month(lastdate) desc, cnt desc, type, idx, tag limit $start_row, $trow ");
		for ($i=0; $row=sql_fetch_array($result); $i++) {
			$ym = date('Ym', strtotime($row['lastdate']));
			$list[$i] = $row;
			$list[$i]['href'] = './tag.php?q='.urlencode($row['tag']);
			$list[$i]['is_sp'] = ($idx != $ym) ? true : false;
			$idx = $ym;
		}
	}

	$list_cnt = count($list);
	$write_page_rows = G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'];
	$list_page = ($sort) ? $_SERVER['PHP_SELF'].'?sort='.$sort.'&amp;page=' : $_SERVER['PHP_SELF'].'?page=';

	$tag_skin_file = $tag_skin_path.'/tag.skin.php';
}

// 타이틀
$g5['title'] = '태그모음';
include_once(G5_PATH.'/head.php');

echo '준비 중...';
//include_once($tag_skin_file);

include_once(G5_PATH.'/tail.php');
?>