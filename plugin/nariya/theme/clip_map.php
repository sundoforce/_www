<?php
include_once('./_common.php');

// 클립모달
$is_clip_modal = false;

// 클립보드
$is_clip = ($clip) ? true : false;

// 지도 초기값
$lat = '37.566535';
$lng = '126.977969';
$zoom = 16;

$g5['title'] = '지도';
include_once(G5_THEME_PATH.'/head.sub.php');

?>
<div style="height:45px;"></div>
<style>
body { margin:0; padding:0; background:#fff; }
.clip-head { position:fixed; z-index:10; left:0; top:0; width:100%; padding:10px 15px; font-size:16px; }
.clip-head .close { font-size:28px !important; }
.table th,
.table td { vertical-align:middle !important; }
.na-mapwrap {
	margin-bottom:0 !important;
}
div#map { position: relative; overflow:hidden; }
div#crosshair {
	position: absolute;
	top: 50%;
	height: 50px;
	width: 50px;
	left: 50%;
	margin-left: -25px;
	margin-top:-50px;
	display: block;
	background-image: url('<?php echo NA_PLUGIN_URL ?>/img/map-icon.png');
	background-position: center center;
	background-repeat: no-repeat;
}
.na-map {
	padding-bottom:60%;
}
</style>

<?php if($is_clip) { ?>
<!-- 클립보드 복사 시작 { -->
<script src="<?php echo NA_PLUGIN_URL ?>/js/clipboard.min.js"></script>
<div class="modal fade" id="clipModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<ul class="list-group">
		<li class="list-group-item bg-na-navy no-border">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="white">&times;</span></button>
			<b>지도 클립보드</b>
		</li>
		<li class="list-group-item no-border">
			<textarea type="text" id="txtClip" class="form-control" rows="5"></textarea>
			<div class="h10"></div>
			<button type="button" class="btn btn-na-red btn-clip btn-block" data-clipboard-target="#txtClip">
				<i class="fa fa-code" aria-hidden="true"></i>
				코드복사
			</button>
		</li>
		</ul>
	</div>
</div>
<!-- 클립보드 복사 끝 { -->
<?php } ?>

<script src="https://maps.google.com/maps/api/js?v=3.exp&language=ko&region=kr&key=<?php echo $nariya['google_key'] ?>"></script>
<script>
	var map;
	var geocoder;
	var centerChangedLast;
	var reverseGeocodedLast;
	var currentReverseGeocodeResponse;

	function addLoadEvent(func) {
		var oldonload = window.onload;
		if (typeof window.onload != 'function') {
			window.onload = func;
		} else {
			window.onload = function() {
				if (oldonload) {
					oldonload();
				}
				func();
			}
		}
	}

	function initialize() {
		var latlng = new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>);
		var myOptions = {
			zoom: <?php echo $zoom;?>,
			scaleControl: true,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		geocoder = new google.maps.Geocoder();

		google.maps.event.addListener(map, 'zoom_changed', function() {
			document.getElementById("zoom_level").innerHTML = map.getZoom();
			document.getElementById("map_zoom").value = map.getZoom();

			zoomLevel = map.getZoom(); 
			if (zoomLevel > 19) { 
				map.setZoom(19); 
			} else if (zoomLevel < 1) { 
				map.setZoom(1); 
			}
		});

		setupEvents();
		centerChanged();
	}

	function setupEvents() {
		reverseGeocodedLast = new Date();
		centerChangedLast = new Date();

		setInterval(function() {
			if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
				if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
				reverseGeocode();
			}
		}, 1000);

		google.maps.event.addListener(map, 'center_changed', centerChanged);

		google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
			map.setZoom(map.getZoom() + 1);
		});
	}

	function getCenterLatLngText() {

		var nn = 1000000;
		var tmpLat = Math.round(map.getCenter().lat()*nn)/nn;
		var tmpLng = Math.round(map.getCenter().lng()*nn)/nn;

		document.getElementById("map_lat").value = tmpLat;
		document.getElementById("map_lng").value = tmpLng;

		return tmpLat +', '+ tmpLng;
	}

	function centerChanged() {
		centerChangedLast = new Date();
		var latlng = getCenterLatLngText();
		var loc = latlng.split(',');	
		geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
		document.getElementById('lat').innerHTML = loc[0];
		document.getElementById('lng').innerHTML = loc[1];
		document.getElementById('formatedAddress').innerHTML = '';
		currentReverseGeocodeResponse = null;
	}

	function reverseGeocode() {
		reverseGeocodedLast = new Date();
		geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
	}

	function reverseGeocodeResult(results, status) {
		currentReverseGeocodeResponse = results;
		if(status == 'OK') {
			if(results.length == 0) {
				document.getElementById('formatedAddress').innerHTML = '';
			} else {
				document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
			}
		} else {
			document.getElementById('formatedAddress').innerHTML = '';
		}
	}

	function geocode() {
		var address = document.getElementById("address").value;
		geocoder.geocode({'address': address}, geocodeResult);
	}

	function geocodeResult(results, status) {
		if (status == 'OK' && results.length > 0) {
			map.fitBounds(results[0].geometry.viewport);
		} else {
			alert("Info : " + status);
		}
	}
</script>

<div class="clip-head bg-navy en">
	<button type="button" class="close white clip-close"><span aria-hidden="true" class="white">&times;</span>&nbsp;</button>
	<b>
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		MAP
	</b>
</div>
<table class="table no-margin">
<tbody>
<tr>
	<th class="col-xs-2 text-center">위치</th>
	<td>
		<button type="button" class="btn btn-white no-border">
			<span class="f-fon">
				<span id="formatedAddress">서울특별시청</span>
				(<span id="lat"></span>, <span id="lng"></span>, Zoom <span id="zoom_level"><?php echo $zoom; ?></span>)
			</span>
		</button>
	</td>
</tr>
<tr>
<th class="text-center">장소</th>
<td> 
	<div class="input-group">
		<input type="text" id="address" class="form-control" placeholder="Search for..." onKeyDown="if(event.keyCode==13){geocode();}">
		<span class="input-group-btn">
			<button type="button" class="btn btn-na-navy" onclick="geocode()">
				<i class="fa fa-search"></i>
				<span class="sound_only">검색하기</span>
			</button>
		</span>
	</div>
	<input type="hidden" id="map_lat" value="<?php echo $lat; ?>">
	<input type="hidden" id="map_lng" value="<?php echo $lng; ?>">
	<input type="hidden" id="map_zoom" value="<?php echo $zoom;?>">
</td>
</tr>
<tr>
	<th class="text-center">마커</th>
	<td>
		<input type="text" id="map_marker" class="form-control" value="<?php echo $marker; ?>">

		<div class="h10"></div>

		<button type="button" class="btn btn-na-red btn-block" onclick="map_submit()">
			<i class="fa fa-code" aria-hidden="true"></i>
			지도 코드생성
		</button>
	</td>
</tr>
</tbody>
</table>
<div class="na-mapwrap">
	<div id="map" class="na-map">
		<div id="map_canvas" class="na-canvas"></div>
		<div id="crosshair"></div>
	</div>
</div>

<script>
	function map_submit() {
		var code_lat = document.getElementById("map_lat").value;
		var code_lng = document.getElementById("map_lng").value;
		var code_zoom = document.getElementById("map_zoom").value;
		var code_marker = document.getElementById("map_marker").value;
		var code_place = document.getElementById("address").value;

		var code_geo = " geo=\"" + code_lat + "," + code_lng + "," + code_zoom + "\"";

		if(code_marker) 
			code_marker = " m=\"" + code_marker + "\"";

		if(code_place) 
			code_place = " p=\"" + code_place + "\"";

		var map_code = "{map: " + code_geo + code_marker + code_place + " }";

		<?php if($is_clip) { ?>
			$("#txtClip").val(map_code);
			$('#clipModal').modal('show');
		<?php } else { ?>
			parent.document.getElementById("wr_content").value += map_code;
			window.parent.closeClipModal();
		<?php } ?>
	}

	addLoadEvent(function() {
		initialize();
	});

	$(document).ready(function() {
		<?php if($is_clip) { ?>
			var clipboard = new ClipboardJS('.btn-clip');
			clipboard.on('success', function(e) {
				alert("복사가 되었으니 Ctrl + V 를 눌러 붙여넣기해 주세요.");
				$('#clipModal').modal('hide');
				window.parent.closeClipModal();
			});
			clipboard.on('error', function(e) {
				alert("복사가 안되었으니 Ctrl + C 를 눌러 복사해 주세요.");
			});
		<?php } ?>
		$('.clip-close').click(function() {
			window.parent.closeClipModal();
		});
	});
</script>

<?php 
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
