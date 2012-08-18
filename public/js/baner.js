$(document).ready(function () {
i = 1;
  function baner() {
i = i+1;
var kol = 3;
if(i <= kol){
    //$('.promo_img').children('.active').;
    $('.promo_img').children('.active').removeClass('active').next().addClass('active');
    var foto = $('.active').attr('id_baner_min');
      $('.baner_big').hide();
    $('span[id_baner_big='+foto+']').fadeIn(1500);

}else{ 
  i = 1;
  $('.active').removeClass('active')
  $('.promo_img').children().first().addClass('active');
    var foto = $('.active').attr('id_baner_min');
      $('.baner_big').hide();
    $('span[id_baner_big='+foto+']').fadeIn(1500);

}

  }

$('.baner_min').click(function(){
  $('.baner_min').removeClass('active');
  $(this).addClass('active');
   var big_ban_id = $(this).attr('id_baner_min');
   i = big_ban_id;
    $('.baner_big').hide();
    $('span[id_baner_big='+big_ban_id+']').fadeIn(1500);
})
  setInterval(baner, 5000) // использовать функцию

});

 