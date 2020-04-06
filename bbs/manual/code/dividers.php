<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Dividers</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="div-box-shadow">
	<div class="div-box text-center">
		8가지 타입의 디바이더를 지원하며, 타이틀의 경우 h1 ~ h6 및 div 등과 같이 사용할 수 있습니다.
	</div>
</div>

<div class="clearfix h40"></div>


<div class="div-title-wrap">
	<h4 class="div-title">Middle Line Title</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<p class="help-block">
	타이틀 우측에 라인이 출력되는 형태로 가는 옆선(<code>.sep-thin</code>)과 두꺼운 옆선(<code>.sep-bold</code>)의 2가지 스타일이 있습니다.
</p>

<br>

<div class="div-title-wrap">
	<div class="div-title"><b>타이틀 - 가는 옆선</b></div>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>



<div class="clearfix h40"></div>



<div class="div-title-wrap">
	<div class="div-title"><b>타이틀 - 두꺼운 옆선</b></div>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>



<div class="clearfix h40"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Bottom Line Title</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<p class="help-block">
	타이틀 하단에 라인이 출력되는 형태로 가는 선(<code>.div-title-line-thin</code>)과 두꺼운 선(<code>.div-title-line-bold</code>)의 2가지 스타일이 있습니다.
</p>

<br>

<div class="div-title-line-thin">
	<b>타이틀 - 가는 하단선</b>
</div>


<div class="clearfix h40"></div>


<div class="div-title-line-bold">
	<b>타이틀 - 두꺼운 하단선</b>
</div>



<div class="clearfix h40"></div>



<div class="div-title-wrap">
	<h4 class="div-title">UnderLine Title</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<p class="help-block">
	타이틀에 밑줄이 출력되는 형태로 가는 선(<code>.div-title-underline-thin</code>)과 두꺼운 선(<code>.div-title-underline-bold</code>)의 2가지 스타일이 있습니다.
</p>

<br>

<div class="div-title-underline-thin">
	<b>타이틀 - 가는 밑줄</b>
</div>


<div class="clearfix h40"></div>


<div class="div-title-underline-bold">
	<b>타이틀 - 두꺼운 밑줄</b>
</div>



<div class="clearfix h40"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Divider with FontAwesome</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<p class="help-block">
	<code>&lt;?php echo apms_line('fa', 'FontAwesom Icon');?></code> 코드를 이용하여 폰트어썸과 함께 라인을 표시할 수 있습니니다.
	예를들어 하트 아이콘을 적용하고 싶다면 <code>&lt;?php echo apms_line('fa', 'fa-heart');?></code> 를 입력하시면 됩니다.
	아이콘 미입력시 기본값(<code>&lt;?php echo apms_line('fa');?></code>)은 <code>fa-chevron-down</code> 아이콘입니다.
</p>

<br>

<?php echo apms_line('fa'); // FA Icon Line ?>




<div class="clearfix h40"></div>




<div class="div-title-wrap">
	<h4 class="div-title">Divider with Shadow</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<p class="help-block">
	그림자 있는 라인은 <code>&lt;?php echo apms_line('shadow');?></code> 코드를 이용하여 표시할 수 있습니다. 
</p>

<br>

<?php echo apms_line('shadow'); // Shadow Line ?>
