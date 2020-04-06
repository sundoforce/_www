<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Shadows</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<p class="help-block">
	4가지 타입의 그림자를 지원하며 <code>&lt;?php echo apms_shadow('Line Number');?></code> 로 출력합니다.
	예를들어 그림자 1 스타일을 적용하고 싶으면 <code>&lt;?php echo apms_shadow('1');?></code> 이라고 해 주시면 됩니다.
	이미지, Flix Slider, Tagline Box, Carousel, Table 등 여러 곳에 적용할 수 있습니다.
</p>

<br>

<div class="div-title-wrap">
	<h4 class="div-title">Shadow 1</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<div class="imgframe">
	<div class="img-wrap">
		<div class="img-item">
			<img src="./manual/img/img.jpg">
		</div>
	</div>
</div>
<?php echo apms_shadow('1'); // Shadow ?>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Shadow 2</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>



<div class="imgframe">
	<div class="img-wrap">
		<div class="img-item">
			<img src="./manual/img/img.jpg">
		</div>
	</div>
</div>
<?php echo apms_shadow('2'); // Shadow ?>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Shadow 3</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>


<div class="imgframe">
	<div class="img-wrap">
		<div class="img-item">
			<img src="./manual/img/img.jpg">
		</div>
	</div>
</div>
<?php echo apms_shadow('3'); // Shadow ?>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Shadow 4</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>


<div class="imgframe">
	<div class="img-wrap">
		<div class="img-item">
			<img src="./manual/img/img.jpg">
		</div>
	</div>
</div>
<?php echo apms_shadow('4'); // Shadow ?>



<div class="clearfix" style="height:40px;"></div>


<div class="div-title-wrap">
	<h4 class="div-title">Flex Slider with Shadow</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<?php 
	apms_script('flexslider'); // Flex Slider 불러오기
	$slider_id = apms_id(); // Flex Slider ID 생성
?>
<div id="<?php echo $slider_id;?>" class="slider-flex flexslider">
	<ul class="slides">
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
					<h2 class="slide-title font-18">
						<a href="#">Flex Slider #01</a>
					</h2>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
					<h2 class="slide-title font-18">
						<a href="#">Flex Slider #02</a>
					</h2>
				</div>
			</div>
		</li>
	</ul>
</div>
<?php echo apms_shadow('1'); // Shadow ?>

<script>
$(window).load(function() {
	$('#<?php echo $slider_id;?>').flexslider({
		animation: "fade"
	});
});
</script>

<div class="clearfix" style="height:20px;"></div>

<div class="div-box text-center">
	그림자는 이미지, Flix Slider, Tagline Box, Carousel, Table 등 여러 곳에 적용할 수 있습니다.
</div>