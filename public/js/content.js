$(document).ready(function () {   
 
    $(".pl_all_box").hover(
   	    function () {
   	    	$(this).find('.pop_up').fadeIn(200); 

        },
        function () {
        	
          $(this).find('.pop_up').fadeOut(200); 
        }
    );  
   
});
