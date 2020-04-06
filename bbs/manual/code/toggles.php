<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>


<div class="div-title-wrap">
	<h2 class="div-title">Toggles</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<!-- Accordions : No Animation -->
<?php $toggle_id = 'toggle1'; ?>
<div class="div-panel no-animation panel-group at-toggle" id="<?php echo $toggle_id;?>">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#<?php echo $toggle_id;?>" href="#<?php echo $toggle_id;?>-c1" class="active">
				<span class="panel-icon"></span> <b>좋은 하루 되세요.</b>
			</a>
		</div>
		<div id="<?php echo $toggle_id;?>-c1" class="panel-collapse collapse in">
			<div class="panel-body">
				첫번째도 당신의 가정에 건강과 행복이 가득하기를 늘 기도드립니다.
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#<?php echo $toggle_id;?>" href="#<?php echo $toggle_id;?>-c2">
				<span class="panel-icon"></span> <b>좋은 하루 되세요.</b>
			</a>
		</div>
		<div id="<?php echo $toggle_id;?>-c2" class="panel-collapse collapse">
			<div class="panel-body">
				두번째도 당신의 가정에 건강과 행복이 가득하기를 늘 기도드립니다.
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#<?php echo $toggle_id;?>" href="#<?php echo $toggle_id;?>-c3">
				<span class="panel-icon"></span> <b>좋은 하루 되세요.</b>
			</a>
		</div>
		<div id="<?php echo $toggle_id;?>-c3" class="panel-collapse collapse">
			<div class="panel-body">
				세번째도 당신의 가정에 건강과 행복이 가득하기를 늘 기도드립니다.
			</div>
		</div>
	</div>
</div>



<div class="div-box-light" style="margin:30px 0;">
	<code>.no-animaition</code>을 입력하시면 애니메이션이 작동하지 않습니다.
</div>


<!-- Accordions : Animation -->
<?php $toggle_id = 'toggle2'; ?>
<div class="div-panel panel-group at-toggle" id="<?php echo $toggle_id;?>">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#<?php echo $toggle_id;?>" href="#<?php echo $toggle_id;?>-c1" class="active">
				<span class="panel-icon"></span> <b>좋은 하루 되세요.</b>
			</a>
		</div>
		<div id="<?php echo $toggle_id;?>-c1" class="panel-collapse collapse in">
			<div class="panel-body">
				첫번째도 당신의 가정에 건강과 행복이 가득하기를 늘 기도드립니다.
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#<?php echo $toggle_id;?>" href="#<?php echo $toggle_id;?>-c2">
				<span class="panel-icon"></span> <b>좋은 하루 되세요.</b>
			</a>
		</div>
		<div id="<?php echo $toggle_id;?>-c2" class="panel-collapse collapse">
			<div class="panel-body">
				두번째도 당신의 가정에 건강과 행복이 가득하기를 늘 기도드립니다.
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#<?php echo $toggle_id;?>" href="#<?php echo $toggle_id;?>-c3">
				<span class="panel-icon"></span> <b>좋은 하루 되세요.</b>
			</a>
		</div>
		<div id="<?php echo $toggle_id;?>-c3" class="panel-collapse collapse">
			<div class="panel-body">
				세번째도 당신의 가정에 건강과 행복이 가득하기를 늘 기도드립니다.
			</div>
		</div>
	</div>
</div>
