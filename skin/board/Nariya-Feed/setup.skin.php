<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 boset[배열키] 형태로 등록

$boset['list_skin'] = ($boset['list_skin']) ? $boset['list_skin'] : 'basic';

?>
<script>
function na_change_skin(id, type, skin) {
	var url = "<?php echo NA_PLUGIN_URL ?>/theme/skin_list.php?bo_table=<?php echo $bo_table ?>&type="+type+"&skin="+skin;
	$.get(url, function (data) {
		$("#"+id).html(data);
	});
}
</script>

<ul class="list-group">
	<li class="list-group-item bg-light">
		<a href="#feed_guide" data-toggle="collapse" aria-expanded="false" aria-controls="feed_guide" class="pull-right">
			<b>수집목록 설정방법 보기</b>
		</a>
		<b>수집목록</b>
	</li>
	<li class="list-group-item">
		<textarea name="boset[feed]" class="form-control" rows="15"><?php echo $boset['feed'] ?></textarea>

		<div id="feed_guide" class="collapse">

			<div class="h15"></div>
			<style>
				.ul { list-style:disc; padding-left:15px; }
			</style>
			<div class="table-responsive">
				<table class="table table-bordered no-margin">
					<tbody>
					<tr class="bg-light">
						<th colspan="2" scope="col" class="text-center">구분</th>
						<th scope="col" class="text-center">변수</th>
						<th scope="col" class="text-center">설정값</th>
						<th scope="col" class="text-center">설정방법</th>
					</tr>
					<tr>
						<td rowspan="3" align="center">공통사항</td>
						<td align="center">선택</td>
						<td align="center"><b>name</b></td>
						<td align="center">-</td>
						<td>
							<ul class="ul">
							<li>미설정시 최고관리자 정보 자동등록</li>
							<li>회원은 "회원아이디,1" 형태 등록 ex) name="admin,1"</li>
							<li>비회원은 "이름" 형태 등록 ex) name="유튜브"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">선택</td>
						<td align="center"><b>ca_name</b></td>
						<td align="center">분류명</td>
						<td>
							<ul class="ul">
							<li>미설정시 등록안함</li>
							<li>ex) ca_name="뮤직"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">선택</td>
						<td align="center"><b>filter</b></td>
						<td align="center">단어,단어</td>
						<td>
							<ul class="ul">
							<li>지정 단어가 포함된 피드만 등록</li>
							<li>복수등록시 콤마(,)로 단어구분</li>
							<li>ex) filter="아미나,나리야"</li>
							</ul>
						</td>
					</tr>
					<tr class="bg-light">
						<td rowspan="3" align="center">RSS/ATOM</td>
						<td align="center">선택</td>
						<td align="center"><b>feed</b></td>
						<td align="center">rss</td>
						<td>
							<ul class="ul">
							<li>RSS/ATOM 피드수집 모드</li>
							<li>ex) feed="rss"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center"><b class="red">필수</b></td>
						<td align="center"><b>url</b></td>
						<td align="center">http://...</td>
						<td>
							<ul class="ul">
							<li>RSS/ATOM 피드 주소</li>
							<li>ex) url="http://..../rss"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">예시</td>
						<td colspan="3">
							<ul class="ul">
							<li>feed="rss" url="http://amina.co.kr/rss/rss.php" name="나리야"</li>
							<li>url="http://amina.co.kr/rss" name="admin,1" ca_name="아미나" filter="테마,스킨,위젯"</li>
							</ul>
						</td>
					</tr>
					<tr class="bg-light">
						<td rowspan="6" align="center">유튜브</td>
						<td align="center"><b class="red">필수</b></td>
						<td align="center"><b>feed</b></td>
						<td align="center"><b>youtube</b></td>
						<td>
							<ul class="ul">
							<li>유튜브 검색결과 수집</li>
							<li>ex) feed="youtube"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">선택</td>
						<td align="center"><b>channel</b></td>
						<td align="center">채널아이디</td>
						<td>
							<ul class="ul">
							<li>유튜브 채널피드 수집</li>
							<li>채널아이디는 1개만 등록가능</li>
							<li>ex) channel="채널아이디"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">선택</td>
						<td align="center"><b>q</b></td>
						<td align="center">검색어</td>
						<td>
							<ul class="ul">
							<li>검색어 복수등록은 콤마(,)로 구분</li>
							<li>ex) q="테마,스킨,위젯"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">선택</td>
						<td align="center"><b>order</b></td>
						<td align="center">정렬방법</td>
						<td>
							<ul class="ul">
							<li>1개만 지정가능함</li>
							<li>relevance – 검색 쿼리에 대한 관련성을 기준으로 리소스를 정렬(기본값)</li>
							<li>date – 리소스를 만든 날짜를 기준으로 최근 항목부터 시간 순서대로 리소스를 정렬.</li>
							<li>rating – 높은 평가부터 낮은 평가순으로 리소스를 정렬</li>
							<li>title – 제목에 따라 문자순으로 리소스를 정렬</li>
							<li>videoCount – 업로드한 동영상 수에 따라 채널을 내림차순으로 정렬</li>
							<li>viewCount – 리소스를 조회수가 높은 항목부터 정렬</li>
							<li>ex) order="viewCount"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">선택</td>
						<td align="center"><b>region</b></td>
						<td align="center">지역코드</td>
						<td>
							<ul class="ul">
							<li>ISO 3166-1 alpha-2 국가 코드</li>
							<li>ex) region="kr"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">예시</td>
						<td colspan="3">
							<ul class="ul">
							<li>feed="youtube" q="테마,스킨,위젯" name="나리야" filter="나리야,아미나" region="kr"</li>
							<li>feed="youtube" channel="채널아이디" filter="유머,웃음" order="date"</li>
							</ul>
						</td>
					</tr>

					<tr class="bg-light">
						<td rowspan="3" align="center">비메오</td>
						<td align="center"><b class="red">필수</b></td>
						<td align="center"><b>feed</b></td>
						<td align="center"><b>vimeo</b></td>
						<td>
							<ul class="ul">
							<li>비메오 유저피드 수집</li>
							<li>ex) feed="vimeo"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center"><b class="red">필수</b></td>
						<td align="center"><b>user</b></td>
						<td align="center">유저네임</td>
						<td>
							<ul class="ul">
							<li>비메오 UserName 피드수집</li>
							<li>ex) user="유저네임"</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="center">예시</td>
						<td colspan="3">
							<ul class="ul">
							<li>feed="vimeo" user="유저네임" name="나리야" filter="나리야,아미나"</li>
							<li>feed="vimeo" user="유저네임" name="admin,1" ca_name="뮤직"</li>
							</ul>
						</td>
					</tr>

				</tbody>
				</table>
			</div>
		</div>

	</li>

	<li class="list-group-item bg-light">
		<b>피드설정</b>
	</li>
	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">제외피드</label>
			<div class="col-sm-10">
				<textarea name="boset[fout]" class="form-control" rows="5"><?php echo stripslashes($boset['fout']) ?></textarea>
				<p class="help-block">
					등록된 단어가 있는 피드는 수집이 되지 않습니다. 단어는 콤마(,)로 구분해서 등록해 주세요.
				</p>
			</div>
		</div>
	</li>
	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">구글API키</label>
			<div class="col-sm-10">
				<input name="boset[youtube_key]" value="<?php echo $boset['youtube_key'] ?>" class="form-control">
				<p class="help-block">
					구글개발자콘솔(http://code.google.com/apis/console/)에서 사용자인증정보 > 서버키 생성 후 등록해 주세요. 등록시 구글API에서 YouTube Data API를 사용가능하도록 설정하셔야 합니다.
				</p>
			</div>
		</div>
	</li>
	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">수집설정</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
					<tbody>
					<tr class="active">
						<th class="text-center col-xs-3">구분</th>
						<th class="text-center col-xs-3">사용</th>
						<th class="text-center">비고</th>
					</tr>
					<tr>
						<th class="text-center">
							자동수집
						</th>
						<td>
							<div class="input-group">
								<input name="boset[cache]" value="<?php echo ($boset['cache']) ? $boset['cache'] : 30; ?>" class="form-control">
								<span class="input-group-addon">분</span>
							</div>
						</td>
						<td class="text-muted">
							간격으로 자동수집
						</td>
					</tr>
					<tr>
						<th class="text-center">
							자동이동
						</th>
						<td class="text-center">
							<input type="checkbox" name="boset[move]" value="1"<?php echo get_checked('1', $boset['move'])?> class="chk-margin">
						</td>
						<td class="text-muted">
							내용에서 피드 원글로 바로 이동
						</td>
					</tr>
					<tr>
						<th class="text-center">
							전체새글
						</th>
						<td class="text-center">
							<input type="checkbox" name="boset[db_new]" value="1"<?php echo get_checked('1', $boset['db_new'])?> class="chk-margin">
						</td>
						<td class="text-muted">
							새글DB에 수집한 피드 등록
						</td>
					</tr>
					<tr>
						<th class="text-center">
							재수집 실행
						</th>
						<td class="text-center">
							<input type="checkbox" name="re_feed" value="1" class="chk-margin">
						</td>
						<td class="text-muted">
							자동수집 시간 초기화
						</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item bg-light">
		<div class="row row-15">
			<div class="col-sm-2 col-15">
				 <p class="form-control-static">
					<b>목록스킨</b>
				</p>
			</div>
			<div class="col-sm-4 col-15">
				<select name="boset[list_skin]" onchange="na_change_skin('list_skin', 'list', this.value);" class="form-control">
				<?php
					$skinlist = na_dir_list($board_skin_path.'/list');
					$boset['list_skin'] = (is_dir($board_skin_path.'/list/'.$boset['list_skin'])) ? $boset['list_skin'] : $skinlist[0];
					for ($k=0; $k<count($skinlist); $k++) {
						echo '<option value="'.$skinlist[$k].'"'.get_selected($skinlist[$k], $boset['list_skin']).'>'.$skinlist[$k].'</option>'.PHP_EOL;
					} 
				?>
				</select>
			</div>
			<div class="col-sm-6 col-15">
				 <p class="form-control-static">
					보드스킨 내 /list 폴더의 하위 폴더들
				</p>
			</div>
		</div>
	</li>
	<li class="list-group-item">
		<div id="list_skin">
			<?php @include_once($board_skin_path.'/list/'.$boset['list_skin'].'/setup.skin.php');?>
		</div>
	</li>
	<li class="list-group-item bg-light">
		<b>기본설정</b>
	</li>
	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">출력설정</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
					<tbody>
					<tr class="active">
						<th class="text-center col-xs-3">구분</th>
						<th class="text-center col-xs-3">사용</th>
						<th class="text-center">비고</th>
					</tr>
					<tr>
						<th class="text-center">
							기본 컬러
						</th>
						<td class="text-center">
							<select name="boset[color]" class="form-control">
								<option value="">선택해 주세요</option>
								<?php echo na_color_options($boset['color']);?>
							</select>
						</td>
						<td class="text-muted">
							버튼, 페이지네이션 등 컬러
						</td>
					</tr>
					<tr>
						<th class="text-center">
							검색창 보이기
						</th>
						<td class="text-center">
							<input type="checkbox" name="boset[search_open]" value="1"<?php echo get_checked('1', $boset['search_open'])?> class="chk-margin">
						</td>
						<td class="text-muted">
							글목록 상단에 검색창이 보이도록 출력함
						</td>
					</tr>
					<tr>
						<th class="text-center">
							댓글목록 숨김
						</th>
						<td class="text-center">
							<input type="checkbox" name="boset[hide_clist]" value="1"<?php echo get_checked('1', $boset['hide_clist'])?> class="chk-margin">
						</td>
						<td class="text-muted">
							댓글목록을 숨김상태로 출력함
						</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">카테고리</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
					<tbody>
					<tr class="active">
						<th class="text-center col-xs-3">기본</th>
						<th class="text-center col-xs-3">1200px 이하</th>
						<th class="text-center col-xs-2">992px 이하</th>
						<th class="text-center col-xs-2">768px 이하</th>
						<th class="text-center">480px 이하</th>
					</tr>
					<tr>
					<td>
						<div class="input-group">
							<input name="boset[cw]" value="<?php echo ($boset['cw']) ? $boset['cw'] : 7; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="boset[cwlg]" value="<?php echo ($boset['cwlg']) ? $boset['cwlg'] : 6; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="boset[cwmd]" value="<?php echo ($boset['cwmd']) ? $boset['cwmd'] : 5; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="boset[cwsm]" value="<?php echo ($boset['cwsm']) ? $boset['cwsm'] : 4; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="boset[cwxs]" value="<?php echo ($boset['cwxs']) ? $boset['cwxs'] : 3; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					</tr>
					</tbody>
					</table>
				</div>
				<p class="help-block">
					반응구간별 카테고리 가로갯수는 최대 12까지 입력가능
				</p>
			</div>
		</div>
	</li>

</ul>
