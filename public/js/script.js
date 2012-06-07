// Javascript main file

$(document).ready(function(){
	$('form.via_ajax').each(function(){
		var url = $(this).attr('action');
		$(this).submit(function(){
			$.ajax({
				url: url,
				dataType: "json",
				error: function(jqXHR, textStatus, errorThrown){},
				success: function(data, textStatus, jqXHR){
					console.log(data);
				},
				complete: function(jqXHR, textStatus) {
					var e = $('<div></div>');
					e.attr({
						'id': 'dialog',
						'title': 'Запрос выполнен'
					});
					$(e).dialog();
				}
			});
		});
		console.log(url);
	});
});