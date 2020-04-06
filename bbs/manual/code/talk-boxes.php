<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Talk Boxes</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="talk-box-wrap">
			<img src="./manual/img/photo.jpg" class="talker-photo pull-right">
			<div class="talk-box talk-left">
				<div class="talk-bubble">
					좌측에 말풍선이 표현되는 형태로 <code>.talk-left</code>로 설정할 수 있습니다.
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="talk-box-wrap">
			<i class="fa fa-comment talker-photo pull-left"></i>
			<div class="talk-box talk-right">
				<div class="talk-bubble">
					좌측에 말풍선이 표현되는 형태로 <code>.talk-right</code>로 설정할 수 있습니다.
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<?php echo apms_line('fa'); // FA Icon Line ?>


<div class="row">
	<div class="col-sm-6">
		<div class="talk-box-wrap">
			<div class="talk-box talk-top">
				<div class="talk-bubble">
					상단에 말풍선이 표현되는 형태로 <code>.talk-top</code>로 설정가능합니다.
					말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
					두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
				</div>
				<div class="talker-one">
					<i class="fa fa-pencil talker-photo" style="margin-right:8px;"></i>
					이름
					<div class="talker-info pull-right text-muted font-13 en">
						<i class="fa fa-comment"></i> <span class="en red">3</span>
						<i class="fa fa-eye"></i> <span class="en violet">6</span>
						<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="talk-box-wrap">
			<div class="talk-box talk-bottom">
				<div class="talker-two">
					<img src="./manual/img/photo.jpg" class="talker-photo pull-left" style="margin-right:12px;">
					이름
					<div class="talker-info text-muted font-13 en">
						<i class="fa fa-comment"></i> <span class="en red">3</span>
						<i class="fa fa-eye"></i> <span class="en violet">6</span>
						<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="talk-bubble">
					하단에 말풍선이 표현되는 형태로 <code>.talk-bottom</code>로 설정가능합니다.
					말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
					두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix" style="height:30px;"></div>

<div class="div-title-wrap">
	<h4 class="div-title">Talk Box width Flex Slider</h4>
	<div class="div-sep-wrap">
		<div class="div-sep sep-thin"></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<?php 
			apms_script('flexslider'); // Flex Slider 불러오기
			$slider_id = apms_id(); // Flex Slider ID 생성
		?>
		<div id="<?php echo $slider_id;?>" class="slider-flex flexslider">
			<ul class="slides">
				<li>
					<div class="talk-box-wrap">
						<div class="talk-box talk-bottom">
							<div class="talker-one">
								<img src="./manual/img/photo.jpg" class="talker-photo" style="margin-right:8px;">
								이름
								<div class="talker-info pull-right text-muted font-13 en">
									<i class="fa fa-comment"></i> <span class="en red">3</span>
									<i class="fa fa-eye"></i> <span class="en violet">6</span>
									<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="talk-bubble">
								<div style="line-height:18px; height:75px; overflow:hidden;"">
									하단에 말풍선이 표현되는 형태로 <code>.talk-bottom</code>로 설정가능합니다.
									말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
									두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="talk-box-wrap">
						<div class="talk-box talk-bottom">
							<div class="talker-one">
								<i class="fa fa-user talker-photo" style="margin-right:8px;"></i>
								이름
								<div class="talker-info pull-right text-muted font-13 en">
									<i class="fa fa-comment"></i> <span class="en red">3</span>
									<i class="fa fa-eye"></i> <span class="en violet">6</span>
									<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="talk-bubble">
								<div style="line-height:18px; height:75px; overflow:hidden;"">
									하단에 말풍선이 표현되는 형태로 <code>.talk-bottom</code>로 설정가능합니다.
									말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
									두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
								</div>
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
				controlNav: false
			});
		});
		</script>
	</div>
	<div class="col-sm-8">
		<?php 
			apms_script('flexslider'); // Flex Slider 불러오기
			$slider_id = apms_id(); // Flex Slider ID 생성
		?>
		<style>
			#<?php echo $slider_id;?> .slides li { margin-right:10px; }
		</style>
		<div id="<?php echo $slider_id;?>" class="slider-flex flexslider">
			<ul class="slides">
				<li>
					<div class="talk-box-wrap">
						<div class="talk-box talk-top">
							<div class="talk-bubble">
								<div style="line-height:18px; height:75px; overflow:hidden;"">
									상단에 말풍선이 표현되는 형태로 <code>.talk-top</code>로 설정가능합니다.
									말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
									두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
								</div>
							</div>
							<div class="talker-one">
								<img src="./manual/img/photo.jpg" class="talker-photo" style="margin-right:8px;">
								이름
								<div class="talker-info pull-right text-muted font-13 en">
									<i class="fa fa-comment"></i> <span class="en red">3</span>
									<i class="fa fa-eye"></i> <span class="en violet">6</span>
									<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="talk-box-wrap">
						<div class="talk-box talk-top">
							<div class="talk-bubble">
								<div style="line-height:18px; height:75px; overflow:hidden;"">
									상단에 말풍선이 표현되는 형태로 <code>.talk-top</code>로 설정가능합니다.
									말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
									두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
								</div>
							</div>
							<div class="talker-one">
								<i class="fa fa-user talker-photo" style="margin-right:8px;"></i>
								이름
								<div class="talker-info pull-right text-muted font-13 en">
									<i class="fa fa-comment"></i> <span class="en red">3</span>
									<i class="fa fa-eye"></i> <span class="en violet">6</span>
									<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="talk-box-wrap">
						<div class="talk-box talk-top">
							<div class="talk-bubble">
								<div style="line-height:18px; height:75px; overflow:hidden;"">
									상단에 말풍선이 표현되는 형태로 <code>.talk-top</code>로 설정가능합니다.
									말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
									두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
								</div>
							</div>
							<div class="talker-one">
								<img src="./manual/img/photo.jpg" class="talker-photo" style="margin-right:8px;">
								이름
								<div class="talker-info pull-right text-muted font-13 en">
									<i class="fa fa-comment"></i> <span class="en red">3</span>
									<i class="fa fa-eye"></i> <span class="en violet">6</span>
									<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="talk-box-wrap">
						<div class="talk-box talk-top">
							<div class="talk-bubble">
								<div style="line-height:18px; height:75px; overflow:hidden;"">
									상단에 말풍선이 표현되는 형태로 <code>.talk-top</code>로 설정가능합니다.
									말하는 이를 한줄로 표현하고 싶으면 <code>.talker-one</code>를,
									두 줄로 표현하고 싶으면 <code>.talker-two</code> 를 이용하시면 됩니다.
								</div>
							</div>
							<div class="talker-one">
								<i class="fa fa-user talker-photo" style="margin-right:8px;"></i>
								이름
								<div class="talker-info pull-right text-muted font-13 en">
									<i class="fa fa-comment"></i> <span class="en red">3</span>
									<i class="fa fa-eye"></i> <span class="en violet">6</span>
									<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
								</div>
								<div class="clearfix"></div>
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
				minItems: 1,
				maxItems: 2
			});
		});
		</script>
	</div>
</div>