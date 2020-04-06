(function(){
    var factory = function (exports) {
        var lang = {
            name : "ko",
            description : "Open source online Markdown editor.",
            tocTitle    : "Table of Contents",
            toolbar : {
                undo             : "되돌리기(Ctrl+Z)",
                redo             : "되돌리기 취소(Ctrl+Y)",
                bold             : "굵게",
                del              : "취소선",
                italic           : "기울임꼴",
                quote            : "Block quote",
                ucwords          : "선택한 영역의 첫글자를 대문자로 바꿉니다.",
                uppercase        : "선택한 영역의 글자를 대문자로 바꿉니다.",
                lowercase        : "선택한 영역의 글자를 소문자로 바꿉니다.",
                h1               : "제목 1",
                h2               : "제목 2",
                h3               : "제목 3",
                h4               : "제목 4",
                h5               : "제목 5",
                h6               : "제목 6",
                "list-ul"        : "숫자가 없는 리스트",
                "list-ol"        : "숫자가 있는 리스트",
                hr               : "수평선(절취선)",
                link             : "링크",
                "reference-link" : "참조 링크",
                image            : "이미지",
                code             : "코드 인라인",
                "preformatted-text" : "Preformatted text / 코드 블록 (들여쓰기)",
                "code-block"     : "코드 블록(Multi-languages)",
                table            : "표",
                datetime         : "날짜 시간",
                emoji            : "Emoji",
                "goto-line"      : "Goto line",
                "youtube"        : "유튜브",
                "html-entities"  : "특수문자(HTML)",
                pagebreak        : "페이지 브레이크",
                watch            : "프리뷰 없애기",
                unwatch          : "프리뷰",
                preview          : "HTML 미리보기(Shift + ESC로 닫기)",
                fullscreen       : "전체화면(ESC로 닫기)",
                clear            : "지우기",
                search           : "검색",
                help             : "도움말",
                info             : exports.title+'에 대하여'
            },
            buttons : {
                enter  : "입력",
                cancel : "취소",
                next : "다음",
                close  : "닫기"
            },
            dialog : {
                emoji : {
                    title      : "emoji",
                    buttons : {
                        enter  : "입력",
                        cancel : "취소",
                        close  : "닫기"
                    },
                },
                "goto-line" : {
                    title  : "Goto line",
                    label  : "이동하고자 하는 줄 번호를 입력해주세요",
                    error  : "에러: "
                },
                table : {
                    title      : "표",
                    cellsLabel : "셀",
                    alignLabel : "정렬",
                    rows       : "행",
                    cols       : "열",
                    aligns     : ["기본정렬", "왼쪽정렬", "가운데정렬", "오른쪽정렬"]
                },
                link : {
                    title    : "링크",
                    url      : "주소",
                    urlTitle : "제목",
                    urlEmpty : "오류: 주소를 입력해주세요."
                },
                referenceLink : {
                    title    : "참조 링크",
                    name     : "이름",
                    url      : "주소",
                    urlId    : "아이디",
                    urlTitle : "제목",
                    nameEmpty: "오류: 이름을 입력하세요.",
                    idEmpty  : "오류: 아이디를 입력하세요.",
                    urlEmpty : "오류: 주소를 입력하세요."
                },
                image : {
                    title    : "이미지",
                    url      : "주소",
                    link     : "링크",
                    alt      : "제목",
                    uploadButton     : "업로드",
                    imageURLEmpty    : "오류: 사진의 URL을 입력하세요",
                    uploadFileEmpty  : "오류: 그림파일이 업로드 되어있지 않습니다",
                    formatNotAllowed : "오류: 허용된 포맷의 그림 확장자만 업로드해주세요!"
                },
                preformattedText : {
                    title             : "코드 인라인", 
                    emptyAlert        : "오류: 형식이 지정된 텍스트 코드 및 내용을 입력해주세요",
                    placeholder       : "코드를 입력하세요"
                },
                codeBlock : {
                    title             : "코드 블록",         
                    selectLabel       : "언어: ",
                    selectDefaultText : "언어를 선택해주세요",
                    otherLanguage     : "다른 언어",
                    unselectedLanguageAlert : "오류: 언어를 선택해주세요",
                    codeEmptyAlert    : "오류: 코드블록 안의 내용이 없습니다",
                    placeholder       : "코드를 입력하세요"
                },
                htmlEntities : {
                    title : "HTML 속성"
                },
                "youtube" : {
					title  : "유튜브 검색",
					label  : "<i class='fa fa-youtube'></i>",
					error  : "에러:"
				},
                help : {
                    title : "도움말"
                }
            }
        };
        
        exports.defaults.lang = lang;
    };
    
	// CommonJS/Node.js
	if (typeof require === "function" && typeof exports === "object" && typeof module === "object")
    { 
        module.exports = factory;
    }
	else if (typeof define === "function")  // AMD/CMD/Sea.js
    {
		if (define.amd) { // for Require.js

			define(["editormd"], function(editormd) {
                factory(editormd);
            });

		} else { // for Sea.js
			define(function(require) {
                var editormd = require("../editormd");
                factory(editormd);
            });
		}
	} 
	else
	{
        factory(window.editormd);
	}
    
})();
/** 
kbl-ref.com
made by Vorfeed 
*/