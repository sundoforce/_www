<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 스크립트 로딩
apms_script('timeline');
?>

<div class="div-title-wrap">
	<h2 class="div-title">Timeline : One Column</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="timeline animated timeline-one">
	<div class="timeline-row timeline-sep">
		<div class="timeline-label en bg-black">
			<i>Mar 2033</i>
		</div>
		<div class="timeline-time en">
			<i class="fa fa-clock-o fa-lg lightgray"></i> 2033.03.03 03:33 PM
		</div>
		<div class="timeline-icon">
			<img src="./manual/img/photo.jpg">
		</div>
		<div class="timeline-content">
			<a href="#">
				<img src="./manual/img/img.jpg" class="img-responsive">
			</a>
	
			<div class="timeline-desc">
				<div class="timeline-heading">
					<a href="#">타임라인 예제입니다.</a>
				</div>
				<div class="timeline-explan">
					타임라인 사용을 위해서 먼저 <code>&lt;?php apms_script('timeline');?></code> 으로 먼저 타임라인 스크립트 호출해야 합니다.
					<br>
					타임라인은 Two 칼럼과 One 칼럼 2가지가 있으며, 기본은 Two 칼럼입니다. <code>.timeline</code>에 <code>.timeline-one</code>를 추가해 주시면 One 칼럼으로 사용할 수 있습니다.
				</div>
				<div class="timeline-info text-muted">
					<div class="timeline-details pull-right font-13">
						<i class="fa fa-comment"></i> <span class="en red">3</span>
						<i class="fa fa-eye"></i> <span class="en violet">6</span>
						<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
					</div>
					글쓴이
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="timeline-row">
		<div class="timeline-time en">
			<i class="fa fa-clock-o fa-lg lightgray"></i> 2033.03.03 03:33 AM
		</div>
		<div class="timeline-icon">
			<i class="fa fa-picture-o bg-orange"></i>
		</div>
		<div class="timeline-content">
			<a href="#">
				<img src="./manual/img/img1.jpg" class="img-responsive">
			</a>
	
			<div class="timeline-desc">
				<div class="timeline-heading">
					<a href="#">타임라인 예제입니다.</a>
				</div>
				<div class="timeline-explan">
					타임라인 사용을 위해서 먼저 <code>&lt;?php apms_script('timeline');?></code> 으로 먼저 타임라인 스크립트 호출해야 합니다.
					<br>
					타임라인은 Two 칼럼과 One 칼럼 2가지가 있으며, 기본은 Two 칼럼입니다. <code>.timeline</code>에 <code>.timeline-one</code>를 추가해 주시면 One 칼럼으로 사용할 수 있습니다.
				</div>
				<div class="timeline-info text-muted">
					<div class="timeline-details pull-right font-13">
						<i class="fa fa-comment"></i> <span class="en red">3</span>
						<i class="fa fa-eye"></i> <span class="en violet">6</span>
						<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
					</div>
					글쓴이
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="timeline-row timeline-sep">
		<div class="timeline-label en bg-black">
			<i>Feb 2022</i>
		</div>
		<div class="timeline-time en">
			<i class="fa fa-clock-o fa-lg lightgray"></i> 2022.02.22 02:22 PM
		</div>
		<div class="timeline-icon">
			<i class="fa fa-comment bg-green"></i>
		</div>
		<div class="timeline-content">
			<a href="#">
				<img src="./manual/img/img2.jpg" class="img-responsive">
			</a>
	
			<div class="timeline-desc">
				<div class="timeline-heading">
					<a href="#">타임라인 예제입니다.</a>
				</div>
				<div class="timeline-explan">
					타임라인 사용을 위해서 먼저 <code>&lt;?php apms_script('timeline');?></code> 으로 먼저 타임라인 스크립트 호출해야 합니다.
					<br>
					타임라인은 Two 칼럼과 One 칼럼 2가지가 있으며, 기본은 Two 칼럼입니다. <code>.timeline</code>에 <code>.timeline-one</code>를 추가해 주시면 One 칼럼으로 사용할 수 있습니다.
				</div>
				<div class="timeline-info text-muted">
					<div class="timeline-details pull-right font-13">
						<i class="fa fa-comment"></i> <span class="en red">3</span>
						<i class="fa fa-eye"></i> <span class="en violet">6</span>
						<i class="fa fa-thumbs-up"></i> <span class="en blue">9</span>
					</div>
					글쓴이
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>


</div>