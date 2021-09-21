﻿$('.feedback-slide').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  prevArrow: '<button class="slide-arrow prev-arrow"><i class="fas fa-angle-left"></i></button>',
  nextArrow: '<button class="slide-arrow next-arrow"><i class="fas fa-angle-right"></i></button>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.footer-iconandlink').mouseover(function() {
  $('#imgContact', this).removeClass('txt-hidden').addClass( 'readmore');
});

$('.footer-iconandlink').mouseout(function() {
  $( '#imgContact', this ).removeClass('readmore').addClass('txt-hidden');    
});

$('.close-button').click(function() {
  $('#messenger', this).removeClass('chatbox');
});

$('.close-button').click(function() {
  $('#messenger').slideUp();
});

$('.logo-messenger').click(function() {
  $('#messenger').slideDown();
});

$('.header-nav').click(function() {
  $ ('.header-nav').removeClass('nav-link-active');
  $(this).addClass('nav-link-active');
});

var statusHeader = 0;
$('.navbar-toggler').click(function() { 
  if (statusHeader == 0) {
    $('.navbar-toggler-icon').removeClass('navbar-toggler-icon').addClass('navbar-close');
    statusHeader = 1;
    $('.header').addClass('header-mobile');
  } 
  else {
    $('.navbar-close').removeClass('navbar-close').addClass('navbar-toggler-icon');
    statusHeader = 0;
    $('.header').removeClass('header-mobile');
  }
});

$('#alertHome').click(function(){
  $("#alertHome").addClass('d-none');
});

if($('#pillsLogin input').hasClass('is-invalid')){
    $('#loginRegisterModal').modal('show');
    $('#pillsLoginTab').tab('show');
};

if($('#pillsRegister input').hasClass('is-invalid')){
  $('#loginRegisterModal').modal('show');
  $('#pillsRegisterTab').tab('show');
};

