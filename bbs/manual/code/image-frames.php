<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Image Frames</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="div-box-shadow">
	<div class="div-box">
		이미지 프레임의 기본 height는 16:9(56.25%)입니다. 이미지 프레임의 heigth 조절은 <code>.img-wrap</code> 에 <code>style="padding-bottom:100%;"</code> 처럼 인라인 스타일로 padding-bottom 값을 적용해 주시면 됩니다.
		<div class="clearfix" style="height:15px;"></div>
		반응형으로 적용시 padding-bottom에 %값을 지정해 주면 되는데, 이때 hegith는 <code>width × %</code> 로 변화됩니다. 예를들어 padding-bottom:100% 라고 설정했다면, width가 100px 일 때 height는 100px * 100% = 100px 가 되어 정사각형 이미지 프레임이 됩니다. 참고로 16:9가 width 대비 height 비율이 56.25%입니다.반면 padding-bottom:100px 처럼 입력하면 height는 width와 상관없이 항상 100px로 고정됩니다.
		<div class="clearfix" style="height:15px;"></div>
		실제 이미지 크기는 max-width:100%; height:auto 로 적용되어 있어서 이미지 프레임보다 작은 이미지는 원본 크기가 출력되도록 있습니다. 이를 이미지 프레임 크기에 꽉차도록 적용하고 싶으시면 <code>&lt;div class="img-itme img-full"></code> 처럼 <code>.img-item</code> 에 <code>.img-full</code> 클래스를 추가해 주시면 됩니다.
	</div>
</div>



<div class="clearfix h40"></div>




<div class="imgframe">
	<div class="img-wrap" style="padding-bottom:100%;">
		<div class="img-item img-full">
			<img src="./manual/img/img.jpg">
		</div>
	</div>
</div>



<?php echo apms_line('fa'); // FA Line ?>

<div class="clearfix h10"></div>



<div class="row">
	<div class="col-sm-6">
		<div class="imgframe img-border">
			<div class="img-wrap">
				<div class="img-item">
					<img src="./manual/img/img.jpg">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="imgframe img-grow">
			<div class="img-wrap">
				<div class="img-item">
					<img src="./manual/img/img.jpg">
				</div>
			</div>
		</div>
	</div>
</div>



<?php echo apms_line('fa'); // FA Line ?>

<div class="clearfix h10"></div>


<div class="row">
	<div class="col-sm-6">
		<div class="imgframe img-shadow">
			<div class="img-wrap">
				<div class="img-item">
					<img src="./manual/img/img.jpg">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="imgframe img-bottomshadow">
			<div class="img-wrap">
				<div class="img-item">
					<img src="./manual/img/img.jpg">
				</div>
			</div>
		</div>
	</div>
</div>



<?php echo apms_line('fa'); // FA Line ?>

<div class="clearfix h10"></div>



<div class="row">
	<div class="col-sm-6">
		<div class="imgframe img-shadow">
			<div class="img-wrap" style="border:10px solid #fff;">
				<div class="img-item">
					<img src="./manual/img/img.jpg">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="imgframe img-bottomshadow">
			<div class="img-wrap" style="border:10px solid #fff;">
				<div class="img-item">
					<img src="./manual/img/img.jpg">
				</div>
			</div>
		</div>
	</div>
</div>



<?php echo apms_line('fa'); // FA Line ?>

<div class="clearfix h10"></div>



<div class="imgframe">
	<div class="img-wrap" style="padding-bottom:30%;">
		<div class="img-item">
			<img src="./manual/img/img.jpg" style="margin-top:-150px;">
		</div>
	</div>
</div>
