<?php
include_once('./_common.php');

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

$sub_menu = "901000";
$g5['title'] = 'Google Analytics 설정';

include_once('../admin.head.php');


// Get data
$row = sql_fetch(" select * from agoogle ");
$cache_time = $row['cache_time'];
$page_cnt = $row['page_cnt'];
?>

<form name="form" id="form" action="<?php echo G5_ADMIN_URL;?>/analytics/setting_update.php"  method="post">
<section id="anc_cf_qa_config">
    <h2 class="h2_frm">Google Analytics 설정</h2>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>Ga Setting</caption>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="cache_time">캐시시간 (기본60분)</label></th>
            <td>
                <input type="text" name="cache_time" value="<?php echo $cache_time ?>" id="cache_time"  class="frm_input" size="10">분
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="page_cnt">테이블 페이지 수집갯수(기본 100, 최대 1000)</label></th>
            <td >
            	<input type="text" name="page_cnt" value="<?php echo $page_cnt ?>" id="page_cnt"  class="frm_input" size="10">
            	<div>갯수가 많을수록 로딩시간이 오래걸립니다.</div>
	        </td>
        </tr>
        <tr>
            <th scope="row"><label for="page_cnt">캐시삭제</label></th>
            <td >
            	<input type='button' value='캐시삭제' id="deletecache" />
	        </td>
        </tr>
        <tr>
            <th scope="row"><label for="uninstall">Uninstall</label></th>
            <td >
            	<input type='button' value='Uninstall' id="uninstall" />
	        </td>
        </tr>
        </tbody>
        </table>
    </div>
</section>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
</div>

</form>
<script>
	$('#deletecache').on('click', function() {
		$(this).val('삭제중');
		$.ajax({
	        type: "POST",
	        url: g5_admin_url+"/analytics/ajax.ga.php",
	        data: {
				"sort" : "deletecache"
			},
	        dataType: "json",
	        success: function(data) {
	        	console.log(data); 
	        	$('#deletecache').val('삭제완료');
	        },
			error:function(request, status, error){
			    alert("Error. Retry Please");
			}
	    });
	});
	$('#uninstall').on('click', function() {
		if (confirm("정말 삭제하시겠습니까??") == true){    //확인
			$(this).val('테이블 삭제중');
		} else {   //취소
			return false;
		}
		
		$.ajax({
	        type: "POST",
	        url: g5_admin_url+"/analytics/ajax.ga.php",
	        data: {
				"sort" : "uninstall"
			},
	        dataType: "json",
	        success: function(data) {
	        	$('#uninstall').val('삭제완료');
	        },
			error:function(request, status, error){
				$('#deletecache').val('Uninstall');
			    alert("Error. Retry Please");
			}
	    });
	});
</script>

<?php
include_once ('admin.tail.php');
?>
