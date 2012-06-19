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
					console.log(errorThrown);
				},
				success: function(data, textStatus, jqXHR) {
					console.log(data);
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
	$('ul.generic-menu li').each(function(){
		$(this).hover(
			// mouse over handler
			function(){
				$(this).addClass("hover");
			},
			// mouse out handler
			function(){
				$(this).removeClass("hover");
			}
		);
	});
});


function setPage(url, page)
{
	$.ajax({
		url: url,
		data: {'page': page},
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
		data: {'rows': rows},
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

