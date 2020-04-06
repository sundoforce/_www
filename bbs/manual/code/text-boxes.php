<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Text Boxes</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<p class="help-block">
	4가지 타입의 텍스트 박스를 지원하나 커스마이징을 통해 다양하게 사용하실 수 있습니다.
</p>

<br>

<div class="div-box-shadow">
	<div class="div-box">
		그림자있는 박스로
		<code>
			&lt;div class="div-box-shadow">&lt;div class="div-box">...&lt;/div>&lt;/div>
		</code>
		형식으로 적용합니다.
	</div>
</div>


<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>


<div class="div-box-shadow">
	<div class="div-box" style="border-top-color:rgb(233, 27, 35); background:rgb(245, 245, 245);">
		<a class="btn btn-color btn-sm pull-right" role="button">Button</a>
		커스트마이징
		<code>
			&lt;div class="div-box" style="border-top-color:rgb(233, 27, 35); background:rgb(245, 245, 245);">
		</code>
	</div>
</div>



<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>



<div class="div-box-shadow">
	<div class="div-box" style="border-width: 0px 0px 0px 3px; border-left-color:rgb(51, 51, 51);">
		커스트마이징
		<code>
			&lt;div class="div-box" style="border-top-color:rgb(233, 27, 35);">
		</code>
	</div>
</div>



<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>



<div class="div-box">
	일반박스로
	<code>
		&lt;div class="div-box">...&lt;/div>
	</code>
	형식으로 적용합니다.
</div>



<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>



<div class="div-box border-green" style="border-width:3px;">
	커스트마이징
	<code>
		&lt;div class="div-box border-green" style="border-width:3px;">
	</code>
</div>



<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>


<p class="help-block">
	<i class="fa fa-cog"></i> 그림자 <code>&lt;?php echo apms_shadow('num');?></code> 를 활용하여 보다 다양하게 표현할 수 있습니다.
</p>

<div class="div-box">
	박스 하단에 2번 그림자 <code>&lt;?php echo apms_shadow('2');?></code> 등록
</div>
<?php echo apms_shadow('2'); // 그림자 ?>


<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>



<div class="div-box-light">
	<code>&lt;div class="div-box-light"></code> 로 표현할 수 있습니다.
</div>



<div class="clearfix h40"></div>


<div class="div-box-light border-red">
	<code>&lt;div class="div-box-light border-red"></code> 형태나 직접 스타일 추가로 커스트마이징할 수 있습니다.
</div>




<div class="clearfix h40"></div>
<?php echo apms_line('fa'); // FA Icon Line ?>
<div class="clearfix h40"></div>




<div class="div-box-dark">
	<code>&lt;div class="div-box-dark"></code> 로 표현할 수 있습니다.
</div>

