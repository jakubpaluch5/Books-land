// Strzałka na pierwszej stronie
$(".navigator").click(function () {
  $('html').animate({
      scrollTop: $("#secondpage").offset().top
    },
    1000);
});


// Strzałka przypięta 
// Strzałka na pierwszej stronie
$(".navigatorup").click(function () {
  $('html').animate({
    scrollTop: $("#secondpage").offset().top-500
    },
    1000);
});



$(function () {
  function show() {
    if ($(window).scrollTop() > $("#secondpage").offset().top - 700) {
      
      
        $('.firstcard').addClass('animate__animated');
        $('.firstcard').addClass('animate__fadeInLeft');
      

    }
    else {


          }
  }
  setInterval(show, 1000);

});
$(function () {
  function show() {
    if ($(window).scrollTop() > $("#secondpage").offset().top) {
      
      
        $('.secondcard').addClass('animate__animated');
        $('.secondcard').addClass('animate__fadeInLeft');
      

    }
    else {


          }
  }
  setInterval(show, 1000);

});
$(function () {
  function show() {
    if ($(window).scrollTop() > $("#secondpage").offset().top - 400) {

      $('.cards').addClass('animate__animated');
      $('.cards').addClass('animate__fadeInRight');

    } else {


    }
  }
  setInterval(show, 1000);

});


$(function () {
  function pokaz() {
    if ($(window).scrollTop() > $("#secondpage").offset().top - 450) {
      $('.navigators').addClass('show');

    } else {

      $('.navigators').removeClass('show');
    }
  }
  setInterval(pokaz, 300);


});

$(document).ready(function () {
  setInterval(function () {
    $(".buttonik").toggleClass('shk');
  }, 5000);
});
$(document).ready(function () {
  setInterval(function () {
    $(".nag2").toggleClass('fly');
  }, 2000);
});