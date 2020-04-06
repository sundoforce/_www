<?php
//exec
function execGa($analytics, $site_id, $startDate, $endDate, $metrics, $dimensions, $sort = false, $filter = false, $cnt = false)
{
	
	
	$pvData = getData($analytics, $site_id, $startDate, $endDate, $metrics, $dimensions, $sort, '', $cnt);
	
	// If access token expired
	if($pvData['error']['code'] == "401")
	{
		// Get access token
		$access_token = saveAccessToken();
		$analytics = getAnalytics($access_token);
		$pvData = getData($analytics, $site_id, $startDate, $endDate, $metrics, $dimensions, $sort, '', $cnt);
	}
	
	
	return $pvData;
}	


// Graph - Revenue
function graphRevenue($month_data) 
{
	if(isset($month_data))
	{
		$thisMonthRevenue = 0;
		$month_day = $month_revenue_day = "";
		foreach($month_data->rows as $item)
		{
			
			// This month
			$year = substr($item[0], 0, 4);
			$month = substr($item[0], 4, 2);
			$day = substr($item[0], -2);
			if(date("m") == $month)
			{
				$thisMonthRevenue += $item[1];
			}
			
			// Graph
			$prev_month = strtotime("-1 month", time());
			$prev_m = date("Ymd", $prev_month);
			if($prev_m < $item[0])
			{
				$month_day .= '"' . substr($item[0], -2) . '"' . ",";
				$month_revenue_day .= round($item[1], 2) . ",";
			}
			
			
		}
	}
	
	$month_day =  "[".substr($month_day, 0, -1) . "]";
	$month_revenue_day = "[".substr($month_revenue_day, 0, -1) . "]";
	
	return array("thisMonthRevenue" => $thisMonthRevenue,"month_day" => $month_day, "month_revenue_day" => $month_revenue_day);
}	

// Table Page 
function tablePage($today_data) 
{
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
	
	return $pageList;
}

// Age, Gender Graph 
function graphAgeGender($month_age) 
{
	$totalAge = $month_age->totalsForAllResults['ga:sessions'];
	if(isset($totalAge) && $totalAge > 0)
	{
		$ghtml = "";
		$gMale = 0;
		$gFemale = 0;
		
		$ahtml = "";
		$aMaleTotal = 0;
		$aFemaleTotal = 0;
		
		// Gender
		foreach($month_age->rows as $item)
		{
			
			if($item[1] == "female")
			{
				$gFemale += $item[2];
				//
			} else if($item[1] == "male") {
				$gMale += $item[2];
			}
		}
		$ghtml .= '<div class="male">' . round($gMale/$totalAge * 100). '</div>';
		$ghtml .= '<div class="female">' . round($gFemale/$totalAge * 100). '</div>';
		
		// Age
		foreach($month_age->rows as $item)
		{
			if($item[0] == "18-24")
			{
				if($item[1] == "male")
				{
					$aMaleTotal += $item[2];
					$aTotal['male'][0] = $item[2];
				} else if($item[1] == "female") {
					$aFemaleTotal += $item[2];
					$aTotal['female'][0] = $item[2];
				}
				
			} else if($item[0] == "25-34") {
				
				if($item[1] == "male")
				{
					$aMaleTotal += $item[2];
					$aTotal['male'][1] = $item[2];
				} else if($item[1] == "female") {
					$aFemaleTotal += $item[2];
					$aTotal['female'][1] = $item[2];
				}
				
			} else if($item[0] == "35-44") {
				
				if($item[1] == "male")
				{
					$aMaleTotal += $item[2];
					$aTotal['male'][2] = $item[2];
				} else if($item[1] == "female") {
					$aFemaleTotal += $item[2];
					$aTotal['female'][2] = $item[2];
				}
				
			} else if($item[0] == "45-54") {
				
				if($item[1] == "male")
				{
					$aMaleTotal += $item[2];
					$aTotal['male'][3] = $item[2];
				} else if($item[1] == "female") {
					$aFemaleTotal += $item[2];
					$aTotal['female'][3] = $item[2];
				}
				
			} else if($item[0] == "55-64") {
				
				if($item[1] == "male")
				{
					$aMaleTotal += $item[2];
					$aTotal['male'][4] = $item[2];
				} else if($item[1] == "female") {
					$aFemaleTotal += $item[2];
					$aTotal['female'][4] = $item[2];
				}
				
			} else if($item[0] == "65+") {
				
				if($item[1] == "male")
				{
					$aMaleTotal += $item[2];
					$aTotal['male'][5] = $item[2];
				} else if($item[1] == "female") {
					$aFemaleTotal += $item[2];
					$aTotal['female'][5] = $item[2];
				}
			}
		}
		
		$maleHtml = $femaleHtml = $totalHtml = "";
		for($i=0; $i<6; $i++)
		{
			$valueMale[$i] = isset($aTotal['male'][$i]) ? $aTotal['male'][$i] : 0;
			$valueFemale[$i] = isset($aTotal['female'][$i]) ? $aTotal['female'][$i] : 0;
	
			$maleHtml .=  round($valueMale[$i]/$aMaleTotal * 100) . ",";
			$femaleHtml .= round($valueFemale[$i]/$aFemaleTotal * 100) . ",";
			$totalHtml .= round(($valueMale[$i] + $valueFemale[$i]) / $totalAge * 100) . ",";
			
			
		}
		$maleHtml =  "[".substr($maleHtml, 0, -1) . "]";
		$femaleHtml = "[".substr($femaleHtml, 0, -1) . "]";
		$totalHtml = "[".substr($totalHtml, 0, -1) . "]";
	}
	
	return array("ghtml" => $ghtml, "maleHtml" => $maleHtml, "femaleHtml" => $femaleHtml, "totalHtml" => $totalHtml);
}


function saveAccessToken() 
{
	$access = json_decode(getAccessToken(), true);
	$access_token = $access['access_token'];
	
	$row = sql_fetch(" select * from g_analytics ");
	if($row) $sql_query = sql_fetch(" update g_analytics set access_token = $access_token where wr_id = '{$row[wr_id]}' ");
	
	return $access_token;
}		


function getAnalytics($access_token)
{
	$client = new Google_Client();
	$client->setAuthConfig(__DIR__ . '/client.json');
	$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
	$client->setAccessToken($access_token);
	$analytics = new Google_Service_Analytics($client);

	
	return $analytics;
}

function getData( $analytics, $site_id, $startDate, $endDate, $metrics, $dimensions = false, $sort = false, $filter = false, $maxresult = false, $name = ''  ) 
{
	$ids = 'ga:'.$site_id; 

	$optParams = array();
	$optParams['dimensions'] = $dimensions;
	if($sort) $optParams['sort'] = $sort;
	if($maxresult) $optParams['max-results'] = $maxresult;
	if($filter) $optParams['filters'] = $filter;
	
	try {
        $results = $analytics->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);
    }
    catch (Exception $e) {
         $results =  json_decode($e->getMessage(), true);
    }
	
 	return $results;

}

function getAccessToken()
{
	
	$sql = " select * from g_analytics ";
	$row = sql_fetch($sql);

	$AuthConfig = file_get_contents(__DIR__ . '/client.json');
	$setAuthConfig = json_decode($AuthConfig, true);	  

	$url = "https://www.googleapis.com/oauth2/v4/token";
	$client_id = $setAuthConfig['web']['client_id'];
	$client_secret = $setAuthConfig['web']['client_secret'];
	$refresh_token = $row['refresh_token'];
	
	$param = array(
	    'client_id'   => $client_id,
	    'client_secret'   => $client_secret,
	    'refresh_token' => $refresh_token,
	    'grant_type' => 'refresh_token'
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$contents = curl_exec($ch);
	curl_close($ch);
	
	return $contents;
}


// Site_id
function getSiteId($analytics)
{
		$site_id = "";
		$accounts = $analytics->management_accounts->listManagementAccounts();

		if (count($accounts->getItems()) > 0) 
		{
			$items = $accounts->getItems();
			$firstAccountId = $items[0]->getId();
			
		
			// Get the list of properties for the authorized user.
			$properties = $analytics->management_webproperties->listManagementWebproperties($firstAccountId);
			
			if (count($properties->getItems()) > 0) 
			{
				$items = $properties->getItems();
			  						
				foreach($items as $item)
				{
					$firstPropertyId = $item->getId();
					 
					// Get the list of views (profiles) for the authorized user.
				    $profiles = $analytics->management_profiles->listManagementProfiles($firstAccountId, $firstPropertyId);
				
					if (count($profiles->getItems()) > 0) 
				    {
				    	$itemslist = $profiles->getItems();
						$domain_scheme = parseURL($_SERVER['HTTP_HOST']);
						
						// 동일도메인
						if(strpos($itemslist[0]->websiteUrl, $domain_scheme['host']) !== false)
						{
							$site_id = $itemslist[0]->getId();
					
						// 다르다면  
						} else {
							if(strpos($itemslist[0]->websiteUrl, $domain_scheme['domain']) !== false)
							{
								$site_id = $itemslist[0]->getId();
							}
						}
					  
					}
				}
			}
			
		}		
		
		return $site_id;
}


// Start
function install()
{
	// Create table
	sql_query( "CREATE TABLE IF NOT EXISTS g_analytics (
	  wr_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  regdate varchar(255),
	  site_id varchar(255),
	  cache_time varchar(255),
	  page_cnt varchar(255),
	  access_token text,
	  refresh_token text,
	  data longtext
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 ", true);
	

				
	if($_GET['refresh_token'])
	{
		
		// Refresh token save
		$refresh_token =  urldecode($_GET['refresh_token']);
		
		$sql = "truncate g_analytics ";  
		$row = sql_fetch($sql);
	
		$sql = " insert into g_analytics set refresh_token =  '$refresh_token' ";
		$row = sql_fetch($sql);
		
		
		// Access token
		$row = sql_fetch(" select * from g_analytics ");
		$access_token  = $row['access_token'];
		$regdate = time();
		if(!$row['access_token'])
		{
			$accessTokenJson = getAccessToken();
			$accessToken = json_decode($accessTokenJson, true);
			$access_token = $accessToken['access_token'];
			
			$sql = " update g_analytics set access_token =  '{$access_token}', regdate = '{$regdate}' ";
			$row = sql_fetch($sql);
		}
		
		// Site_id
		if(!$row['site_id'])
		{
			$analytics = getAnalytics($access_token);
			$site_id = getSiteId($analytics);
			sql_fetch(" update g_analytics set site_id = $site_id ");
		}
		
		if(!isset($site_id))
		{
			$sql = sql_fetch("DROP TABLE g_analytics ");  
			$state = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")  . "://$_SERVER[HTTP_HOST]/adm";
			alert("애널리틱스에 현재 사이트가 추가되어 있지 않습니다.", $state);
		}
	}
}


function search2Array($products, $field, $value)
{
   foreach($products as $key => $product)
   {
      if ( $product[$field] === $value )
         return $key;
   }
   return false;
}


function parseURL($url,$retdata=true){
    $url = substr($url,0,4)=='http'? $url: 'http://'.$url; //assume http if not supplied
    if ($urldata = parse_url(str_replace('&amp;','&',$url))){
        $path_parts = pathinfo($urldata['host']);
        $tmp = explode('.',$urldata['host']); $n = count($tmp);
        if ($n>=2){
            if ($n==4 || ($n==3 && strlen($tmp[($n-2)])<=3)){
                $urldata['domain'] = $tmp[($n-3)].".".$tmp[($n-2)].".".$tmp[($n-1)];
                $urldata['tld'] = $tmp[($n-2)].".".$tmp[($n-1)]; //top-level domain
                $urldata['root'] = $tmp[($n-3)]; //second-level domain
                $urldata['subdomain'] = $n==4? $tmp[0]: ($n==3 && strlen($tmp[($n-2)])<=3)? $tmp[0]: '';
            } else {
                $urldata['domain'] = $tmp[($n-2)].".".$tmp[($n-1)];
                $urldata['tld'] = $tmp[($n-1)];
                $urldata['root'] = $tmp[($n-2)];
                $urldata['subdomain'] = $n==3? $tmp[0]: '';
            }
        }
        //$urldata['dirname'] = $path_parts['dirname'];
        $urldata['basename'] = $path_parts['basename'];
        $urldata['filename'] = $path_parts['filename'];
        $urldata['extension'] = $path_parts['extension'];
        $urldata['base'] = $urldata['scheme']."://".$urldata['host'];
        $urldata['abs'] = (isset($urldata['path']) && strlen($urldata['path']))? $urldata['path']: '/';
        $urldata['abs'] .= (isset($urldata['query']) && strlen($urldata['query']))? '?'.$urldata['query']: '';
        //Set data
        if ($retdata){
            return $urldata;
        } else {
            $this->urldata = $urldata;
            return true;
        }
    } else {
        //invalid URL
        return false;
    }
}


?>
