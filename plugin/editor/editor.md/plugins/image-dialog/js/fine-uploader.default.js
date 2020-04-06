// Some options to pass to the uploader are discussed on the next page
var upload_url = g5_url+'/plugin/editor/'+g5_editor+'/fineupload.php';
var uploader = new qq.FineUploader({
    element: document.getElementById("uploader"),
    request: {
        endpoint: upload_url
    },
    status: {
        SUBMITTING: "보내는 중",
        SUBMITTED: "전송 완료",
        REJECTED: "거부당함",
        QUEUED: "queued",
        CANCELED: "취소",
        PAUSED: "일시정지",
        UPLOADING: "업로드 중",
        UPLOAD_FINALIZING: "마무리 중..",
        UPLOAD_RETRYING: "재시도",
        UPLOAD_SUCCESSFUL: "업로드완료",
        UPLOAD_FAILED: "업로드 실패",
        DELETE_FAILED: "삭제 실패",
        DELETING: "삭제 중..",
        DELETED: "삭제완료"
    },
    autoUpload: false,
    callbacks: {
        onComplete: function(id, fileName, responseJSON) {
        if (responseJSON.success) {
              console.log(responseJSON.filename, responseJSON);
              editor_wr_content.insertValue('!['+responseJSON.filename+']('+responseJSON.url+' "'+responseJSON.filename+'")');
              editor_wr_content.dialog.remove();
            }else{
                alert('파일이 업로드 되지 않았습니다');
            }
        }
    }
});
function fine_uploader(){
    uploader.uploadStoredFiles();
}