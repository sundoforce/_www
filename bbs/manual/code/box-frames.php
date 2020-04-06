<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<div class="div-title-wrap">
	<h2 class="div-title">Box Frames</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="text-center">
	<div class="boxframe block">

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

		<?php echo apms_shadow('2');?>
	</div>
</div>

<?php echo apms_line('fa'); // FA Line ?>

<div class="text-center">
	<div class="boxframe box-border">
		<div class="box-wrap">
			<!-- BS3 16:9 aspect ratio -->
			<div class="embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/N5wzkQvzp4c?autohide=1&vq=hd720" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>

<?php echo apms_line('fa'); // FA Line ?>

<div class="text-center">
	<div class="boxframe box-grow">
		<div class="box-wrap">
			<!-- BS3 16:9 aspect ratio -->
			<div class="embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/N5wzkQvzp4c?autohide=1&vq=hd720" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>

<?php echo apms_line('fa'); // FA Line ?>

<div class="text-center">
	<div class="boxframe box-shadow">
		<div class="box-wrap">
			<!-- BS3 16:9 aspect ratio -->
			<div class="embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/N5wzkQvzp4c?autohide=1&vq=hd720" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>

<?php echo apms_line('fa'); // FA Line ?>

<div class="text-center">
	<!-- BS3 16:9 aspect ratio -->
	<div class="boxframe" style="max-width:560px;">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/N5wzkQvzp4c?autohide=1&vq=hd720" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php echo apms_shadow('1');?>
	</div>
</div>

<?php echo apms_line('fa'); // FA Line ?>

<div class="text-center">
	<div class="boxframe block box-bottomshadow">
		<div class="box-wrap">



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
								<div class="slide-content content-right">
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


		</div>
	</div>
</div>
