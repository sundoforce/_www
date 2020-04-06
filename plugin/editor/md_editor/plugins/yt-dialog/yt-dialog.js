/*!
 * Image (upload) dialog plugin for Editor.md
 *
 * @file        mutil-image-dialog.js
 * @author      vorfeed
 * @version     1.0
 * @updateTime  2019-10-03
 * @license     MIT
 */

(function() {
"use strict"
    var factory = function (exports) {

		var $            = jQuery;
		var pluginName   = "yt-dialog";

		var langs = {
			"zh-cn" : {
				toolbar : {
					"yt-dialog" : "YouTube"
				},
				dialog : {
					"yt-dialog" : {
						title  : "YouTube Search",
						label  : "<i class='fa fa-youtube'></i>",
						error  : "error:"
					}
				}
			},
			"zh-tw" : {
				toolbar : {
					"yt-dialog" : "YouTube"
				},
				dialog : {
					"yt-dialog" : {
						title  : "YouTube Search",
						label  : "<i class='fa fa-youtube'></i>",
						error  : "error:"
					}
				}
			},
			"en" : {
				toolbar : {
					"yt-dialog" : "YouTube"
				},
				dialog : {
					"yt-dialog" : {
						title  : "YouTube Search",
						label  : "<i class='fa fa-youtube'></i>",
						error  : "error:"
					}
				}
			},
			"ko-KR" : {
				toolbar : {
					"yt-dialog" : "YouTube"
				},
				dialog : {
					"yt-dialog" : {
						title  : "YouTube Search",
						label  : "<i class='fa fa-youtube fa-2x'></i>",
						error  : "error:"
					}
				}
			}
		};

		exports.fn.ytDialog = function() {
			var _this       = this;
			var cm          = this.cm;
			var editor      = this.editor;
			var settings    = this.settings;
			var path        = settings.pluginPath + pluginName +"/";
			var classPrefix = this.classPrefix;
			var dialogName  = classPrefix + pluginName, dialog;
			var nextToken;
			$.extend(true, this.lang, langs[this.lang.name]);
			this.setToolbar();

			var lang        = this.lang;
			var dialogLang  = lang.dialog["youtube"];
			var lineCount   = cm.lineCount();

			dialogLang.error += dialogLang.label + " 1-" + lineCount;

			if (editor.find("." + dialogName).length < 1) 
			{			
				var dialogContent = [
					"<div class=\"editormd-form\" style=\"padding:0;overflow:hidden;border-bottom:1px solid #000\">",
					"<div style=\"margin: 0;float:left;width:calc(100% - 60px) \"><input type=\"text\" class='yt-search' id='yt_q' style=\"width:100%;height:30px;border:0;\"/></div>",
					"<div style='height:30px;float:right;width:60px;line-height:25px;' id='yt-search-button'> <i class='fa fa-search'></i> 검색 </div>",
					"</div>",
					"<div id='yt-result' style=\"height:230px;width:100%;background:#ddd;margin:10px 0;overflow:auto;\"></div>"
				].join("\n");

				dialog = this.createDialog({
					name       : dialogName,
					title      : dialogLang.title,
					width      : 400,
					height     : 400,
					mask       : settings.dialogShowMask,
					drag       : settings.dialogDraggable,
					content    : dialogContent,
					lockScreen : settings.dialogLockScreen,
					maskStyle  : {
						opacity         : settings.dialogMaskOpacity,
						backgroundColor : settings.dialogMaskBgColor
					},
					buttons    : {
                        next : [lang.buttons.next, function() {
							if(nextToken){
								
								$.ajax({
									type: "post",
									url: g5_url+'/plugin/editor/'+g5_editor+'/plugins/yt-dialog/yt_search.php',
									data: {
										q : $('#yt_q').val(),
										nextPageToken : nextToken,
									},
									dataType: "json",
									success: function (d) {
										$('#yt-result').empty();
										if(d.error){
											alert('유튜브 apikey를 입력해주세요');
										}else{
											nextToken = d.nextPageToken;
											for(var i=0;i<d.items.length;i++){
												var videoId = d['items'][i]['id']['videoId'];
												var title = d['items'][i]['snippet']['title'];
												var description = d['items'][i]['snippet']['description'];
												var img = '<img style="width:120px;height:40px;float:left;" src="https://img.youtube.com/vi/'+videoId+'/0.jpg">';
												$('#yt-result').append('<li data-id="'+videoId+'" class="yt-insert" style="width:calc(100% - 5px);clear:both;cursor:pointer;list-style:none;">'+img+title+'</li>');
											}
										}
									}
								});
							}
                        }],

                        cancel : [lang.buttons.cancel, function() {                                   
                            this.hide().lockScreen(false).hideMask();

                            return false;
                        }]
					}
				});
				$('#yt-search-button').on('click', function (e) {
					$.ajax({
						type: "post",
						url: g5_url+'/plugin/editor/'+g5_editor+'/plugins/yt-dialog/yt_search.php',
						data: {
							q : $('#yt_q').val(),
						},
						dataType: "json",
						success: function (d) {
							$('#yt-result').empty();
							if(d.error){
								alert('유튜브 apikey를 입력해주세요');
							}else{
								nextToken = d.nextPageToken;
								for(var i=0;i<d.items.length;i++){
									var videoId = d['items'][i]['id']['videoId'];
									var title = d['items'][i]['snippet']['title'];
									var description = d['items'][i]['snippet']['description'];
									var img = '<img style="width:120px;height:40px;float:left;" src="https://img.youtube.com/vi/'+videoId+'/0.jpg">';
									$('#yt-result').append('<li data-id="'+videoId+'" class="yt-insert" style="width:calc(100% - 5px);clear:both;cursor:pointer;list-style:none;">'+img+title+'</li>');
								}
							}
						}
					});
				});
				$(document).on('click','.yt-insert', function () {
					cm.replaceSelection('\n%%youtube\nhttps://www.youtube.com/watch?v='+$(this).data('id')+'\n%%');
				});
			}

			dialog = editor.find("." + dialogName);

			this.dialogShowMask(dialog);
			this.dialogLockScreen();
			dialog.show();
		};

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
                var editormd = require("./../../editormd");
                factory(editormd);
            });
		}
	}
	else
	{
        factory(window.editormd);
	}

})();