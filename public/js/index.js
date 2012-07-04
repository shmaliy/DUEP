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
   	    	 $(".lang_dop").fadeIn(200); 

        },
        function () {
        	
            $(".lang_dop").fadeOut(200); 
        }
    );  
    $(".input").focus(function(){
    	$(this).val('');
    }).blur(function(){
    	if($(this).val() == ''){
    	$(this).val(text);
    }
    })
    $(".pl_all_box").hover(
   	    function () {
   	    	$(this).find('.pop_up').fadeIn(200); 

        },
        function () {
        	
          $(this).find('.pop_up').fadeOut(200); 
        }
    );  
    $(".cat_anons").live("click",function(){
    	var ans_id = $(this).attr('ans_id');
    	$.ajax({
    		   type: "POST",
    		   url: "/default/index/front-announcements",
    		   data: {"ans_id": ans_id},
    		   success: function(content){
    			   var html = '';
    			   for ( var i = 0; i < content.contents.length; i++) {
    			  html += '<div class="pl_item_box">';
    				  html += '<div class="pl_item_title">'+content.contents[i].date_created+'</div>';
    				  html += '<div>'+content.contents[i].tizer+'</div>';
    				  html += '</div>';
    			   }
    			   $('.ans_block').html(html);
    			  
    		   }
    		 });
    });
    $(".cat_news").live("click",function(){
    	var news_id = $(this).attr('news_id');
    	$.ajax({
    		   type: "POST",
    		   url: "/default/index/front-news",
    		   data: {"news_id": news_id},
    		   success: function(content){
    			   var html = '';
    			   for ( var i = 0; i < content.contents.length; i++) {
    			  html += '<div class="pl_item_box">';
    				  html += '<div class="pl_item_title">'+content.contents[i].date_created+'</div>';
    				  html += '<div>'+content.contents[i].tizer+'</div>';
    				  html += '</div>';
    			   }
    			   $('.news_block').html(html);
    			  
    		   }
    		 });
    });
});
  function load(){
  	var url = window.location.href;
  	var index = window.location.protocol+'//'+window.location.hostname+'/';
  	if (url == index){
  	 $('.load').fadeIn(3000);  
  	}else{$('.load').show();}
  }
 