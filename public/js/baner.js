$(document).ready(function () {
var kol = $('.baner_min').size();
i = 1;
  function baner() {
i = i+1;

 
if(i <= kol){
   
    $('.promo_img').children('.active').removeClass('active').next().addClass('active');
    var foto = $('.active').attr('id_baner_min');
      $('.baner_big').hide();
    $('span[id_baner_big='+foto+']').fadeIn(1500);

}else{ 
  i = 1;
  
  $('.promo_img').children('.active').removeClass('active')
  $('.promo_img').children().first().addClass('active');
    var foto = $('.active').attr('id_baner_min');
      $('.baner_big').hide();
    $('span[id_baner_big='+foto+']').fadeIn(1500);

}

  }

$('.baner_min').click(function(){
  clearInterval ( refreshIntervalId );
  $('.baner_min').removeClass('active');
  $(this).addClass('active');
   var big_ban_id = $(this).attr('id_baner_min');
   i = parseInt(big_ban_id,10);
  
    $('.baner_big').hide();
    $('span[id_baner_big='+big_ban_id+']').fadeIn(1500);
    refreshIntervalId =  setInterval(baner, 5000) // использовать функцию

})
var refreshIntervalId =  setInterval(baner, 5000) // использовать функцию

});

 