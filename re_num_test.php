<?php
include_once("_common.php");

//////////////////////////////////////////////////
//
// 다시 정렬할 게시판을 입력해주세요.
//


$bo_table = "qna"; // 테이블 명 ---

//////////////////////////////////////////////////

if ($is_admin != 'super')  die("로그인 해주세요.");

if (!$bo_table) die("bo_table 값이 없습니다.");

$write_table = $g5[write_prefix].$bo_table;
echo $write_table ;
$data = array();

$sql = "select wr_id, wr_num from {$write_table} where wr_is_comment=0 and wr_reply='' order by wr_datetime";
$qry = sql_query($sql);
while ($row = sql_fetch_array($qry)) $data[] = $row;

sql_query("update {$write_table} set wr_num = wr_num * -1");

$wr_num = 0;

foreach ($data as $row)
{
    $wr_num--;
    $row[wr_num] *= -1;

    $sql = "update {$write_table} set wr_num = '{$wr_num}' where wr_num = '{$row[wr_num]}'";
    echo "$sql<br>";
    sql_query($sql);
}

echo "완료하였습니다.";

?>