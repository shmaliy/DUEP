$(document).ready(function () {

  function baner() {

    //$('.promo_img').children('.active').;
    $('.promo_img').children('.active').removeClass('active').next().addClass('active');
 // $('.baner_big');

  }

  setInterval(baner, 5000) // использовать функцию

});

 