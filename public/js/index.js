 $(document).ready(function () {   
var text = $(".input").val();
   $(".main_down").hover(
   	    function () {
   	    	var block = $(this);
			var	main = block.find('.list_main');
            //показать подменю
            main.animate({
     		  marginTop: '0%',
     		  }, 200 );

        },
        function () {
        	var block = $(this);
			var	main = block.find('.list_main');
            //скрыть подменю
            main.animate({
     		 marginTop: '-100%',
     		 }, 200 );
        }
    );  
    $(".language").hover(
   	    function () {
   	    	 $(".lang_dop").css('display','block');

        },
        function () {
        	
            $(".lang_dop").css('display','none');
        }
    );  
    $(".input").focus(function(){
    	$(this).val('');
    }).blur(function(){
    	if($(this).val() == ''){
    	$(this).val(text);
    }
    })
});