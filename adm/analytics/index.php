<?php
include_once('./_common.php');

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

$sub_menu = "901000";
$g5['title'] = 'Google Analytics';

include_once('../admin.head.php');
include_once(__DIR__ . '/google-api-php/vendor/autoload.php');	
include_once(__DIR__ . '/lib/lib.php');	


add_stylesheet('<link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">', 0); 
add_stylesheet('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">', 0); 
add_stylesheet('<link rel="stylesheet" href="./vendor/datatables/dataTables.bootstrap4.min.css">', 0); 
add_stylesheet('<link rel="stylesheet" href="./css/bootstrap-datepicker.css">', 0); 
add_stylesheet('<link rel="stylesheet" href="./css/sb-admin-2.min.css">', 0); 
add_stylesheet('<link rel="stylesheet" href="./css/default.css?v1">', 0); 

// Install
install();

// Get data
$row = sql_fetch(" select * from g_analytics ");
$access_token  = $row['access_token'];
$site_id = $row['site_id'];
$data = $row['data'];
$regdate = $row['regdate'];
$cache_time = isset($row['cache_time']) ? $row['cache_time'] * 60 : 3600;


// Cache
if($regdate !== null  && $regdate + $cache_time > time() && !$_GET['refresh_token'] && $data !== null)
{
	
	echo '<div class="pageGoogle">';
	echo stripcslashes($data);
	echo '</div>';
	include_once ('admin.tail.php');
	exit;
}


// Loading
echo '<div class="pageGoogle"><div class="loading">Loading...<i class="fas fa-redo fa-spin text-primary"></i></div></div>';
	
	
include_once ('admin.tail.php');
?>
<script>
$(document).ready(function() {
	
	$.post(
	    g5_admin_url+"/analytics/template.php",
	    {url:window.location.href},
	    function(data) {
	    	$('.pageGoogle').empty();
	    	$('.pageGoogle').html(data);
	    }
	);
});
</script>
