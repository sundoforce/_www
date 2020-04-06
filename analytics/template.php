<?php
include_once('./_common.php');

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

error_reporting(0);
include_once(__DIR__ . '/google-api-php/vendor/autoload.php');	
include_once(__DIR__ . '/lib/lib.php');	


// Path
$AuthConfig = file_get_contents(__DIR__ . '/lib/client.json');
$setAuthConfig = json_decode($AuthConfig, true);	  
$url = "https://accounts.google.com/o/oauth2/auth?response_type=code&scope=https://www.googleapis.com/auth/analytics.readonly&access_type=offline&approval_prompt=force&client_id=353266657989-jfoq48lh3fqf69jqugf0amvfah9946hv.apps.googleusercontent.com&redirect_uri=" . $setAuthConfig['web']['redirect_uris'] ."&state=" . urlencode($_POST['url']);

// Get data from Google Analytics
$row = sql_fetch(" select * from g_analytics ");
$access_token  = $row['access_token'];
$site_id = $row['site_id'];
$page_cnt = isset($row['page_cnt']) ? $row['page_cnt']  : 100; // 무조건 100이상

if($row['refresh_token'])
{
	$analytics = getAnalytics($access_token);

	$today_data = execGa($analytics, $site_id, "today", "today", "ga:pageviews,ga:avgTimeOnPage,ga:adsenseRevenue,ga:adsenseAdsClicks,ga:adsenseCTR", "ga:pagePath,ga:pageTitle", "-ga:adsenseRevenue",'',  100);	
	$month_data = execGa($analytics, $site_id, "65daysAgo", "today", "ga:adsenseRevenue", "ga:date", 'ga:date', '', $page_cnt);	
	$month_age = execGa($analytics, $site_id, "30daysAgo", "today", "ga:sessions", "ga:userAgeBracket, ga:userGender", '', '', 100);	
	
		  
	if(strpos($today_data[error][message], 'Restricted metric(s)') !== false) 
	{  
	    $error_msg = "애널리틱스에 애드센스를 연결해주세요.";
		sql_fetch(" update g_analytics set  data =  null ");
	}
	
	// Graph - Revenue
	$graphRevenue = graphRevenue($month_data);
	$thisMonthRevenue =  $graphRevenue['thisMonthRevenue'];
	$month_day =  $graphRevenue['month_day'];
	$month_revenue_day = $graphRevenue['month_revenue_day'];
		
		
	// Page
	$pageList = tablePage($today_data);
	
	
	// Age, Gender
	$totalAge = $month_age->totalsForAllResults['ga:sessions'];
	$graphAgeGender = graphAgeGender($month_age);
	$ghtml = $graphAgeGender['ghtml'];
	$maleHtml = $graphAgeGender['maleHtml'];
	$femaleHtml = $graphAgeGender['femaleHtml'];
	$totalHtml = $graphAgeGender['totalHtml'];
	
	// Cache
	ob_start();
	
} 

?>

<?php if(!$row['refresh_token']) {?>
	
	<div class="h20"></div>
	<div class="h20"></div>
	<div class="btnGaLink">
		<a href="<?php echo $url;?>">Link Google Analytics</a>
    </div>
    <div class="h20"></div>
    <div>1. 구글 애널리틱스에 애드센스 연동이 필요합니다.</div>
    <div>2. 구글애널리틱스 - 잠재고객 - 인구통계 활성화가 필요합니다.</div>
    <div class="h20"></div>
    
<?php } else {?>
	
	<!-- Warning -->
	<?php if(isset($error_msg)){ // Error :: Not linked GA, ADSENSE ?>
		<div class="row">
			<div class="col-xl-12 col-md-12 mb-4">
				<div class="card bg-danger text-white shadow">
		            <div class="card-body">
		              <?php echo $error_msg;?>
		            </div>
		        </div>
	        </div>
		</div>
	<?php }?>
	<!-- Warning -->
	
	<!-- Content Row -->
	<div class="row">
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Today)</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($today_data->totalsForAllResults['ga:adsenseRevenue']) ? "$ " . round($today_data->totalsForAllResults['ga:adsenseRevenue'],3) : "No data";?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-success shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (This month)</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($thisMonthRevenue) ? "$ " . round($thisMonthRevenue,3) : "0";?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-info shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PageView</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($today_data->totalsForAllResults['ga:pageviews']) ? $today_data->totalsForAllResults['ga:pageviews'] : "No data";?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-eye fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-warning shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Avg.Onpage</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($today_data->totalsForAllResults['ga:avgTimeOnPage'],2);?> s</div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-comments fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	</div>
	<!-- Content Row -->
	
	
	<!-- Content Row -->
	<div class="row">
	
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPC (Today)</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($today_data->totalsForAllResults['ga:adsenseRevenue']) && $today_data->totalsForAllResults['ga:adsenseAdsClicks'] > 0 ? "$ ".round($today_data->totalsForAllResults['ga:adsenseRevenue']/$today_data->totalsForAllResults['ga:adsenseAdsClicks'],3) : "No data"; ?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	  
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-success shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clicks (Today)</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($today_data->totalsForAllResults['ga:adsenseAdsClicks']) ? round($today_data->totalsForAllResults['ga:adsenseAdsClicks'],2) : "No data"; ?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-info shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">CTR (Today)</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($today_data->totalsForAllResults['ga:adsenseAdsClicks']) ? round(($today_data->totalsForAllResults['ga:adsenseAdsClicks']/$today_data->totalsForAllResults['ga:pageviews'])*100,2) : "No data"; ?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	
	        <div class="col-xl-3 col-md-6 mb-4">
	          <div class="card border-left-warning shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">RPM (Today)</div>
	                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo isset($today_data->totalsForAllResults['ga:adsenseRevenue']) ? round(($today_data->totalsForAllResults['ga:adsenseRevenue']/$today_data->totalsForAllResults['ga:pageviews'])*1000,2) : "No data"; ?></div>
	                </div>
	                <div class="col-auto">
	                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	</div>
	<!-- Content Row -->
	
	
	<!-- Chart Card -->
	<div class="row">
	
	    <!-- Area Chart -->
	    <div class="col-xl-8 col-lg-7">
	      <div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
	        </div>
	        <!-- Card Body -->
	        <div class="card-body">
	          <div class="chart-area">
	            <canvas id="myAreaChart"></canvas>
	          </div>
	        </div>
	        <!-- Card Tail -->
	        <div class="text-hide area_graph_day">
	          	<?php echo $month_day;?>
	        </div>
	        <div class="text-hide area_graph_revenue">
	          	<?php echo $month_revenue_day;?>
	        </div>
	      </div>
	    </div>
	
	    <!-- Pie Chart -->
	    <div class="col-xl-4 col-lg-5" id="genderPieChart">
	      <div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Proportion of men and woman(30d)</h6>
	          <div class="dropdown no-arrow">
	            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	            </a>
	            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
	              <div class="dropdown-item gender_today">Today</div>
	              <div class="dropdown-item gender_yesterday">Yesterday</div>
	              <div class="dropdown-item gender_week">Week</div>
	            </div>
	          </div>
	        </div>
	        <!-- Card Body -->
	        <div class="card-body">
	          <div class="chart-pie pt-4 pb-2 text-center">
	          	<?php if(!$totalAge){ echo "No data</br>(구글애널리틱스에서 인구통계 활성화 필요)";} else {?>
	            <canvas id="myPieChart"></canvas>
	            <?php }?>
	          </div>
	          <div class="mt-4 text-center">
	          	<span class="mr-2">
	              <i class="fas fa-circle text-primary"></i> Male
	            </span>
	            <span class="mr-2">
	              <i class="fas fa-circle text-female"></i> Female
	            </span>
	          </div>
	        </div>
	        <!-- Card Tail -->
	        <div class="text-hide gender_data">
	        	<?php echo $ghtml;?>
	        </div>
	      </div>
	    </div>
	</div>
	<!-- Chart Card -->
	  
	<!-- Chart Card -->
	<div class="row">
		
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
	            <!-- Card Header - Accordion -->
	            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
	              <h6 class="m-0 font-weight-bold text-primary">Male Ages (30d)</h6>
	            </a>
	            <!-- Card Content - Collapse -->
	            <div class="collapse " id="collapseCardExample">
	              <div class="card-body">
	           		  <!-- Bar Chart -->
		              <div class="chart-bar">
		                    <canvas id="myBarChart"></canvas>
		              </div>
		              <div class="chart-data text-hide maledata">
		                	<?php echo $maleHtml;?>
		              </div>
	              </div>
	            </div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
	            <!-- Card Header - Accordion -->
	            <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
	              <h6 class="m-0 font-weight-bold text-female">Female Ages (30d)</h6>
	            </a>
	            <!-- Card Content - Collapse -->
	            <div class="collapse " id="collapseCardExample2">
	              <div class="card-body">
	              	  <!-- Bar Chart -->
		              <div class="chart-bar">
		                    <canvas id="myBarChart2"></canvas>
		              </div>
		              <div class="chart-data text-hide femaledata">
		                	<?php echo $femaleHtml;?>
		              </div>
	              </div>
	            </div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
	            <!-- Card Header - Accordion -->
	            <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">
	              <h6 class="m-0 font-weight-bold text-success">Total Ages (30d)</h6>
	            </a>
	            <!-- Card Content - Collapse -->
	            <div class="collapse " id="collapseCardExample3">
	              <div class="card-body">
	              	  <!-- Bar Chart -->
		              <div class="chart-bar">
		                    <canvas id="myBarChart3"></canvas>
		              </div>
		              <div class="chart-data text-hide totaldata">
		                	<?php echo $totalHtml;?>
		              </div>
	              </div>
	            </div>
			</div>
		</div>
	</div>
	<!-- Chart Card -->
	
	
	<!-- DataTales -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary pull-left">Pages (Today)</h6>
	      <div class="col-sm-3 pull-left">
	      		<div class="datepicker-container"></div>
	            <div class="input-daterange input-group" id="datepicker">
				    <input type="text" class="input-sm form-control start_date" name="start" />
				    <span class="input-group-addon">to</span>
				    <input type="text" class="input-sm form-control end_date" name="end" />
				</div>
				<div class="text-daterange text-hide">
					<div class="start_log"></div>
					<div class="end_log"></div>
					<div class="page_cnt"><?php echo $page_cnt;?></div>
				</div>
	       </div>
	       <div class="pull-left submit_date" id="dateSubmit">Submit</div>
	    </div>
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th>Page</th>
		              <th>조회수</th>
		              <th>평균머문시간</th>
		              <th>수익</th>
		              <th>CPC</th>
		              <th>Click</th>
		              <th class="text-center">남 : 녀</th>
		              <th class="text-center">연령대</th>
		            </tr>
		          </thead>
		          <tbody>
		            <?php echo $pageList;?>
		          </tbody>
		        </table>
	    	</div>
	    </div>
	</div>
	<!-- DataTales -->

<?php } ?>
	

<!-- Bootstrap core JavaScript-->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="./vendor/chart.js/Chart.min.js"></script>
<script src="./vendor/datatables/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./js/bootstrap-datepicker.js"></script>
<script src="./js/bootstrap-datepicker.ko.js"></script>
<script src="./js/google-analytics.js?v3"></script>   

<?php

$html = ob_get_contents(); 
ob_end_clean();

$data = addslashes($html);
$regdate = time();
if(!isset($error_msg)) 
{
	sql_fetch(" update g_analytics set regdate = '{$regdate}', data =  '{$data}' ");
}

echo $html;
?>