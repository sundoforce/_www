<?php
include_once('./_common.php');

$shingo = (int)$boset['na_shingo'];

if (IS_NA_BBS && $shingo) {
	;
} else {
	die('이 게시판은 신고 기능을 사용하지 않습니다.');
}

if (!$is_member) {
	die('회원만 가능합니다.');
}

if (!$write['wr_id']) {
	die('존재하지 않는 게시물입니다.');
}

// 원글 아이디
$wr_parent = (int)$c_id;

// 옵션 분해
list($html, $secret, $mail) = explode(",", $write['wr_option']);

// 옵션 설정
if($wr_parent) { // 댓글
	$lock = 'secret';
	$unlock = '';
} else {
	$lock = $html.',secret,'.$mail;
	$unlock = $html.',,'.$mail;
}

// 관리자는 바로 잠금/해제를 함
if($is_admin) {

	// 잠금처리된 글이면 해제함
	if($write['as_type'] == "-1") {

		// 신고해제
		sql_query(" update {$g5['na_shingo']} set flag = '-1', mb_id = '' where bo_table = '$bo_table' and wr_id = '$wr_id' ", false);

		// 잠금해제
		sql_query(" update $write_table set wr_option = '$unlock', as_type = '0' where wr_id = '$wr_id' ", false);

		die('신고해제를 하였습니다.');

	} else {

		// 신고 내역
		$row = sql_fetch(" select * from {$g5['na_shingo']} where bo_table = '$bo_table' and wr_id = '$wr_id' ", false);
		if($row['id']) {

			// 신고자
			$mbs = array();
			$tmp = explode(",", trim($row['mb_id']));
			for($i=0; $i < count($tmp); $i++) {
				if(!trim($tmp[$i]))
					continue;

				$mbs[] = $tmp[$i];
			}

			if(count($mbs)) {
				array_push($mbs, $member['mb_id']);
				$mb_ids = implode(",", $mbs);
			} else {
				$mb_ids = $member['mb_id'];
			}

			// 신고처리
			sql_query(" update {$g5['na_shingo']} set flag = '1', mb_id = '$mb_ids' where id = '{$row['id']}' ", false);

		} else {
			// 신규등록
		    sql_query(" insert into {$g5['na_shingo']} 
				set bo_table = '$bo_table',
					wr_id = '$wr_id',
					wr_parent = '$wr_parent',
					mb_id = '{$member['mb_id']}',
					flag = '1',
					regdate = '".G5_TIME_YMDHIS."' ", false);

		}

		// 게시물 잠금처리
		sql_query(" update $write_table set wr_option = '$lock', as_type = '-1' where wr_id = '$wr_id' ", false);

		die('신고처리를 하였습니다.');
	}

} else {

	// 일반회원
	if($write['as_type'] == "-1") {
		die('이미 신고처리된 게시물입니다.');
	}

	if($write['mb_id']) {
		if(is_admin($write['mb_id'])) {
			die('관리자 글은 신고할 수 없습니다.');
		}

		if($nariya['cf_admin'] && in_array($write['mb_id'], explode(",", $nariya['cf_admin']))) {
			die('관리자 글은 신고할 수 없습니다.');
		}

		if($nariya['cf_group'] && in_array($write['mb_id'], explode(",", $nariya['cf_group']))) {
			die('관리자 글은 신고할 수 없습니다.');
		}

		if($boset['bo_admin'] && in_array($write['mb_id'], explode(",", $boset['bo_admin']))) {
			die('관리자 글은 신고할 수 없습니다.');
		}

		if($write['mb_id'] == $member['mb_id']) {
			die('자신의 게시물은 신고할 수 없습니다.');
		}
	}

	// 신고 내역
	$row = sql_fetch(" select * from {$g5['na_shingo']} where bo_table = '$bo_table' and wr_id = '$wr_id' ", false);

	if($row['id']) {
		// 신고자
		$mbs = array();
		$tmp = explode(",", trim($row['mb_id']));
		for($i=0; $i < count($tmp); $i++) {
			if(!trim($tmp[$i]))
				continue;

			$mbs[] = $tmp[$i];
		}

		$is_lock = false;
		if(count($mbs)) {
			if(in_array($member['mb_id'], $mbs)) {
				die('이미 신고하셨습니다.');
			}
			array_push($mbs, $member['mb_id']);
			$mb_ids = implode(",", $mbs);
		} else {
			$mb_ids = $member['mb_id'];
		}

		// 잠금 체크
		if(count(explode(",", $mb_ids)) >= $shingo) {
			// 신고처리
			sql_query(" update {$g5['na_shingo']} set flag = '1', mb_id = '$mb_ids' where id = '{$row['id']}' ", false);

			// 게시물 잠금처리
			sql_query(" update $write_table set wr_option = '$lock', as_type = '-1' where wr_id = '$wr_id' ", false);
		} else {
			// 신고처리
			sql_query(" update {$g5['na_shingo']} set flag = '0', mb_id = '$mb_ids' where id = '{$row['id']}' ", false);
		}

	} else {

		// 바로 잠금체크
		$flag = ($shingo == "1") ? 1 : 0;

		// 신규등록
	    sql_query(" insert into {$g5['na_shingo']} 
			set bo_table = '$bo_table',
				wr_id = '$wr_id',
				wr_parent = '$wr_parent',
				mb_id = '{$member['mb_id']}',
				flag = '$flag',
				regdate = '".G5_TIME_YMDHIS."' ", false);

		if($flag) {
			// 게시물 잠금처리
			sql_query(" update $write_table set wr_option = '$lock', as_type = '-1' where wr_id = '$wr_id' ", false);
		}
	}

	die('신고하셨습니다.');
}

?>