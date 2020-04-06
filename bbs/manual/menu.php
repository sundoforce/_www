<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-panel no-animation panel-group at-toggle" id="apms_manual">

	<?php $cfdir = 'start'; // 위치체크용 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#apms_manual" href="#<?php echo $cfdir;?>"<?php echo (!$fdir || $fdir == $cfdir) ? ' class="active"' : '';?>>
				<span class="panel-icon"></span> <b>시작하기</b>
			</a>
		</div>
		<div id="<?php echo $cfdir;?>" class="panel-collapse collapse<?php echo (!$fdir || $fdir == $cfdir) ? ' in' : '';?>">
			<div class="list-group">
				<?php $sname = 'install'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					설치하기
				</a>
				<?php $sname = 'start'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					시작하기
				</a>
				<?php $sname = 'menu'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					메뉴설정
				</a>
			</div>
		</div>
	</div>
	<?php $cfdir = 'use'; // 위치체크용 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#apms_manual" href="#<?php echo $cfdir;?>"<?php echo (!$fdir || $fdir == $cfdir) ? ' class="active"' : '';?>>
				<span class="panel-icon"></span> <b>활용하기</b>
			</a>
		</div>
		<div id="<?php echo $cfdir;?>" class="panel-collapse collapse<?php echo ($fdir == $cfdir) ? ' in' : '';?>">
			<div class="list-group">
				<a href="#" class="list-group-item">
					준비중
				</a>
			</div>
		</div>
	</div>
	<?php $cfdir = 'code'; // 위치체크용 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#apms_manual" href="#<?php echo $cfdir;?>"<?php echo ($fdir == $cfdir) ? ' class="active"' : '';?>>
				<span class="panel-icon"></span> <b>활용코드</b>
			</a>
		</div>
		<div id="<?php echo $cfdir;?>" class="panel-collapse collapse<?php echo ($fdir == $cfdir) ? ' in' : '';?>">
			<div class="list-group">
				<?php $sname = 'css'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					기본 CSS
				</a>
				<?php $sname = 'dividers'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					디바이더
				</a>

				<?php $sname = 'text-boxes'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					텍스트 박스
				</a>

				<?php $sname = 'content-boxes'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					컨텐츠 박스
				</a>

				<?php $sname = 'flip-boxes'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					플립 박스
				</a>

				<?php $sname = 'image-frames'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					이미지 프레임
				</a>

				<?php $sname = 'box-frames'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					박스 프레임
				</a>

				<?php $sname = 'person'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					사람 / 팀 / 조직
				</a>

				<?php $sname = 'flex-sliders'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					플렉스 슬라이더
				</a>

				<?php $sname = 'shadows'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					그림자
				</a>

				<?php $sname = 'timeline'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					타임라인 - 2칼럼 
				</a>

				<?php $sname = 'timeline-one'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					타임라인 - 1칼럼
				</a>

				<?php $sname = 'talk-boxes'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					토크 박스
				</a>

				<?php $sname = 'form-boxes'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					폼 박스
				</a>

				<?php $sname = 'toggles'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					토글
				</a>

				<?php $sname = 'labels'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					라벨
				</a>

				<?php $sname = 'tabs'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					분류탭
				</a>

				<?php $sname = 'alerts'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					경고창
				</a>

				<?php $sname = 'progress-bars'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					진행바
				</a>

				<?php $sname = 'buttons'; ?>
				<a href="./guide.php?fdir=<?php echo $cfdir;?>&amp;fname=<?php echo urlencode($sname);?>" class="list-group-item<?php echo menu_on($sname);?>">
					버튼
				</a>

			</div>
		</div>
	</div>

	<?php $cfdir = 'func'; // 위치체크용 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#apms_manual" href="#<?php echo $cfdir;?>"<?php echo ($fdir == $cfdir) ? ' class="active"' : '';?>>
				<span class="panel-icon"></span> <b>활용함수</b>
			</a>
		</div>
		<div id="<?php echo $cfdir;?>" class="panel-collapse collapse<?php echo ($fdir == $cfdir) ? ' in' : '';?>">
			<div class="list-group">
				<a href="#" class="list-group-item">
					준비중
				</a>
			</div>
		</div>
	</div>

	<?php $cfdir = 'make'; // 위치체크용 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#apms_manual" href="#<?php echo $cfdir;?>"<?php echo ($fdir == $cfdir) ? ' class="active"' : '';?>>
				<span class="panel-icon"></span> <b>제작하기</b>
			</a>
		</div>
		<div id="<?php echo $cfdir;?>" class="panel-collapse collapse<?php echo ($fdir == $cfdir) ? ' in' : '';?>">
			<div class="list-group">
				<a href="#" class="list-group-item">
					준비중
				</a>
			</div>
		</div>
	</div>

	<?php $cfdir = 'error'; // 위치체크용 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#apms_manual" href="#<?php echo $cfdir;?>"<?php echo ($fdir == $cfdir) ? ' class="active"' : '';?>>
				<span class="panel-icon"></span> <b>문제해결</b>
			</a>
		</div>
		<div id="<?php echo $cfdir;?>" class="panel-collapse collapse<?php echo ($fdir == $cfdir) ? ' in' : '';?>">
			<div class="list-group">
				<a href="#" class="list-group-item">
					준비중
				</a>
			</div>
		</div>
	</div>
</div>