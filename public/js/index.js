  $(document).ready(function () {   
var text = $(".input").val();
   $(".main_down").hover(
   	    function () {
   	    	var block = $(this);
			var	main = block.find('.list_main');
            //показать подменю
            main.animate({
     		  marginTop: '0%',
     		  opacity: '1',
     		  }, 200 );

        },
        function () {
        	var block = $(this);
			var	main = block.find('.list_main');
            //скрыть подменю
            main.animate({
     		 marginTop: '-100%',
     		 opacity: '0',
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
  function load(){
  	var url = window.location.href;
  	var index = window.location.protocol+'//'+window.location.hostname+'/';
  	if (url == index){
  	 $('.load').fadeIn(3000);  
  	}
  }