<?php
$apikey = ''; //api_key를 입력하세요
if(!$apikey){
  echo '{"error" : "1"}';
  exit;
}
define("MAX_RESULTS", 10);
$keyword = $_POST['q'];
if(!empty($_POST['nextPageToken']))
{
    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey . '&pageToken=' . $_POST['nextPageToken'];
}else
{
    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey;
}
echo $response = curl_get_content($googleApiUrl);
//$data = json_decode($response);


function curl_get_content($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // accept any server certificate
  $content = curl_exec($ch);
  curl_close($ch);
  return $content;
}
?>