// Javascript main file

$(document).ready(function(){
	$('form.via_ajax').each(function(){
		var url = $(this).attr('action');
		$(this).submit(function(){
			$.ajax({
				url: url,
				dataType: "json",
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(errorThrown);
				},
				success: function(data, textStatus, jqXHR) {
					console.log(data);
				},
				complete: function(jqXHR, textStatus) {
					console.log(jqXHR);
				}
			});
		});
	});
});