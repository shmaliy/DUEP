// Javascript main file



$(document).ready(function(){
	$('form.via_ajax').each(function(){
		var url = $(this).attr('action');
		$(this).submit(function(){
			$.ajax({
				url: url,
				data: $(this).serialize(),
				dataType: "json",
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					//console.log(errorThrown);
				},
				success: function(data, textStatus, jqXHR) {
					//console.log(data);
					if (data.redirectTo) {
						window.location.href = data.redirectTo;
					}
				},
				complete: function(jqXHR, textStatus) {
					//console.log(jqXHR);
				}
			});
		});
	});
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

//Observe generic menu class toggle
$(document).ready(function(){
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
		
		eval('var json = ' + serverData);
		
		if (json.success === true) {
			progress = su.data('__bar');
			progress.dialog("close");
			progress.dialog("destroy");
			
			if (json.redirectTo != '') {
				window.location.href = json.redirectTo;
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
});


function setPage(url, page)
{
	$.ajax({
		url: url,
		data: {'SESSION_PAGE': page},
		dataType: "json",
		type: 'POST',
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(errorThrown);
		},
		success: function(data, textStatus, jqXHR) {
			console.log(data);
		},
		complete: function(jqXHR, textStatus) {
			//console.log(jqXHR);
			window.location.href = window.location.href;
		}
	});
	
	return false;
}

function setLimit(url, rows)
{
	$.ajax({
		url: url,
		data: {'SESSION_ROWS': rows},
		dataType: "json",
		type: 'POST',
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(errorThrown);
		},
		success: function(data, textStatus, jqXHR) {
			console.log(data);
		},
		complete: function(jqXHR, textStatus) {
			//console.log(jqXHR);
			window.location.href = window.location.href;
		}
	});
	
	return false;
}

function deleteItem(url, id)
{
	$.ajax({
		url: url,
		data: {'id': id},
		dataType: "json",
		type: 'POST',
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(errorThrown);
		},
		success: function(data, textStatus, jqXHR) {
			console.log(data);
		},
		complete: function(jqXHR, textStatus) {
			//console.log(jqXHR);
			window.location.href = window.location.href;
		}
	});
	
	return false;
}

