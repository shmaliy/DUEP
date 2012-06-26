$(document).ready(function(){
alert('hello');
	$(".main_down").mouseover(function(){
		
		var main = $(this).find('.list_main');
		var on = 1;

		anime(main, on);
	}).mouseout(function(){
     var main = $(this).find('.list_main');
     var off = 0;
		anime(main, off);
    });
	
	function anime(main,param){
		if (param == 1){
		main.animate({
        margin-top: -100%
      }, 500 );
	}else{
			main.animate({
        margin-top: 0%
      }, 500 );
	};
	}

});