<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');



// 출력 시작

$DracoCounter_URL  = G5_PLUGIN_URL  ."/DracoCounter";  // 활성도통계 설치폴더
$DracoCounter_PATH = G5_PLUGIN_PATH ."/DracoCounter";  // 활성도통계 절대경로

$g5[title] = "사이트 키워드 유입분석";

$day=2; //기간 - 기본검색설정된 기간입니다. 필요에따라 수정해서 사용가능합니다.

if (empty($fr_date)) $fr_date = date("Y-m-d", G5_SERVER_TIME-86400*$day);
if (empty($to_date)) $to_date = G5_TIME_YMD;

// m3stats 설정
$limit=(strtotime($to_date)- strtotime($fr_date)) / 86400;

$pluginDracoCounter = G5_PLUGIN_PATH.'/DracoCounter/gDracoCounter.php';
include_once $pluginDracoCounter;

//$pluginDracoData = ShowDracoCounter(30, 29); // 날짜, 날짜의 가로폭 : 총 가로폭은 날짜 * 날짜가로폭

$sql_common = " from {$g5['visit_table']} ";
$sql_search = " where vi_date between '{$fr_date}' and '{$to_date}' ";
if (isset($domain))
    $sql_search .= " and vi_referer like '%{$domain}%' ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search} ";

$colspan = 5;
?>
<link href="<?php echo G5_URL; ?>/page/keyword_analyzer/css/bootstrap-table.css" rel="stylesheet">
<style type="text/css">
#m3 .form-control { height: 30px; font-size: 12px; }
#m3 .body-top { border-bottom: dotted 1px #ddd; padding-bottom:5px; }
#m3 .body-xs-top { border-bottom: dotted 1px #ddd; padding:5px 15px;; }
#m3 .btn_submit { padding: 5px; line-height: 12px; }
</style>

<?php
// 날짜 설정
if(!$fr_date) $fr_date = date("Y-m-d", strtotime("0 days ago"));
if(!$to_date) $to_date = G5_TIME_YMD;

// 주사 지랄 방지
$fr_date = substr($fr_date, 0, 10);
$to_date = substr($to_date, 0, 10);
$site = substr($site, 0, 10);
$site_ori = $site;

// 검색사이트들
$site_arr = array("Bing", "daum", "google", "naver");
$surl_arr = array("google" => "http://www.google.%", "Nate" => "%nate.com%", "Yahoo" => "%search.yahoo.com%", "naver" => "%search.naver.com%", "daum" => "%search.daum.net%", "Bing" => "http://www.bing.com%");
$svar_arr = array("google" => "q", "Nate" => "q", "Yahoo" => "p", "daum" => "q", "naver" => "query", "Bing" => "q");
?>

<div class="h15"></div>
<div class="panel panel-default" id="m3">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-6">
				<h3 class="panel-title">
					<i class="fa fa-eye key"></i>&nbsp;<strong>Keyword analyzer</strong>
				</h3>
			</div>
			<div class="col-xs-6 hidden-xs text-right">
				<form name="fvisit" id="fvisit" class="local_sch02 local_sch" method="get" action="<?php echo $_SERVER[PHP_SELF];?>">
				<div class="sch_last">
					<strong>기간검색</strong>&nbsp;
						<input type="hidden" name="site" value="<?php echo $site_ori;?>">
						<input type="hidden" name="hid" value="<?php echo $hid;?>">
						<input type="text" name="fr_date" value="<?php echo $fr_date ?>" id="fr_date" class="frm_input" size="11" maxlength="10">
					<label for="fr_date" class="sound_only">시작일</label>
					 ~
						<input type="text" name="to_date" value="<?php echo $to_date ?>" id="to_date" class="frm_input" size="11" maxlength="10">
					<label for="to_date" class="sound_only">종료일</label>
						<input type="submit" value="검색" class="btn_submit">
				</div>
				</form>
			</div>
		</div>
	</div>

		<?php
          // vi_referer에서 사이트 찾고, vi_date로 범위 정하기, 정렬은 vi_id 역순 (속도 개선 필요)
          if(in_array($site_ori, $site_arr)) {
			$where1 = "vi_referer LIKE '{$surl_arr[$site_ori]}' ";
          }
          else { // 5개 사이트 모두 포함
			$where1 = " ( ";
			foreach($surl_arr as $site => $surl) {
		    	$where1 .= " vi_referer LIKE '$surl' OR ";
          	}
	          $where1 .= " 0 )";
          }

          $query = sql_query("select * from ".$g5['visit_table']." where $where1 AND vi_date>='$fr_date' AND vi_date<='$to_date' order by vi_id desc");
        ?>

	<div class="panel-body">
		<table width="100%" data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
			<thead>
				<tr>
					<th data-field="id" data-checkbox="false"  data-sortable="false" class="text-center">No</th>
					<th data-field="ip" data-sortable="true" class="text-center">IP</th>
					<th data-field="date" data-sortable="true" class="text-center">일시</th>
					<th data-field="key" data-sortable="true" class="text-center">검색어</th>
					<th data-field="trace" data-sortable="false" class="text-center">경로</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$cnt = 0;
				$cnt2 = array();
				while($row = sql_fetch_array($query)) {
					// 어느 사이트인지 찾기
					foreach($surl_arr as $site => $surl) {
						if(strstr($row[vi_referer], str_replace("%", "", $surl))) {
							$engine = $site;
							break;
						}
					}
					// 검색문자열 찾기
					$regex = "/(\?|&){$svar_arr[$engine]}\=([^&]*)/i";
					preg_match($regex, $row[vi_referer], $matches);
					$querystr = $matches[2];
					// 보통 검색어 사이를 +로 넘긴다
					$querystr = str_replace("+", " ", $querystr);
					// %ab 이런 식으로 된 걸 바꿔주기
					$querystr = urldecode($querystr);
					// 네이버는 unicode로 된 경우도 있어서
					if($engine=="naver") $querystr = utf8_urldecode($querystr);
					// 캐릭터셋이 utf-8인 경우는 euc-kr 고치기 (utf-8 유저는 euc-KR과 utf-8을 서로 바꿔주면 될 듯)
					$charset = mb_detect_encoding($querystr, "ASCII, euc-KR, utf-8");
					if($charset=="euc-kr") $querystr = iconv("euc-kr", "utf-8", $querystr);
					//$charset = mb_detect_encoding($querystr, "ASCII, utf-8, euc-kr");
					//if($charset=="utf-8") $querystr = iconv("utf-8", "euc-kr", $querystr);
					// 자잘한 처리들
					$querystr = trim($querystr);
					$querystr = htmlspecialchars($querystr);
					// 가끔 빈 것들도 있다 -_-
					if(!strlen($querystr)) continue;
					?>
				<tr>
					<td class="text-center"><?php echo $cnt + 1; ?></td>
					<td class="text-center font-11"><?php echo $row[vi_ip]; ?></td>
					<td class="text-center"><?php echo $row[vi_date]; ?> <?php echo $row[vi_time]; ?></td>
					<td class="text-center font-11"id="m3sqtd[$cnt]"><?php echo $querystr; ?></td>
					<td class="text-center"><a href="<?php echo $row[vi_referer]; ?>" target="_blank"><img src="<?php echo $DracoCounter_URL; ?>/images/<?php echo strtolower($engine); ?>.jpg"></a></td>
				</tr>
				<?php
				// 카운트용 변수
				$cnt++;
				$cnt2[$engine]++;
				}
				ksort($cnt2);

				// 베짱이님 제공 함수
				function utf8_urldecode($str, $chr_set='CP949') {
				$callback_function = create_function('$matches, $chr_set="'.$chr_set.'"', 'return iconv("UTF-16BE", $chr_set, pack("n*", hexdec($matches[1])));');
				return rawurldecode(preg_replace_callback('/%u([[:alnum:]]{4})/', $callback_function, $str));
				}
				?>

			</tbody>

		<div class="visible-xs">
			<form name="fvisit" id="fvisit" class="local_sch02 local_sch" method="get" action="<?php echo $_SERVER[PHP_SELF];?>">
			<div class="row sch_last">
				<div class="col-xs-12 body-xs-top">
				<strong>기간검색</strong>&nbsp;
					<input type="hidden" name="site" value="<?php echo $site_ori;?>">
					<input type="hidden" name="hid" value="<?php echo $hid;?>">
					<input type="text" name="fr_date" value="<?php echo $fr_date ?>" id="fr_date" class="frm_input" size="10" maxlength="10">
				<label for="fr_date" class="sound_only">시작일</label>
				 ~
					<input type="text" name="to_date" value="<?php echo $to_date ?>" id="to_date" class="frm_input" size="10" maxlength="10">
				<label for="to_date" class="sound_only">종료일</label>
					<input type="submit" value="검색" class="btn_submit">
				</div>
			</div>
			</form>
		</div>

		<div class="row body-top">
			<div class="col-md-8 pull-right hidden-xs">
				<i class="fa fa-chevron-circle-right"></i>
				<span class="day"><?php echo $days=(strtotime($to_date)-strtotime($fr_date))/(24*60*60)+1;?></span> 일간 검색유입 : <span class="day"><?php echo $cnt;?></span> 건 (<?php echo sprintf("%.1f",$cnt/$days);?>/일)&nbsp;
				<i class="fa fa-caret-right"></i>
				<?php if ($cnt == 0){ ?>
					자료가 없습니다.
				<?php } else if(!$site_ori) { // 모든 사이트의 경우 비율 분석
					foreach($cnt2 as $engine => $count) {
						echo "$engine : $count (".sprintf("%.1f",$count/$cnt*100)."%)&nbsp;&nbsp;";
						}
					}
				?>
		  	</div>

			<div class="col-md-8 visible-xs">
				<i class="fa fa-chevron-circle-right"></i>
				<span class="day"><?php echo $days=(strtotime($to_date)-strtotime($fr_date))/(24*60*60)+1;?></span> 일간 검색유입 : <span class="day"><?php echo			 			$cnt;?></span> 건 (<?php echo sprintf("%.1f",$cnt/$days);?>/일)<br>
				<i class="fa fa-caret-right"></i>
				<?php if ($cnt == 0){ ?>
					자료가 없습니다.
				<?php } else { ?>
				<?php if(!$site_ori) { // 모든 사이트의 경우 비율 분석
					foreach($cnt2 as $engine => $count) {
						echo "$engine : $count (".sprintf("%.1f",$count/$cnt*100)."%)&nbsp;&nbsp;";
						}
					}
				?>
				<?php } ?>
			</div>

			<div class="sp-idx3"></div>
			<div class="col-md-4">
				<a href="?hid=<?php echo $hid;?>&to_date=<?php echo $to_date;?>&fr_date=<?php echo $fr_date;?>" class="btn btn-color" style="padding:2px 7px;">
					<span style="font-size:12px;">전체</span></a>
				<?php foreach($site_arr as $site) { ?>
				<a href="?hid=<?php echo $hid;?>&site=<?php echo $site;?>&to_date=<?php echo $to_date;?>&fr_date=<?php echo $fr_date;?>" class="btn btn-black" style="padding:2px 7px;"><span style="font-size:12px;"><?php echo $site;?></span></a>
				<?php } ?>
			</div>
		</div>
		<div class="sp-idx2"></div>
		</table>
	</div>
</div>

<script src="<?php echo G5_URL; ?>/page/keyword_analyzer/js/bootstrap-table.js"></script>
<script type="text/javascript">
	$(function(){
    $("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate		 	: "+0d" });
	});

	function fvisit_submit(act)
	{
    	var f = document.fvisit;
    	f.action = act;
    	f.submit();
	}
</script>