<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<div class="div-title-wrap">
	<h2 class="div-title">Form Boxes</h2>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<h4 class="div-title-underline-thin">Form #01</h4>
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">



		<div class="form-box">
			<div class="form-header">
				<h2>Sign In</h2>
			</div>
			<div class="form-body">
				<form class="form" role="form">
					<div class="form-group">
					<label>아이디</label>
					<input type="text" class="form-control" id="txtid" placeholder="">
					</div>
					<div class="form-group">
					<label>비밀번호</label>
					<input type="password" class="form-control" id="txtPassword" placeholder="">
					</div>
					<div class="row">
						<div class="col-md-8">
							<label class="checkbox"><input type="checkbox"> 자동로그인</label>                        
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-color btn-block">Sign In</button>                      
						</div>
					</div>
				</form>
				
			</div>
			<div class="form-footer">
				<p>아이디/비밀번호를 잊으셨습니까? &nbsp; <a href="#"><i class="fa fa-search"></i> 아이디/비밀번호 찾기</a></p>
			</div>
		</div>



	</div>
</div>


<?php echo apms_line('fa'); // FA Line ?>


<h4 class="div-title-underline-thin">Form #02</h4>
<div class="row">
	<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">

		<div class="form-box">
			<div class="form-header">
				<h2>Register</h2>
			</div>
			<div class="form-body">
				<p>
				회원가입약관과 개인정보 보호방침에 동의하셔야 회원가입을 하실 수 있습니다.
				</p>
				<form class="form" role="form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="txtName">이름</label>
								<input type="text" class="form-control input-sm" id="txtName" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="txtNickname">닉네임</label>
								<input type="text" class="form-control input-sm" id="txtNickname" placeholder="">
							</div>
						</div>
					</div>  
					
					<div class="form-group">
						<label for="email">이메일</label>
						<input type="email" class="form-control input-sm" id="txtEmail" placeholder="">
					</div>
							
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="pass">비밀번호</label>
								<input type="password" class="form-control input-sm" id="password" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pass2">비밀번호 확인</label>
								<input type="password" class="form-control input-sm" id="password2" placeholder="">
							</div>
						</div>
					</div>      
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="homepage">홈페이지</label>
								<input type="text" class="form-control input-sm" id="homepage" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">연락처</label>
								<input type="text" class="form-control input-sm" id="phone" placeholder="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<p><label class="checkbox"><input type="checkbox"> 회원가입약관과 개인정보 방침에 동의합니다.</label></p>
						</div>
						<div class="col-md-3">
							<button class="btn btn-color btn-block" type="submit">Sign Up</button>                        
						</div>
					</div>
				</form>
				
			</div>
			<div class="form-footer">
				<p><i class="fa fa-check"></i> 이미 가입회원이시라면 바로 로그인해 주세요.</a></p>
			</div>
		</div>

	</div>
</div>

<?php echo apms_line('fa'); // FA Line ?>

<h4 class="div-title-underline-thin">Form #03</h4>
<div class="row">
	<div class="col-md-4">

		<div class="form-box">
			<div class="form-header">
				<h2>Sign In</h2>
			</div>
			<div class="form-body">
				<form role="form" class="form">
					<div class="form-group">
					<label>아이디</label>
					<input type="text" class="form-control input-sm" placeholder="">
					</div>
					<div class="form-group">
					<label>비밀번호</label>
					<input type="password" class="form-control input-sm" placeholder="">
					</div>
	  
					<div class="row">
						<div class="col-md-5 col-md-offset-7">
							<button type="submit" class="btn btn-color btn-block">Sign In</button>                      
						</div>
					</div>
				</form>
				
			</div>
			<div class="form-footer">
				<p><a href="#"><i class="fa fa-search"></i> 아이디/비밀번호 찾기</a></p>
			</div>
		</div>
	</div>
	<div class="col-md-8">

		<div class="form-box">
			<div class="form-header">
				<h2>Register</h2>
			</div>
			<div class="form-body">
				<form class="form">
					<div class="form-group">
						<label>아이디</label>
						<input type="text" class="form-control input-sm" placeholder="">
					</div>
							
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>비밀번호</label>
								<input type="password" class="form-control input-sm" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>비밀번호 확인</label>
								<input type="password" class="form-control input-sm" placeholder="">
							</div>
						</div>
					</div>      
					<div class="row">
						<div class="col-md-4 col-md-offset-8">
							<button class="btn btn-black btn-block" type="submit">Next Step</button>                        
						</div>
					</div>
				</form>
			</div>
			<div class="form-footer">
				<p>아이디/비밀번호를 잊으셨습니까? &nbsp; <a href="#"><i class="fa fa-search"></i> 아이디/비밀번호 찾기</a></p>
			</div>
		</div>
	</div>
</div>
