<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

?>

<div class="div-title-wrap">
	<h2 class="div-title">Flex Sliders</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="div-box-shadow">
	<div class="div-box">
		Flex Slider 사용법은 <a href="https://github.com/woothemes/FlexSlider" target="_blank">FlexSlider(github)</a> 또는 <a href="http://flexslider.woothemes.com/" target="_blank">FlexSlider(woothemes)</a> 를 참고해 주세요.
	</div>
</div>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Title Style</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<?php 
	apms_script('flexslider'); // Flex Slider 불러오기
	$slider_id = apms_id(); // Flex Slider ID 생성
?>
<div id="<?php echo $slider_id;?>" class="flexslider">
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
<script>
$(window).load(function() {
	$('#<?php echo $slider_id;?>').flexslider({
		animation: "fade"
	});
});
</script>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Image Style</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<?php 
			apms_script('flexslider'); // Flex Slider 불러오기
			$slider_id = apms_id(); // Flex Slider ID 생성
		?>
		<div id="<?php echo $slider_id;?>" class="flexslider">
			<ul class="slides">
				<li>
					<div class="img-wrap">
						<div class="img-item">
							<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
						</div>
					</div>
				</li>
				<li>
					<div class="img-wrap">
						<div class="img-item">
							<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<script>
		$(window).load(function() {
			$('#<?php echo $slider_id;?>').flexslider({
				animation: "slide"
			});
		});
		</script>
	</div>
	<div class="col-md-6">
		<?php 
			apms_script('flexslider'); // Flex Slider 불러오기
			$slider_id = apms_id(); // Flex Slider ID 생성
		?>
		<div id="<?php echo $slider_id;?>" class="flexslider">
			<ul class="slides">
				<li>
					<div class="img-wrap">
						<div class="img-item">
							<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
						</div>
					</div>
				</li>
				<li>
					<div class="img-wrap">
						<div class="img-item">
							<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<script>
		$(window).load(function() {
			$('#<?php echo $slider_id;?>').flexslider({
				animation: "fade",
				controlNav: false
			});
		});
		</script>
	</div>
</div>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Content Style</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<?php 
	apms_script('flexslider'); // Flex Slider 불러오기
	$slider_id = apms_id(); // Flex Slider ID 생성
?>
<div id="<?php echo $slider_id;?>" class="flexslider">
	<ul class="slides">
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
					<div class="slide-content content-left">
						<h2 class="font-18 no-margin">
							<a href="#">Flex Slider #01</a>
						</h2>
						<br>
						<p>
							컨텐츠는 content-left, content-right, content-bottom의 위치지정이 가능하며, 혼합해서 사용할 수도 있습니다.
						</p>
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
					<div class="slide-content content-bottom">
						<h2 class="font-18 no-margin">
							<a href="#">Flex Slider #02</a>
						</h2>
						<br>
						<p>
							컨텐츠는 content-left, content-right, content-bottom의 위치지정이 가능하며, 혼합해서 사용할 수도 있습니다.
						</p>
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img2.jpg"></a>
					<div class="slide-content content-right trans-bg-red">
						<h2 class="font-18 no-margin">
							<a href="#">Flex Slider #03</a>
						</h2>
						<br>
						<p>
							컨텐츠는 content-left, content-right, content-bottom의 위치지정이 가능하며, 혼합해서 사용할 수도 있습니다.
						</p>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<script>
$(window).load(function() {
	$('#<?php echo $slider_id;?>').flexslider({
		animation: "fade"
	});
});
</script>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Carousel Style</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<?php 
	apms_script('flexslider'); // Flex Slider 불러오기
	$slider_id = apms_id(); // Flex Slider ID 생성
?>
<style>
	#<?php echo $slider_id;?> .slides li { margin-right:10px; }
</style>
<div id="<?php echo $slider_id;?>" class="flexslider carousel">
	<ul class="slides">
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img2.jpg"></a>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img2.jpg"></a>
				</div>
			</div>
		</li>
	</ul>
</div>
<script>
$(window).load(function() {
	$('#<?php echo $slider_id;?>').flexslider({
		animation: "slide",
		controlNav: false,
		itemWidth: 210,
		itemMargin: 10,
		minItems: 2,
		maxItems: 3
	});
});
</script>



<div class="clearfix" style="height:40px;"></div>



<div class="div-title-wrap">
	<h4 class="div-title">Caption Style</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<?php 
	apms_script('flexslider'); // Flex Slider 불러오기
	$slider_id = apms_id(); // Flex Slider ID 생성
?>
<style>
	#<?php echo $slider_id;?> .slides li { margin-right:10px; }
</style>
<div id="<?php echo $slider_id;?>" class="flexslider carousel">
	<ul class="slides">
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
					<div class="slide-caption trans-bg-black">
						좋은 하루 되세요.
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
					<div class="slide-caption trans-bg-red">
						좋은 하루 되세요.
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img2.jpg"></a>
					<div class="slide-caption trans-bg-blue trans-bg-full">
						좋은 하루 되세요.
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
					<div class="slide-caption trans-bg-green">
						좋은 하루 되세요.
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
					<div class="slide-caption trans-bg-violet">
						좋은 하루 되세요.
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="img-wrap">
				<div class="img-item">
					<a href="#"><img draggable="false" alt="" src="./manual/img/img2.jpg"></a>
					<div class="slide-caption trans-bg-orange trans-bg-full">
						좋은 하루 되세요.
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<script>
$(window).load(function() {
	$('#<?php echo $slider_id;?>').flexslider({
		animation: "slide",
		controlNav: false,
		itemWidth: 210,
		itemMargin: 10,
		minItems: 2,
		maxItems: 3
	});
});
</script>

<p class="help-block">
	<i class="fa fa-microphone"></i> 캡션은 .hover-black, .hover-red, .hover-blue, .hover-green 등 다양한 배경색 지정이 가능하며, .hover-full 설정으로 100% 꽉찬 형태도 가능합니다.
</p>


<div class="clearfix" style="height:40px;"></div>


<div class="div-title-wrap">
	<h4 class="div-title">Slider with Image Frames</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<?php 
	apms_script('flexslider'); // Flex Slider 불러오기
	$slider_id = apms_id(); // Flex Slider ID 생성
?>
<style>
	#<?php echo $slider_id;?> .flex-control-nav { bottom: 10px; }
</style>
<div id="<?php echo $slider_id;?>" class="flexslider">
	<ul class="slides">
		<li>
			<div class="imgframe img-shadow">
				<div class="img-wrap" style="border:10px solid #fff;">
					<div class="img-item">
						<a href="#"><img draggable="false" alt="" src="./manual/img/img.jpg"></a>
						<h2 class="slide-title font-18">
							<a href="#">Flex Slider #01</a>
						</h2>
					</div>
				</div>
			</div>
		</li>
		<li>
			<div class="imgframe img-shadow">
				<div class="img-wrap" style="border:10px solid #fff;">
					<div class="img-item">
						<a href="#"><img draggable="false" alt="" src="./manual/img/img1.jpg"></a>
						<h2 class="slide-title font-18">
							<a href="#">Flex Slider #02</a>
						</h2>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<script>
$(window).load(function() {
	$('#<?php echo $slider_id;?>').flexslider({
		animation: "fade"
	});
});
</script>
