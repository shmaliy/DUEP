// Javascript main file

// redirect - строка, перенаправляет на указанный адрес
// update - строка, div.body-container (по умолчанию), либо указанный блок
// append - строка, дописывает ответ в указанный блок
// prepend - строка, дописывает ответ в начало указанного блока
// exception - объект, обработка исключений



(function( $ ) {
	
	var methods = {
		init: function () {
				
		},
		
		parseFlashResponse: function (serverData) {
			if (!serverData) {
				return;
			}
			
			var response = $.parseJSON(serverData);
			
			if(response !== null) {
				if (response.action) {
					var method = 'response_' + response.action;
					$(this).cmsManager(method, response);
				}
			}
		},
		
		parseHttpResponse: function (jqXHR, _htmlCallback) 
		{
			console.log('parseHttpResponse');
			var contentType = jqXHR.getResponseHeader('Content-Type');	
			
			if (contentType == 'application/json') {
				var response = $.parseJSON(jqXHR.responseText);
				
				if (response && response.actions && $.isArray(response.actions)) {					
					for (var i=0; i < response.actions.length; i++) {						
						for (var key in response.actions[i]) {							
							var method = 'parse' + key.charAt(0).toUpperCase() + key.substr(1);
							$(this).cmsManager(method, response.actions[i][key]);
							if (key == 'redirect') {
								return;
							}
							
						}
					}
				}
				
				return;
			}
			
			if (_htmlCallback.method == 'html') {
				$(_htmlCallback.container).html(jqXHR.responseText);
			} else if (_htmlCallback.method == 'before') {
				$(_htmlCallback.container).before(jqXHR.responseText);
			} else if (_htmlCallback.method == 'after') {
				$(_htmlCallback.container).after(jqXHR.responseText);
			}
			$('.via_ajax').cmsManager('observe');
			return;			
			
			var response_pattern = {
				actions: [
				    {redirect: {
				    	url: 'url'|{m:m, c:c, a:a, params:{}}
				    }},
				    {update: {
				    	container: '#container',
				    	url: 'url'|{m:m, c:c, a:a, params:{}},
				    	source: 'source'
				    }},
				    {insert: {
				    	container: '#container',
				    	url: 'url'|{m:m, c:c, a:a, params:{}},
				    	source: 'source'
				    }},
				    {append: {
				    	container: '#container',
				    	url: 'url'|{m:m, c:c, a:a, params:{}},
				    	source: 'source'
				    }}
				],
				exception: {}
			};
		},
		
		/**
		 * 
		 */
		_assembleUrl: function (object)
		{
			console.log('_assembleUrl');
			if (typeof object == 'string') {
				return object;
			}
			
			if (!$.isPlainObject(object)) {
				$.error('Are you fucking kidding me???');
			}
			
			var module = 'default';
			if (object.m && typeof object.m == 'string') {
				module = object.m;
			}
			
			var controller = 'index';
			if (object.c && typeof object.c == 'string') {
				controller = object.c;
			}

			var action = 'index';
			if (object.a && typeof object.a == 'string') {
				action = object.a;
			}
			
			var params = {};
			if (object.params && $.isPlainObject) {
				params = object.params;
			}
			
			var url = '/' + module + '/' + controller + '/' + action;
			for (var key in params) {
				url += '/' + key + '/' + params[key];
			}
			
			return url;
		},
		
		_getHtml: function (data, method)
		{
			console.log('_getHtml');
			if (!data.url && !data.source) {
				return;
			}
			
			if (data.source && typeof data.source == 'string') {
				return data.source;
			}
			
			if (data.url && (typeof data.url == 'string' || $.isPlainObject(data.url))) {
				var url = $(this).cmsManager('_assembleUrl', data.url);
				data.method = method;
				$(this).cmsManager('request', url, {format: 'html'}, data);
				return;
			}
		},
		
		/**
		 * It Works! Mazafaka!
		 * @param data
		 */
		parseRedirect: function (data)
		{
			console.log('parseRedirect');
			if (!data || !data.url) {
				return;
			}
			
			window.location = $(this).cmsManager('_assembleUrl', data.url);
		},
		
		parseUpdate: function (data)
		{
			console.log('parseUpdate');
			if(!data.container || typeof data.container != 'string') {
				data.container = '.body-container';
			}
			
			$(data.container).html(function(){
				$(this).cmsManager('_getHtml', data, 'html');
			});
		},
		
		parsePrepend: function (data) 
		{
			console.log('parsePrepend');
			if(!data.container || typeof data.container != 'string') {
				data.container = '.body-container';
			}
			
			$(data.container).before(function(){
				$(this).cmsManager('_getHtml', data, 'before');
			});
		},
		
		parseAppend: function (data)
		{
			console.log('parseAppend');
			if(!data.container || typeof data.container != 'string') {
				data.container = '.body-container';
			}
			
			$(data.container).after(function(){
				$(this).cmsManager('_getHtml', data, 'after');
			});
		},
		
		observe: function()
		{
			console.log('observe');
			return this.each(function(){
				var action = null;
				var attr   = null;
				
				if ($(this).is('a')) {
					action = 'click';
					attr   = 'href';
				} else if ($(this).is('form')) {
					action = 'submit';
					attr   = 'action';
					
				}
				
				if (action === null) {
					$.error( "Can't observe selected tags" );
				}
				
				$(this).unbind(action);
				$(this).bind(action, function(event){
					event.preventDefault();
					event.stopPropagation();
					
					var data   = {};
					if (action == 'submit') {
						data = $(this).serialize();
						$(this).find('input, select, textarea, button').attr("disabled", "disabled");				
					}
					
					$(this).cmsManager('request', $(this).attr(attr), data);
					return false;
				});
			});
		},
		
		request: function (url, data, _htmlCallback)
		{
			console.log('request');
			if (!data) {
				data = '';
			}
			
			if (typeof url != 'string') {
				$.error( 'Url passed in to "request" must be a string!' );
			}
			
			if (typeof data != 'string' && !$.isPlainObject(data)) {
				$.error( 'Data passed in to "request" must be a string or isPlainObject!' );
			}
			
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					$(this).cmsManager('parseHttpResponse', jqXHR, _htmlCallback);
				},
				success: function(data, textStatus, jqXHR) {
					$(this).cmsManager('parseHttpResponse', jqXHR, _htmlCallback);
				},
				complete: function(jqXHR, textStatus) {}
			});
		},
		
		mainImageFormSelector: function (value, hidden_id, wId)
		{
			console.log('mainImageFormSelector');
			
			$('#' + hidden_id).attr('value', $(value).attr('media-id'));
			$('#' + hidden_id).attr('media-type', $(value).attr('media-type'));
			
			$(this).cmsManager('mainImageRenderer', value);
			
			wId.dialog('close');
			wId.dialog('destroy');
		},
		
		mainImageRenderer: function (element)
		{
			console.log('mainImageRenderer');
			if (!element) {
				id = $("#media_id").attr('value');
				type = $("#media_id").attr('media-type');
				//alert(id);
			} else {
				id = $(element).attr('media-id');
				type = $(element).attr('media-type');
			}
			
			if(id == '' || type == '') {return;}
			
			var appendContent = '<li id="result-list-item-' + id + '">';
				appendContent += '<img src="/uploads/' + id + '.' + type + '" width="150" height="150">';
				appendContent += '<a onclick="$.fn.cmsManager(\'mainImageClearer\', ' + id + ');">удалить</a>';
				appendContent += '</li>';
			$('.media_id-list').html(appendContent);
		},
		
		mainImageClearer: function (id)
		{
			console.log('mainImageClearer');
			$('#result-list-item-' + id).remove();
			$('#media_id').attr('value', '');
		}
	};
	
	$.fn.cmsManager = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );



$(document).ready(function(){
	//observeFormOnSubmit();
	//observeAnchorOnClick();
	$.fn.cmsManager('mainImageRenderer');
	$('.via_ajax').cmsManager('observe');
});

// Observe generic menu class toggle
$(document).ready(function(){
	$('ul.generic-menu li, tr').each(function(){
		$(this).hover(
			function(){ $(this).addClass("hover"); },
			function(){ $(this).removeClass("hover"); }
		);
	});
});

// Observe table checkbox
$(document).ready(function(){
	function toggleActions()
	{
		var cbChecked = $('.admin-table table tr input[type=checkbox]:checked');
		if (cbChecked.length > 0) {
			$('.admin-actions .single').hide();
			$('.admin-actions .multi').show();
		} else {
			$('.admin-actions .single').show();
			$('.admin-actions .multi').hide();
		}
		
	}
	
	var cbAll = $('.admin-table table th input[type=checkbox]');
	var cbRow = $('.admin-table table tr input[type=checkbox]');
	
	cbAll.change(function(){
		var checked = cbAll.attr('checked');
		if (checked) {
			cbRow.attr('checked', checked);
		} else {
			cbRow.attr('checked', false);
		}
		
		toggleActions();
	});
	
	cbRow.change(function(){ toggleActions(); });
});

// Flash messenger
$(document).ready(function(){
	function hidePreviousFlashMessage(div)
	{
		//alert('hide');
		$(div).slideUp(400, function(){
			var next = $(div).next();
			$(div).remove();
			
			setTimeout(function(){
				hidePreviousFlashMessage(next);
			}, 1500);
		});
	}
	
	function showNextFlashMessage(div)
	{
		$(div).css({opacity: 0});
		$(div).animate(
			{opacity: 1, height: 'toggle'},
			400,
			function(){
				var next = $(div).next();
				if (next.is('div')) {
					showNextFlashMessage($(div).next());
				} else {
					setTimeout(function(){
						hidePreviousFlashMessage($('.flash-messenger-messages div').first());
					}, 5000);
				}
			}
		);
	}
	
	showNextFlashMessage($('.flash-messenger-messages div').first());
});

function uploader()
{
	var swfuploadOptions = {
			upload_url: "upload.php",
			file_post_name : "upload",
			file_size_limit : "2GB",
			file_types : "*.*",
			button_placeholder_container_id: "",
			file_types_description : "All Files",
			file_upload_limit : "0",
			flash_url : "/js/jquery/jquery.swfupload/swfupload.swf",
			button_image_url : '/js/jquery/jquery.swfupload/swfupload.png',
			button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_action : SWFUpload.BUTTON_ACTION.SELECT_FILE,
			debug: true,
			custom_settings : {something : "here"}
		};
		
		var su = $('.swfupload-button').swfupload(swfuploadOptions);
		
		su.bind('swfuploadLoaded', function(event){
			//$('#log').append('<li>Loaded</li>');
			console.log('Loaded');
		});
		
		su.bind('fileQueued', function(event, file){
			//$('#log').append('<li>File queued - '+file.name+'</li>');
			console.log('File queued - ' + file.name);
			
			// start the upload since it's queued
			var progress = $(
				'<div class="swfupload-progress"><div class="swfupload-file-title">' + file.name + '</div><div class="swfupload-progress-bar"></div></div>'
			);
			progress.dialog({
				modal: true,
				resizable: false,
				title: "Загрузка...",
				width: 400,
				height: 150,
				beforeClose: function(event, ui) {
					$.swfupload.getInstance(su).cancelUpload();
				}
			});
			
			progress.find('.swfupload-progress-bar').progressbar({value: 0});
			
			su.data('__bar', progress);
			$(this).swfupload('startUpload');
		});
		
		su.bind('fileQueueError', function(event, file, errorCode, message){
			//$('#log').append('<li>File queue error - '+message+'</li>');
			console.log('File queue error - ' + message);
		});
		
		su.bind('fileDialogStart', function(event){
			//$('#log').append('<li>File dialog start</li>');
			console.log('File dialog start');
		});
		
		su.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
			//$('#log').append('<li>File dialog complete</li>');
			console.log('File dialog complete');
		});
		
		su.bind('uploadStart', function(event, file){
			//$('#log').append('<li>Upload start - '+file.name+'</li>');
			console.log('Upload start - ' + file.name);
		});
		
		su.bind('uploadProgress', function(event, file, bytesLoaded, bytesTotal){
			//$('#log').append('<li>Upload progress - '+bytesLoaded+'</li>');
			//console.log('Upload progress - ' + bytesLoaded);
			
			progress = su.data('__bar');
			progress.find('.swfupload-progress-bar').progressbar("value" , Math.ceil(bytesLoaded/bytesTotal*100));
		});
		
		su.bind('uploadSuccess', function(event, file, serverData){
			//$('#log').append('<li>Upload success - '+file.name+'</li>');
			console.log('Upload success - ' + file.name);
			$('.via_ajax').cmsManager('parseFlashResponse', serverData);
			eval('var json = ' + serverData);
			
			if (json.success === true) {
				progress = su.data('__bar');
				progress.dialog("close");
				progress.dialog("destroy");
				
				if (json.redirectTo != '') {
					//window.location.href = json.redirectTo;
				}
			}
		});
		
		su.bind('uploadComplete', function(event, file){
			//$('#log').append('<li>Upload complete - '+file.name+'</li>');
			console.log('Upload complete - ' + file.name);
			
			// upload has completed, lets try the next one in the queue
			$(this).swfupload('startUpload');
		});
		
		su.bind('uploadError', function(event, file, errorCode, message){
			//$('#log').append('<li>Upload error - '+message+'</li>');
			console.log('Upload error - ' + message);
			
			progress = su.data('__bar');
			progress.html('<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding:0 .7em"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>Ошибка загрузки.</p></div></div>');
		});
}


//Observe generic menu class toggle
$(document).ready(function(){
	uploader();
});

function deleteItem(url, id)
{
	$.ajax({
		url: url,
		data: {'id': id},
		dataType: "json",
		type: 'POST',
		error: function(jqXHR, textStatus, errorThrown) {
			parseResponse(jqXHR);
		},
		success: function(data, textStatus, jqXHR) {
			parseResponse(jqXHR);
		},
		complete: function(jqXHR, textStatus) {
			parseResponse(jqXHR);
			window.location.href = window.location.href;
		}
	});
	
	return false;
}

