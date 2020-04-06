<?php
include_once('./_common.php');

if ($is_admin != 'super') die('');

include_once(__DIR__ . '/google-api-php/vendor/autoload.php');	
include_once(__DIR__ . '/lib/lib.php');	

$start_date = $_POST['start_date'] == "" ? "today" : $_POST['start_date'];
$end_date = $_POST['end_date'] == "" ? "today" : $_POST['end_date'];
$sort = $_POST['sort'];


// Get data from Google Analytics
$row = sql_fetch(" select * from g_analytics ");
$access_token  = $row['access_token'];
$site_id = $row['site_id'];

if($row['refresh_token'])
{
	$analytics = getAnalytics($access_token);
	
	// 남녀비율
	if($sort == 'gender')
	{
		
		$dimensions = 'ga:userGender,ga:pagePath';
		$metrics = 'ga:sessions';
		
		$data = execGa($analytics, $site_id, $start_date, $end_date, $metrics, $dimensions);
		
		$i = 0;
		foreach($data->rows as $item)
		{
			// 0:성별 , // 1:제목  // 2: 세션수
			$k = $i;	
			if($i == 0)
			{
				$genderData[0]['path'] = $item[1];
				
			} else {
				
				$isExist = search2Array($genderData, 'path', $item[1]);
				if ($isExist === false) 
				{
					$genderData[$i]['path'] = $item[1];
				} else {
					$k = $isExist;
				}
			}

			if($item[0] == 'female')
			{
				$genderData[$k]['female'] = $item[2];
			} else if($item[0] == 'male'){
				$genderData[$k]['male'] = $item[2];
			}
			
			$i++;
		}
		
		$i=0;
		foreach($genderData as $item)
		{
			$genderResult[$i]['path'] = $item['path'];
			$genderResult[$i]['female'] = isset($item['female']) ? $item['female'] : "0.1";
			$genderResult[$i]['male'] = isset($item['male']) ? $item['male'] : "0.1";
			
			$total = $genderResult[$i]['female'] + $genderResult[$i]['male'];
			$genderResult[$i]['female'] = round($genderResult[$i]['female'] / $total *100, 0);
			$genderResult[$i]['male'] = round($genderResult[$i]['male'] / $total *100, 0);
			
			$i++; 
		}
		
		print_r(json_encode($genderResult));
		
	
	// Age
	} else if($sort == 'age'){
		
		$dimensions = 'ga:userAgeBracket,ga:pagePath';
		$metrics = 'ga:sessions';
		
		$data = execGa($analytics, $site_id, $start_date, $end_date, $metrics, $dimensions);
			
		$i = 0;
		$ageDataList = array();
		foreach($data->rows as $item)
		{
			
			$k = $i;	
			if($i == 0)
			{
				$ageData[0]['path'] = $item[1];
				
			} else {
				
				$isExist = search2Array($ageData, 'path', $item[1]);
				
				if ($isExist === false) 
				{
					$ageData[$i]['path'] = $item[1];
				} else {
					$k = $isExist;
				}
			}
			
			
			if($item[0] == "18-24")
			{
				$ageData[$k]['session'][0] = $item[2];
				
			} else if($item[0] == "25-34") {
				
				$ageData[$k]['session'][1] = $item[2];
				
			} else if($item[0] == "35-44") {
				
				$ageData[$k]['session'][2] = $item[2];
				
			} else if($item[0] == "45-54") {
				
				$ageData[$k]['session'][3] = $item[2];
				
			} else if($item[0] == "55-64") {
				
				$ageData[$k]['session'][4] = $item[2];
				
			} else if($item[0] == "65+") {
				
				$ageData[$k]['session'][5] = $item[2];
				
			}

			$i++;
		}
		
		$i = 0;  
		foreach($ageData as $key=>$val)  
		{  
		    unset($ageData[$key]);  
		  
		    $new_key = $i;  
		    $ageData[$new_key] = $val;  
		  
		    $i++;  
		}  


		for($q=0; $q < count($ageData); $q++)
		{
			$ageData[$q]['total'] = 0;
			foreach($ageData[$q]['session'] as $item)
			{
				$ageData[$q]['total'] += $item;
			}
		}
		
		for($q=0; $q < count($ageData); $q++)
		{
			
			if(isset($ageData[$q]['session'][0]))
			{
				$ageData[$q]['percent'][0] = round($ageData[$q]['session'][0] / $ageData[$q]['total'] * 100, 0);
				$ageData[$q]['html'] .= "<div>18-24: ". $ageData[$q]['percent'][0] . "%</div>";
				
			} 
			if(isset($ageData[$q]['session'][1]))
			{
				
				$ageData[$q]['percent'][1] = round($ageData[$q]['session'][1] / $ageData[$q]['total'] * 100, 0);
				$ageData[$q]['html'] .= "<div>25-34: ". $ageData[$q]['percent'][1] . "%</div>";
			} 
			if(isset($ageData[$q]['session'][2]))
			{
			
				$ageData[$q]['percent'][2] = round($ageData[$q]['session'][2] / $ageData[$q]['total'] * 100, 0);
				$ageData[$q]['html'] .= "<div>35-44: ". $ageData[$q]['percent'][2] . "%</div>";
			} 
			if(isset($ageData[$q]['session'][3]))
			{
			
				$ageData[$q]['percent'][3] = round($ageData[$q]['session'][3] / $ageData[$q]['total'] * 100, 0);
				$ageData[$q]['html'] .= "<div>45-54: ". $ageData[$q]['percent'][3] . "%</div>";
			
			} 
			if(isset($ageData[$q]['session'][4]))
			{
			
				$ageData[$q]['percent'][4] = round($ageData[$q]['session'][4] / $ageData[$q]['total'] * 100, 0);
				$ageData[$q]['html'] .= "<div>55-64: ". $ageData[$q]['percent'][4] . "%</div>";
			} 
			if(isset($ageData[$q]['session'][5]))
			{
			
				$ageData[$q]['percent'][5] = round($ageData[$q]['session'][5] / $ageData[$q]['total'] * 100, 0);
				$ageData[$q]['html'] .= "<div>65+: ". $ageData[$q]['percent'][5] . "%</div>";
			}
			
		}
		
		
		for($i=0; $i < count($ageData); $i++)
		{
			
			unset($ageData[$i]['session']);
			unset($ageData[$i]['percent']);
			unset($ageData[$i]['total']);
		}
		
		print_r(json_encode($ageData));
		
	// Table		
	} else if($sort == 'table'){
		
		$page_cnt = $_POST['page_cnt'];
		
		$today_data = execGa($analytics, $site_id, $start_date, $end_date, "ga:pageviews,ga:avgTimeOnPage,ga:adsenseRevenue,ga:adsenseAdsClicks,ga:adsenseCTR", "ga:pagePath,ga:pageTitle", "-ga:adsenseRevenue",'',  $page_cnt);	
		
		$pageList = "";
		if(isset($today_data))
		{
			foreach($today_data->rows as $item)
			{
				$cpc = $item[5] > 0 ? round($item[4] / $item[5], 3) : "0";
				$pageList .= "<tr>";
				$pageList .= '<td><a href="//' . $_SERVER['HTTP_HOST'] .$item[0] .'" target="_blank">' . $item[1] . '</td>';
				$pageList .= '<td>' . round($item[2],2) . '</td>';
				$pageList .= '<td>' . round($item[3],2) . '</td>';
				$pageList .= '<td>' . round($item[4],3) . '</td>';
				$pageList .= '<td>' . $cpc . '</td>';
				$pageList .= '<td>' . $item[5] . '</td>';
				$pageList .= '<td class="btnGender">남녀비율</td>';
				$pageList .= '<td class="btnAge">연령대</td>';
				$pageList .= "</tr>";
			}
		}
		
		print_r(json_encode($pageList));
	
	// Gender
	} else if($sort == 'gender_range'){
		
		$_age = execGa($analytics, $site_id, $start_date, $end_date, "ga:sessions", "ga:userAgeBracket, ga:userGender", '', '', 100);	
		
		$totalAge = $_age->totalsForAllResults['ga:sessions'];
		$graphAgeGender = graphAgeGender($_age);
		$ghtml = $graphAgeGender['ghtml'];
		
		
		print_r(json_encode($ghtml));
	
	// Cache Delete - Setting Page	
	} else if($sort == 'deletecache'){
		
		$sql = sql_query(" update g_analytics set data = null ");		
		$result = "success";
		print_r(json_encode($result));
		
	// Uninstall	
	} else if($sort == 'uninstall'){
		
		$sql = sql_query(" drop table g_analytics " );		
		$result = "success1";
		print_r(json_encode($result));
		
	}
	
}

?>