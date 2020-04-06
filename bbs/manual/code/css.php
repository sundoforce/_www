<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Basic CSS</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<p class="help-block">
	부트스트랩에서 지원하는 Alert 로 부트스트랩 스타일에 따라 달라질 수 있습니다.
</p>

<br>

<div class="div-title-wrap">
	<h4 class="div-title">Alert</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="alert alert-info" role="alert">
			<i class="fa fa-info-circle fa-lg"></i> Alert-Info
		</div>
	</div>
	<div class="col-sm-6">
		<div class="alert alert-success" role="alert">
			<i class="fa fa-check-circle fa-lg "></i> Alert-Success
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="alert alert-warning" role="alert">
			<i class="fa fa-cog fa-lg "></i> Alert-Warning
		</div>
	</div>
	<div class="col-sm-6">
		<div class="alert alert-danger" role="alert">
			<i class="fa fa-exclamation-triangle fa-lg "></i> Alert-Danger
		</div>
	</div>
</div>

<div class="clearfix" style="height:40px;"></div>

<div class="div-title-wrap">
	<h4 class="div-title">Alert Close</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="alert alert-shadow alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-info-circle fa-lg"></i> Alert-Info
		</div>
	</div>

	<div class="col-sm-6">
		<div class="alert alert-shadow alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-check-circle fa-lg "></i> Alert-Success
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="alert alert-shadow alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-cog fa-lg "></i> Alert-Warning
		</div>
	</div>
	<div class="col-sm-6">
		<div class="alert alert-shadow alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-exclamation-triangle fa-lg "></i> Alert-Danger
		</div>
	</div>
</div>

<div class="clearfix" style="height:40px;"></div>

<div class="div-title-wrap">
	<h4 class="div-title">Alert Customization</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="alert alert-shadow alert-dismissible" role="alert" style="border-width: 1px; border-color: rgb(236, 247, 212); color: rgb(236, 247, 212); background-color: rgb(162, 204, 85);">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-info-circle fa-lg"></i> Alert-Info
		</div>
	</div>

	<div class="col-sm-6">
		<div class="alert alert-shadow alert-dismissible" role="alert" style="border-width: 5px; border-color: rgb(116, 186, 219); color: rgb(116, 186, 219); background-color: rgb(255, 255, 255);">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-check-circle fa-lg "></i> Alert-Success
		</div>
	</div>
</div>

<div class="div-box text-center" style="border:0; background:rgb(245,245,245);">
	인라인 스타일(<code>style=""</code>)을 이용하여 원하는 형태로 변경할 수 있습니다.
</div>
