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
		
		parseHttpResponse: function (jqXHR, _htmlCallback) 
		{
			console.log('parseHttpResponse');
			//console.log($.type(jqXHR));
			
			var isJSON = false;
			if ($.isFunction(jqXHR.getResponseHeader)) {
				if (jqXHR.getResponseHeader('Content-Type') == 'application/json') {
					var response = $.parseJSON(jqXHR.responseText);
					isJSON = true;
					//alert ('jqxhr');
				}
			} else if($.isPlainObject(jqXHR)) {
				var response = jqXHR;
				isJSON = true;
				//alert ('json');
			}
			
			if (isJSON && response && response.actions && $.isArray(response.actions)) {					
				for (var i=0; i < response.actions.length; i++) {						
					for (var key in response.actions[i]) {							
						var method = 'parse' + key.charAt(0).toUpperCase() + key.substr(1);
						$(this).cmsManager(method, response.actions[i][key]);
						if (key == 'redirect') {
							return;
						}
						
					}
				}
				return;
			}
			
			if (_htmlCallback && $.isFunction(jqXHR.getResponseHeader)) {
			
				if (_htmlCallback.method == 'html') {
					$(_htmlCallback.container).html(jqXHR.responseText);
				} else if (_htmlCallback.method == 'before') {
					$(_htmlCallback.container).before(jqXHR.responseText);
				} else if (_htmlCallback.method == 'after') {
					$(_htmlCallback.container).after(jqXHR.responseText);
				}
				$('.via_ajax').cmsManager('observe');
			}
			
			return;
			/*var response_pattern = {
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
			};*/
		},
		
		/**
		 * 
		 */
		_assembleUrl: function (object)
		{
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
			
			console.log('_assembleUrl - ' + url);
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
			console.log(data);
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
			uploader();
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
						tinyMCE.triggerSave();
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
		
		imagesFormSelector: function (values, hidden_id, wId)
		{
			console.log('imagesFormSelector');
			
			if (values.length == 0) {				
				wId.dialog('close');
				wId.dialog('destroy');
				return;
			}
			
			$(this).cmsManager('imagesRenderer', values, hidden_id);
			
			wId.dialog('close');
			wId.dialog('destroy');
		},
		
		mainImageRenderer: function (element, hidden_id)
		{
			console.log('mainImageRenderer');
			//alert($('#' + hidden_id).attr('value'));
			if (!element) {
				//image = 
				id = $('#' + hidden_id).attr('value');
				type = $('#' + hidden_id).attr('media-type');
				
			} else {
				id = $(element).attr('media-id');
				type = $(element).attr('media-type');
			}
			$('.' + hidden_id + '-list').html('');
			if (id == '' || type == '') {return;}
			
			var html = '<li class="result-list-item-' + id + '">';
			    html += '<img src="/uploads/' + id + '.' + type + '" width="150" height="150">';
			    html += '<a onclick="$.fn.cmsManager(\'mainImageClearer\', ' + id + ', \'' + hidden_id + '\');">удалить</a>';
			    html += '</li>';
			$('.' + hidden_id + '-list').html(html);
		},
		
		imagesRenderer: function (elements, hidden_id)
		{
			console.log('imagesRenderer');
			
			if (!hidden_id) {
				return;
			}
			
			items = [];
			values = $('#' + hidden_id).attr('value').split('|');
			for (var i = 0; i < values.length; i++) {
				var media = values[i].split('@');
				items.push({'id': media[0], 'type': media[1]});
			}
			
			if (elements) {
				elements.each(function(){
					var exists = false;
					for (var i = 0; i < items.length; i++) {
						if (items[i].id == $(this).attr('media-id')) {
							exists = true;
							break;
						}
					}
					
					if (!exists) {
						items.push({'id': $(this).attr('media-id'), 'type': $(this).attr('media-type')});
					}
					
				});
			}
			
			$('.' + hidden_id + '-list').empty();
			var html = '';
			var newValues = [];
			for (var i = 0; i < items.length; i++) {
				newValues.push(items[i].id + '@' + items[i].type);
				
				html  = '<li class="result-list-item-' + items[i].id + '">';
				html += '<img src="/uploads/' + items[i].id + '.' + items[i].type + '" width="70" height="70">';
				html += '<a onclick="$.fn.cmsManager(\'imagesClearer\', ' + items[i].id + ', \'' + hidden_id + '\');">удалить</a>';
				html += '</li>';
				$('.' + hidden_id + '-list').append(html);
			}
			
			$('#' + hidden_id).attr('value', newValues.join('|'));
		},
		
		mainImageClearer: function (id, hidden_id)
		{
			console.log('mainImageClearer');
			
			$('#' + hidden_id).attr('value', '');
			$.fn.cmsManager('mainImageRenderer', null, hidden_id);
		},
		
		imagesClearer: function (id, hidden_id)
		{
			console.log('imagesClearer');
			
			values = $('#' + hidden_id).attr('value').split('|');
			newValues = [];
			
			for (var i = 0; i < values.length; i++) {
				var media = values[i].split('@');
				
				if (media[0] != id) {
					newValues.push(values[i]);
				}				
			}
			
			$('#' + hidden_id).attr('value', newValues.join('|'));
			$.fn.cmsManager('imagesRenderer', null, hidden_id);
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
	$('.via_ajax').cmsManager('observe');
	//uploader();
	rightFormSelector();
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
		var buttons =  $('.swfupload-button');
		console.log ('Buttons length - ' + buttons.length);
		su.unbind();
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
					//$.swfupload.getInstance(su).cancelUpload();
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
			//$('.via_ajax').cmsManager('parseFlashResponse', serverData);
			var json = $.parseJSON(serverData);
			
			if (json.success == true) {
				progress = su.data('__bar');
				progress.dialog("close");
				progress.dialog("destroy");
				
				$('.via_ajax').cmsManager('parseHttpResponse', json);
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

function rightFormSelector()
{
	var fields = ['#media', '#seo', '#system', '#feeds'];
	for (var i = 0; i <fields.length; i++) {
		$(fields[i] + " > legend").css("cursor", "pointer");
		$(fields[i] + " > legend").bind('click', {id:fields[i]}, function(event){
			rightFormSelectorManipulator(event.data.id);
		});
	}
	//console.log(fields);
}

function rightFormSelectorManipulator(id)
{
	var controls = $(id + " > div");
	controls.each(function() {
		if ($(this).is('.form-composite-element')) {
			$(id + " > legend").css("background", "url(/theme/img/admin/right_arrow_top-17px.png) center right no-repeat");
			$(this).removeClass('form-composite-element');
			$(this).addClass('form-composite-element-active');
		} else {
			$(id + " > legend").css("background", "url(/theme/img/admin/right_arrow_bottom-17px.png) center right no-repeat");
			$(this).removeClass('form-composite-element-active');
			$(this).addClass('form-composite-element');
		}
	});
	//console.log(controls);
}


$(document).ready(function(){
    $('#title').syncTranslit({
         destination: 'alias',
         type: 'url',
         caseStyle: 'lower',
         urlSeparator: '-'
    });
});




