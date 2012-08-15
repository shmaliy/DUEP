$(document).ready(function () { 
	  $('.next').css("display","block");
	  $('.pre').css("display","none");
	smes = 0;
	kol_ele = $('.foto_slide').find("img").size();
	max_slide = 144 * (kol_ele - 5);
	nach = 0;
	end = max_slide;
	$('.right').click(function(){
		if(smes < max_slide){
			smes = smes + 144;
		$('.foto_slide').animate({
		    left: '-'+smes+'px',
		  }, "slow", function() {
			  $('.arrow_right').css("display","block");
			  $('.arrow_left').css("display","block");
	});
		}else{
			smes = nach;
			$('.foto_slide').animate({
			    left: '-'+nach+'px',
			  }, "slow", function() {
				  $('.arrow_right').css("display","block");
				  $('.arrow_left').css("display","block");
		});}
	});
	$('.left').click(function(){
		
		if(smes > 0){
			smes = smes - 144;
		$('.foto_slide').animate({
		    left: '-'+smes+'px',
		  }, "slow", function() {
			  $('.arrow_right').css("display","block");
			  $('.arrow_left').css("display","block");
	});
	}else{
		smes = end;
		$('.foto_slide').animate({
	    left: '-'+end+'px',
	  }, "slow", function() {
		  $('.arrow_right').css("display","block");
		  $('.arrow_left').css("display","block");
});}
	});
	
	$('.open_photo').click(function (){
		var id = $(this).attr('idfoto');
		$('.big_foto').hide();
		$('#'+id).fadeIn('fast');
		$('.min_foto').removeClass('active');
		$(this).parent().addClass('active');
		var num = $(this).attr('num');
		 $('.pre').css("display","block");
		  $('.next').css("display","block");
		if(num == 1){$('.pre').css("display","none");}
		if(num == kol_ele){$('.next').css("display","none");}
		$('.number').html(num);
		$('.info_text').hide();
		$('p[num='+num+']').show();
	});
	
	$('.next').click(function(){
		
		var img = $(this).parent().next('.big_foto');
		var button = img.next('.big_foto');

		if (img.length != 0){
		$('.big_foto').hide();
		$(this).parent().next('.big_foto').fadeIn('fast');
		var numb = $(this).parent().next('.big_foto').attr('number');
		$('.min_foto').removeClass('active');
		$('a[num='+numb+']').parent().addClass('active');
		$('.info_text').hide();
		$('p[num='+numb+']').show();
		var elem = $(this).parent().index('.big_foto');
		var number = elem + 2;
		
		$('.number').html(number);
		if (elem < 3){ele = 0;}else{ele = elem - 3;};

			smes = ele * 144;
		$('.foto_slide').animate({
		    left: '-'+smes+'px',
		  }, "slow", function() {
			  $('.next').css("display","block");
			  $('.pre').css("display","block");
			  
				if (button.length == 0){$('.next').css("display","none");  $('.pre').css("display","block");
				}else{
					$('.next').css("display","block");  $('.pre').css("display","block");};
		 
	});

		//
		 };
	});
	$('.pre').click(function(){
		var img = $(this).parent().prev('.big_foto');
		var button = img.prev('.big_foto');

		if (img.length != 0){
		$('.big_foto').hide();

		$(this).parent().prev('.big_foto').fadeIn('fast');
		var numb = $(this).parent().prev('.big_foto').attr('number');
		$('.min_foto').removeClass('active');
		$('a[num='+numb+']').parent().addClass('active');
		$('.info_text').hide();
		$('p[num='+numb+']').show();
		
		var elem = $(this).parent().index('.big_foto');
		var number = elem;
		
		$('.number').html(number);
		if (elem < 5){ele = 0;}else{ele = elem - 5;};
		

			smes = ele * 144;
		$('.foto_slide').animate({
		    left: '-'+smes+'px',
		  }, "slow", function() {
			  $('.next').css("display","block");
			  $('.pre').css("display","block");
			  if (button.length == 0){$('.pre').css("display","none");$('.next').css("display","block");
			  }else{
				  $('.next').css("display","block"); $('.pre').css("display","block");};
	});

		};
	});
	
});
