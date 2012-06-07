// Javascript main file

function formCheckRequiredNotEmpty(f)
{
	var allFilled = true;
	
	// Get form required fields
	$(f).find('label.required').each(function(){
		var field = $('#' + $(this).attr('for'));
		var empty = false;
		
		// Check if errors container exists
		if (!field.parent().find('.errors').is('ul')) {
			$('<ul></ul>').addClass("errors").insertAfter(field);
		}
		
		field.parent().find('.errors').html('');
		field.css('outline', 'none');
		
		if ((field.attr('type') == 'text' || field.attr('type') == 'password') && !field.val()) {
			empty = true;
		}
		
		if (field.attr('type') == 'checkbox' && !field.attr('checked')) {
			empty = true;
		}
		
		if (field.is('select') && field.val() == 'none') {
			empty = true;
		}
		
		if (empty) {
			allFilled = false;
			field.parent().find('.errors').html('<li>Это поле обязательно для заполнения</li>');
			field.css('outline', '1px solid #a00');
		}
	});
	
	return allFilled;
}

function reRenderDaysList(selectTagMonth, selectTagDay, selectTagYear)
{
	var daysMaxByMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	var max = (!(selectTagYear.val() % 4) && selectTagMonth.val() == 2) ? daysMaxByMonth[selectTagMonth.val() - 1] + 1 : daysMaxByMonth[selectTagMonth.val() - 1];
	
	selectTagDay.empty();	
	
	for (var i = 1; i <= max; i++) {
		$("<option>").attr("value", i).text(i).appendTo(selectTagDay);
	}
}

function showFormLogin()
{
	$('#loader').show();
	$('.popup-container').hide();
	$.ajax({
		url: '/index/login/format/html',
		dataType: "html",
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			$('.popup-item').css('width', '330px');
			$('.popup-item').css('height', '305px');
			$('.popup-item').css('margin-top', '-152.5px');
			$('.popup-item').css('margin-left', '-165px');
			$('.popup-item').html(data);
			$('.popup-container').show();
		}
	});
	
	return false;
}

function showFormRegister()
{
	$('#loader').show();
	$('.popup-container').hide();
	$.ajax({
		url: '/index/register/format/html',
		dataType: "html",
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			$('.popup-item').css('width', '665px');
			$('.popup-item').css('height', '405px');
			$('.popup-item').css('margin-top', '-202.5px');
			$('.popup-item').css('margin-left', '-332.5px');
			$('.popup-item').html(data);
			$('.popup-container').show();
		}
	});
	
	return false;
}

function showFormFrogotPassword()
{
	$('#loader').show();
	$('.popup-container').hide();
	$.ajax({
		url: '/index/forgot-password/format/html',
		dataType: "html",
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			$('.popup-item').css('width', '330px');
			$('.popup-item').css('height', '305px');
			$('.popup-item').css('margin-top', '-152.5px');
			$('.popup-item').css('margin-left', '-165px');
			$('.popup-item').html(data);
			$('.popup-container').show();
		}
	});
	return false;
}

function formLoginSend(f)
{
	$('#loader').show();
	f = $(f);

	// Validate empty fields
	if (!formCheckRequiredNotEmpty(f)) {
		$('#loader').hide();
		return false;
	}
	
	// Send form with ajax
	$.ajax({
		url: '/index/login',
		data: f.serialize(),
		dataType: "json",
		type: "POST",
		error: function(jqXHR, textStatus, errorThrown){},
		success: function(data, textStatus, jqXHR) {
			$('#loader').hide();
			// Check if errors container exists
			if (!$('#submit').parent().find('.errors').is('ul')) {
				$('<ul></ul>').addClass("errors").insertAfter($('#submit'));
			}

			// Handle errors
			if (data['errors'] && data['errors']['submit']) {
				if (data['errors']['submit'][0] == "SUCCESS") {
					$('.popup-item').html('');
					window.location.href = '/';
				} else if (data['errors']['submit'][0] == "FAILURE_CREDENTIAL_INVALID") {
					$('#submit').parent().find('.errors').html('<li>Неправильный пароль</li>');
				} else if (data['errors']['submit'][0] == "FAILURE_IDENTITY_NOT_FOUND") {
					$('#submit').parent().find('.errors').html('<li>Пользователь с таким номером не найден</li>');
				} else if (data['errors']['submit'][0] == "FAILURE"
					|| data['errors']['submit'][0] == "FAILURE_IDENTITY_AMBIGUOUS"
					|| data['errors']['submit'][0] == "FAILURE_UNCATEGORIZED") {
					$('#submit').parent().find('.errors').html('<li>Ошибка аутентификации</li>');
				} else {
					$('#submit').parent().find('.errors').html('<li>Ошибка аутентификации<!--json["errors"]["submit"][0]--></li>');
				}
			} else {
				$('#submit').parent().find('.errors').html('<li>Ошибка аутентификации<!--json["errors"]["submit"]--></li>');
			}
		},
		complete: function(){}
	});

	return false;
}

function formRegisterSend(f)
{
	var validatorsErrors = {
		'regexNotMatch': {
			'phone': 'Допускаются только цифры и знак +',
			'name': 'Допускаются только цифры и пробел'
		},
		'notDigits': 'Не цифра',
		'notSame': 'Введенные пароли не совпадают',
		'emailAddressInvalidFormat': 'Неправильный формат email'
	};

	$('#loader').show();
	f = $(f);

	// Validate empty fields
	if (!formCheckRequiredNotEmpty(f)) {
		$('#loader').hide();
		return false;
	}
	
	// Hide errors
	$(f).find('.error').each(function(){
		$(this).html('');
	});
	
	// Send form with ajax
	$.ajax({
		url: '/index/register',
		data: f.serialize(),
		dataType: "json",
		type: "POST",
		error: function(jqXHR, textStatus, errorThrown){},
		success: function(data, textStatus, jqXHR) {
			$('#loader').hide();
			
			// Check if errors container exists
			if (!$('#submit').parent().find('.errors').is('ul')) {
				$('<ul></ul>').addClass("errors").insertAfter($('#submit'));
			}
			
			if (data['errors'] && data['errors']['submit']) {
				if (data['errors']['submit'][0] == "SUCCESS") {
					$('.popup-item').html('');
					showFormLogin();
				} else if (data['errors']['submit'][0] == "FAILURE_USER_EXISTS_IN_DB") {
					$('#submit').parent().find('.errors').html('<li>Пользователь существует</li>');
				} else {
					for (var i in data['errors']) {
						if (!$('#' + i).parent().find('.errors').is('ul')) {
							$('<ul></ul>').addClass("errors").insertAfter($('#' + i));
						}
						
						if (data['errors'][i].length > 0) {
							if (data['errors'][i][0] == 'regexNotMatch') {
								$('#' + i).parent().find('.errors').html('<li>' + validatorsErrors[data['errors'][i][0]][i] + '</li>');
							} else {
								$('#' + i).parent().find('.errors').html('<li>' + validatorsErrors[data['errors'][i][0]] + '</li>');
							}
						}
					}
					
					$('#submit').parent().find('.errors').html('<li>Ошибка регистрации</li>');
				}
			}
		},
		complete: function(){}
	});

	return false;
}

function formEditAccountSend(f)
{
	var validatorsErrors = {
		'regexNotMatch': {
			'phone': 'Допускаются только цифры и знак +',
			'name': 'Допускаются только цифры и пробел'
		},
		'notDigits': 'Не цифра',
		'notSame': 'Введенные пароли не совпадают',
		'emailAddressInvalidFormat': 'Неправильный формат email'
	};
	
	$('#loader').show();
	f = $(f);

	// Validate empty fields
	if (!formCheckRequiredNotEmpty(f)) {
		$('#loader').hide();
		return false;
	}
	
	// Hide errors
	$(f).find('.error').each(function(){
		$(this).html('');
	});
	
	// Send form with ajax
	$.ajax({
		url: '/index/edit-account',
		data: f.serialize(),
		dataType: "json",
		type: "POST",
		error: function(jqXHR, textStatus, errorThrown){},
		success: function(data, textStatus, jqXHR) {
			$('#loader').hide();
			// Check if errors container exists
			if (!$('#submit').parent().find('.errors').is('ul')) {
				$('<ul></ul>').addClass("errors").insertAfter($('#submit'));
			}

			// Handle errors
			if (data['errors'] && data['errors']['submit']) {
				if (data['errors']['submit'][0] == "SUCCESS") {
					$('.popup-item').html('');
					window.location.href = '/';
				} else if (data['errors']['submit'][0] == "FAILURE_USER_NOT_AUTHORIZED") {
					$('#submit').parent().find('.errors').html('<li>Вы не авторизованы</li>');
				} else if (data['errors']['submit'][0] == "FAILURE_UPDATE_AUTH_IDENTITY") {
					$('#submit').parent().find('.errors').html('<li>Ошибка обновления аутентификации</li>');
				} else if (data['errors']['submit'][0] == "FAILURE_USER_NOT_EXISTS_IN_DB") {
					$('#submit').parent().find('.errors').html('<li>Пользователя не существует</li>');
				} else {
					for (var i in data['errors']) {					
						if (!$('#' + i).parent().find('.errors').is('ul')) {
							$('<ul></ul>').addClass("errors").insertAfter($('#' + i));
						}
						
						if (data['errors'][i].length > 0) {
							if (data['errors'][i][0] == 'regexNotMatch') {
								$('#' + i).parent().find('.errors').html('<li>' + validatorsErrors[data['errors'][i][0]][i] + '</li>');
							} else {
								$('#' + i).parent().find('.errors').html('<li>' + validatorsErrors[data['errors'][i][0]] + '</li>');
							}
						}
					}
				
					$('#submit').parent().find('.errors').html('<li>Ошибка сохранения</li>');
				}
			} else {
				$('#submit').parent().find('.errors').html('<li>Ошибка сохранения<!--json["errors"]["submit"]--></li>');
			}
		},
		complete: function(){}
	});

	return false;
}


function formForgotPasswordSend(f)
{
	$('#loader').show();
	f = $(f);

	// Validate empty fields
	if (!formCheckRequiredNotEmpty(f)) {
		$('#loader').hide();
		return false;
	}
	
	// Send form with ajax
	$.ajax({
		url: '/index/forgot-password',
		data: f.serialize(),
		dataType: "json",
		type: "POST",
		error: function(jqXHR, textStatus, errorThrown){},
		success: function(data, textStatus, jqXHR) {
			$('#loader').hide();
			// Check if errors container exists
			if (!$('#submit').parent().find('.errors').is('ul')) {
				$('<ul></ul>').addClass("errors").insertAfter($('#submit'));
			}

			// Handle errors
			if (data['errors'] && data['errors']['submit']) {
				if (data['errors']['submit'][0] == "SUCCESS") {
					$('.popup-item').html('');
					showFormLogin();
				} else if (data['errors']['submit'][0] == "FAILURE_USER_NOT_EXISTS_IN_DB") {
					$('#submit').parent().find('.errors').html('<li>Пользователь с таким номером не найден</li>');
				} else if (data['errors']['submit'][0] == "FAILURE_USER_EMAIL_NOT_SET") {
					$('#submit').parent().find('.errors').html('<li>Не указан email для восстановления</li>');
				} else if (data['errors']['submit'][0] == "FAILURE_SEND_EMAIL") {
					$('#submit').parent().find('.errors').html('<li>Ошибка отправки письма</li>');
				} else {
					$('#submit').parent().find('.errors').html('<li>Ошибка восстановления пароля<!--json["errors"]["submit"][0]--></li>');
				}
			} else {
				$('#submit').parent().find('.errors').html('<li>Ошибка восстановления пароля<!--json["errors"]["submit"]--></li>');
			}
		},
		complete: function(){}
	});

	return false;
}

function toggleCustomAnswerField(s)
{
	s = $(s);
	var p = s.parent().find('p');
	
	if (s.val().substr(-6) == 'custom') {
		if (!p.is('p')) {
			var p = $('<p><input type="text" name="' + s.attr('id') +'_custom" /></p>').addClass("description").insertAfter(s);
		}
		
		p.html($('<input type="text" name="' + s.attr('id') +'_custom" />'));
		p.show();
	} else {
		if (s.parent().find('p').is('p')) {
			var p = s.parent().find('p');
			p.html('');
			p.hide();
		}
	}
}

function formQuestionsSend(f)
{
	$('#loader').show();
	f = $(f);

	// Validate empty fields
	if (!formCheckRequiredNotEmpty(f)) {
		$('#loader').hide();
		return false;
	}
	
	// Send form with ajax
	$.ajax({
		url: '/',
		data: f.serialize(),
		dataType: "json",
		type: "POST",
		error: function(jqXHR, textStatus, errorThrown){},
		success: function(data, textStatus, jqXHR) {
			$('#loader').hide();
			// Handle errors
			if (data['errors'] && data['errors']['submit']) {
				if (data['errors']['submit'][0] == "SUCCESS") {
					$('.popup-item').html('');
					window.location.href = '/';
				} else if (data['errors']['submit'][0] == "FAILURE_USER_NOT_AUTHORIZED") {
					alert('Вы не авторизованы');
				} else if (data['errors']['submit'][0] == "FAILURE_ANSWER_OPTION_VALUE_IS_EMPTY") {
					alert('Пожалуйста ответьте на все вопросы');
				} else if (data['errors']['submit'][0] == "FAILURE_SAVE_ANSWER") {
					alert('Ошибка сохранения вопроса(ов)');
				} else {
					console.log('Unhandled error');
				}
			} else {
				console.log('Unhandled error');				
			}
		},
		complete: function(){}
	});

	return false;
}

function deleteQuestion(question_id)
{
	$('#loader').show();
	
	$.ajax({
		url: '/index/delete-question',
		dataType: "json",
		type: "POST",
		data: {'question_id': question_id},
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			
			if (data['status'] == 'OK') {
				window.location.href = window.location.href;
			} else if (data['status'] == 'FAILURE_INVALID_POST') {
				alert('Ошибка передачи данных, пожалуйста обновите страницу');
			} else if (data['status'] == 'FAILURE_INVALID_SESSION') {
				alert('Сессия истекла, пожалуйста обновите страницу');
			}
		}
	});

	return false;
}

function deleteAnswersOption(option_id)
{
	$('#loader').show();
	
	$.ajax({
		url: '/index/delete-answers-option',
		dataType: "json",
		type: "POST",
		data: {'option_id': option_id},
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			
			if (data['status'] == 'OK') {
				window.location.href = window.location.href;
			} else if (data['status'] == 'FAILURE_INVALID_POST') {
				alert('Ошибка передачи данных, пожалуйста обновите страницу');
			} else if (data['status'] == 'FAILURE_INVALID_SESSION') {
				alert('Сессия истекла, пожалуйста обновите страницу');
			}
		}
	});

	return false;
}

function addAnswersOption(question_id)
{
	$('#loader').show();

	$.ajax({
		url: '/index/add-answer-option',
		dataType: "json",
		type: "POST",
		data: {'question_id': question_id},
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			
			if (data['status'] == 'OK') {
				window.location.href = window.location.href;
			} else if (data['status'] == 'FAILURE_INVALID_POST') {
				alert('Ошибка передачи данных, пожалуйста обновите страницу');
			} else if (data['status'] == 'FAILURE_INVALID_SESSION') {
				alert('Сессия истекла, пожалуйста обновите страницу');
			}
		}
	});

	return false;
}

function changeQuestionType(question_id, question_type)
{
	$('#loader').show();
	$.ajax({
		url: '/index/change-question-type',
		dataType: "json",
		type: "POST",
		data: {
			'question_id': question_id,
			'question_type': question_type
		},
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			
			if (data['status'] == 'OK') {
				window.location.href = window.location.href;
			} else if (data['status'] == 'FAILURE_INVALID_POST') {
				alert('Ошибка передачи данных, пожалуйста обновите страницу');
			} else if (data['status'] == 'FAILURE_INVALID_SESSION') {
				alert('Сессия истекла, пожалуйста обновите страницу');
			}
		}
	});

	return false;
}

function formQuestionsEditSave()
{
	var f = $('#questions-list');
	var data = f.serialize();
	
	var validatorsErrors = {
		'regexNotMatch': 'Допускаются только буквы цифры, пробел, +- и знаки препинания',
		'notDigits': 'Не цифра'
	};

	$('#loader').show();

	// Hide errors
	$(f).find('.error').each(function(){
		$(this).html('');
	});

	
	$.ajax({
		url: '/index/questionary-edit-save',
		dataType: "json",
		type: "POST",
		data: data,
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			
			// Hndle errors
			if (data['errors'] &&data['errors']['submit']) {
				if (data['errors']['submit'][0] == 'SUCCESS') {
					window.location.href = '/index/statistic';
				} else if (data['errors']['submit'][0] == 'FAILURE_INVALID_SESSION') {
					window.location.href = window.location.href;
				}
			} else if (data['errors']) {
				for (var i in data['errors']) {
					if (data['errors'][i].length > 0) {
						$('#' + i + '_error').html(validatorsErrors[data['errors'][i][0]]);
					}
				}
			}
		}
	});

	return false;
}

function addQuestion()
{
	$('#loader').show();
	
	$.ajax({
		url: '/index/add-question',
		dataType: "json",
		type: "POST",
		success: function(data, textStatus, jqXHR){
			$('#loader').hide();
			
			if (data['status'] == 'OK') {
				window.location.href = window.location.href;
			} else {
				alert('Сессия истекла, пожалуйста обновите страницу');
			}
		}
	});
	
	return false;
}

