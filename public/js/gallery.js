$(document).ready(function () { 
	smes = 0;
	kol_ele = $('.foto_slide').find("img").size();
	max_slide = 145 * (kol_ele - 5);
	nach = 0;
	end = max_slide;
	$('.arrow_right').click(function(){
		if(smes < max_slide){
			smes = smes + 145;
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
	$('.arrow_left').click(function(){
		
		if(smes > 0){
			smes = smes - 145;
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
	
});
