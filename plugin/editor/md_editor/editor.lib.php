<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

function editor_html($id, $content, $is_dhtml_editor=true)
{
    global $config, $w, $board, $write;
    global $editor_width, $editor_height;
    static $js = true;

    if( 
        $is_dhtml_editor && $content && 
        (
        (!$w && (isset($board['bo_insert_content']) && !empty($board['bo_insert_content'])))
        || ($w == 'u' && isset($write['wr_option']) && strpos($write['wr_option'], 'html') === false )
        )
    ){       //글쓰기 기본 내용 처리
        if( preg_match('/\r|\n/', $content) && $content === strip_tags($content, '<a><strong><b>') ) {  //textarea로 작성되고, html 내용이 없다면
            $content = nl2br($content);
        }
    }

    $width  = isset($editor_width)  ? $editor_width  : "100%";
    $height = isset($editor_height) ? $editor_height : "500px";
    if (defined('G5_PUNYCODE'))
        $editor_url = G5_PUNYCODE.'/'.G5_EDITOR_DIR.'/'.$config['cf_editor'];
    else
        $editor_url = G5_EDITOR_URL.'/'.$config['cf_editor'];
    $editor_path = G5_EDITOR_PATH.'/'.$config['cf_editor'];
    if ($is_dhtml_editor) {
        $fileuploder ='<script type="text/template" id="qq-template">';
        $fileuploder .= "\r\n".        '<div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">';
        $fileuploder .= "\r\n".            '<div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">';
        $fileuploder .= "\r\n".                '<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>';
        $fileuploder .= "\r\n".            '</div>';
        $fileuploder .= "\r\n".            '<div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>';
        $fileuploder .= "\r\n".                '<span class="qq-upload-drop-area-text-selector"></span>';
        $fileuploder .= "\r\n".            '</div>';
        $fileuploder .= "\r\n".            '<div class="qq-upload-button-selector qq-upload-button">';
        $fileuploder .= "\r\n".                '<div>파일선택</div>';
        $fileuploder .= "\r\n".            '</div>';
        $fileuploder .= "\r\n".            '<span class="qq-drop-processing-selector qq-drop-processing">';
        $fileuploder .= "\r\n".                '<span>파일 업로드 중..</span>';
        $fileuploder .= "\r\n".                '<span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>';
        $fileuploder .= "\r\n".            '</span>';
        $fileuploder .= "\r\n".            '<ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">';
        $fileuploder .= "\r\n".                '<li>';
        $fileuploder .= "\r\n".                    '<span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>';
        $fileuploder .= "\r\n".                    '<div class="qq-progress-bar-container-selector qq-progress-bar-container">';
        $fileuploder .= "\r\n".                        '<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>';
        $fileuploder .= "\r\n".                    '</div>';
        $fileuploder .= "\r\n".                    '<span class="qq-upload-spinner-selector qq-upload-spinner"></span>';
        $fileuploder .= "\r\n".                    '<div class="qq-thumbnail-wrapper">';
        $fileuploder .= "\r\n".                        '<img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>';
        $fileuploder .= "\r\n".                    '</div>';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-upload-retry-selector qq-upload-retry">';
        $fileuploder .= "\r\n".                        '<span class="qq-btn qq-retry-icon" aria-label="Retry"></span>';
        $fileuploder .= "\r\n".                        '재시도';
        $fileuploder .= "\r\n".                    '</button>';
        $fileuploder .= "\r\n".                    '<div class="qq-file-info">';
        $fileuploder .= "\r\n".                        '<div class="qq-file-name">';
        $fileuploder .= "\r\n".                            '<span class="qq-upload-file-selector qq-upload-file"></span>';
        $fileuploder .= "\r\n".                            '<span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>';
        $fileuploder .= "\r\n".                        '</div>';
        $fileuploder .= "\r\n".                        '<input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">';
        $fileuploder .= "\r\n".                        '<span class="qq-upload-size-selector qq-upload-size"></span>';
        $fileuploder .= "\r\n".                        '<button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">';
        $fileuploder .= "\r\n".                            '<span class="qq-btn qq-delete-icon" aria-label="Delete"></span>';
        $fileuploder .= "\r\n".                        '</button>';
        $fileuploder .= "\r\n".                        '<button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">';
        $fileuploder .= "\r\n".                            '<span class="qq-btn qq-pause-icon" aria-label="Pause"></span>';
        $fileuploder .= "\r\n".                        '</button>';
        $fileuploder .= "\r\n".                        '<button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">';
        $fileuploder .= "\r\n".                            '<span class="qq-btn qq-continue-icon" aria-label="Continue"></span>';
        $fileuploder .= "\r\n".                        '</button>';
        $fileuploder .= "\r\n".                    '</div>';
        $fileuploder .= "\r\n".                '</li>';
        $fileuploder .= "\r\n".            '</ul>';
        $fileuploder .= "\r\n".            '<dialog class="qq-alert-dialog-selector">';
        $fileuploder .= "\r\n".                '<div class="qq-dialog-message-selector"></div>';
        $fileuploder .= "\r\n".                '<div class="qq-dialog-buttons">';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-cancel-button-selector">닫기</button>';
        $fileuploder .= "\r\n".                '</div>';
        $fileuploder .= "\r\n".            '</dialog>';
        $fileuploder .= "\r\n".            '<dialog class="qq-confirm-dialog-selector">';
        $fileuploder .= "\r\n".                '<div class="qq-dialog-message-selector"></div>';
        $fileuploder .= "\r\n".                '<div class="qq-dialog-buttons">';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-cancel-button-selector">아니오</button>';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-ok-button-selector">예</button>';
        $fileuploder .= "\r\n".                '</div>';
        $fileuploder .= "\r\n".            '</dialog>';
        $fileuploder .= "\r\n".            '<dialog class="qq-prompt-dialog-selector">';
        $fileuploder .= "\r\n".                '<div class="qq-dialog-message-selector"></div>';
        $fileuploder .= "\r\n".                '<input type="text">';
        $fileuploder .= "\r\n".                '<div class="qq-dialog-buttons">';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-cancel-button-selector">취소</button>';
        $fileuploder .= "\r\n".                    '<button type="button" class="qq-ok-button-selector">확인</button>';
        $fileuploder .= "\r\n".                '</div>';
        $fileuploder .= "\r\n".            '</dialog>';
        $fileuploder .= "\r\n".        '</div>';
        $fileuploder .= "\r\n".    '</script>';
        $html = "";
        $html .= "\r\n".'<link rel="stylesheet" href="'.$editor_url.'/css/editormd.min.css" />';
        $html .= "\r\n".'<link rel="stylesheet" href="'.$editor_url.'/css/editormd.abc.css"s />';
        $html .= "\r\n".'<link rel="stylesheet" href="'.$editor_url.'/css/editormd.youtube.css" />';
        $html .= "\r\n".'<link rel="stylesheet" href="'.$editor_url.'/plugins/image-dialog/css/fine-uploader-gallery.min.css" />';
        $html .= "\r\n"."<span class=\"sound_only\">웹에디터 시작</span>";
        $html .= "\r\n".'<div id="md_'.$id.'">';
        $html .= "\r\n".'    <!-- Tips: Editor.md can auto append a `<textarea>` tag -->';
        $html .= "\r\n"."    <textarea name=\"{$id}\" id=\"{$id}\" style=\"display:none;\">{$content}</textarea>\n";
        $html .= "\r\n".'</div>';
        $html .= "\r\n"."\n<span class=\"sound_only\">웹 에디터 끝</span>";
        $html .= "\r\n".'<script src="'.$editor_url.'/js/editormd.js"></script>';
        $html .= "\r\n".'<script src="'.$editor_url.'/lib/abc.min.js"></script>';
        $html .= "\r\n".'<script src="'.$editor_url.'/plugins/image-dialog/js/fine-uploader.min.js"></script>';
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,5);
        $html .= "\r\n".'<script src="'.$editor_url.'/languages/'.$lang.'.js"></script>';
        $html .= "\r\n".'<script type="text/javascript">';
        $html .= "\r\n".'var editor_'.$id.';';
        $html .= "\r\n".'    $(function() {';
        $html .= "\r\n".'        editor_'.$id.' = editormd("md_'.$id.'", {';
        $html .= "\r\n".'            width: "'.$width.'",';
        $html .= "\r\n".'            height: "'.$height.'",';
        $html .= "\r\n".'            // markdown: "xxxx",     // dynamic set Markdown text';
        $html .= "\r\n".'            path : "'.$editor_url.'/lib/",  // Autoload modules mode, codemirror, marked... dependents libs path';
        $html .= "\r\n".'            taskList : true,';
        $html .= "\r\n".'            tocm : true,  ';
        $html .= "\r\n".'            tex : true,            ';
        $html .= "\r\n".'            flowChart : true,      ';
        $html .= "\r\n".'            sequenceDiagram : true,';
        $html .= "\r\n".'            autoFocus : false,';
        $html .= "\r\n".'            emoji : true,';
        $html .= "\r\n".'            abc : true,';
        $html .= "\r\n".'            placeholder : "내용을 입력하세요",';
        $html .= "\r\n".'            imageUpload          : true,          // Enable/disable upload';
        $html .= "\r\n".'            imageFormats         : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],';
        $html .= "\r\n".'            imageUploadURL       : "'.$editor_url.'/upload.php",             // Upload url';
        $html .= "\r\n".'        });';
        $html .= "\r\n".'    });';
        $html .= "\r\n".'</script>';
        $html .= $fileuploder;
    } else {
        $html .= "<textarea id=\"$id\" name=\"$id\" style=\"width:{$width};height:{$height};\" maxlength=\"65536\">$content</textarea>\n";
    }
    return $html;
}

// textarea 로 값을 넘긴다. javascript 반드시 필요
function get_editor_js($id, $is_dhtml_editor=true)
{
    if ($is_dhtml_editor) {
        //return "document.getElementById('{$id}').value = vditor.getValue();\n ";
        return "document.getElementById('{$id}').value = editor_{$id}.getMarkdown();\n ";
    } else {
        return "var {$id}_editor = document.getElementById('{$id}');\n";
    }
}


//  textarea 의 값이 비어 있는지 검사
function chk_editor_js($id, $is_dhtml_editor=true)
{
    if ($is_dhtml_editor) {
        return "if(editor_{$id}.getMarkdown().trim()==\"\") { alert(\"내용을 입력해 주십시오.\"); {$id}.focus(); return false; }\n";
    } else {
        return "if (!{$id}_editor.value) { alert(\"내용을 입력해 주십시오.\"); {$id}_editor.focus(); return false; }\n";
    }
}
// view 페이지 mardown 문법 해석하는 구문
function editormd_view($content, $id){
    global $config, $w, $board, $write;
    if (defined('G5_PUNYCODE'))
        $editor_url = G5_PUNYCODE.'/'.G5_EDITOR_DIR.'/'.$config['cf_editor'];
    else
        $editor_url = G5_EDITOR_URL.'/'.$config['cf_editor'];
    add_stylesheet('<link rel="stylesheet" href="'.$editor_url.'/css/editormd.preview.css">', 1);
    add_stylesheet('<link rel="stylesheet" href="'.$editor_url.'/css/editormd.abc.css">', 2);
    add_stylesheet('<link rel="stylesheet" href="'.$editor_url.'/css/editormd.youtube.css">', 3);

    add_javascript('<script src="'.$editor_url.'/js/editormd.js"></script>',1);
    add_javascript('<script src="'.$editor_url.'/lib/marked.min.js"></script>',2);
    add_javascript('<script src="'.$editor_url.'/lib/prettify.min.js"></script>',3);
    add_javascript('<script src="'.$editor_url.'/lib/raphael.min.js"></script>',4);
    add_javascript('<script src="'.$editor_url.'/lib/underscore.min.js"></script>',5);
    add_javascript('<script src="'.$editor_url.'/lib/sequence-diagram.min.js"></script>',6);
    add_javascript('<script src="'.$editor_url.'/lib/flowchart.min.js"></script>',7);
    add_javascript('<script src="'.$editor_url.'/lib/jquery.flowchart.min.js"></script>',8);
//     add_javascript('<script src="'.$editor_url.'/lib/abc.min.js"></script>',10);
    add_javascript('<script src="'.$editor_url.'/lib/abcjs_basic_6.0.0-beta.8-min.js"></script>',10);
    add_javascript('<script>
        $(function() {
            var testView = editormd.markdownToHTML(\''.$id.'\', {
                htmlDecode      : "style,script",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  
                abc             : true,  
                flowChart       : true,  
                sequenceDiagram : true,  
                youtube         : true,
            });

            window.onload = function() {
            			new ABCJS.Editor("abc", { canvas_id: \''.$id.'\',
            				warnings_id: "warnings",
            				abcjsParams: {}
            			});
            		}
            alert(\''.$id.'\')
        });
    </script>');
    return $content = '<textarea style="display:none;">'.$content.'</textarea>';
}