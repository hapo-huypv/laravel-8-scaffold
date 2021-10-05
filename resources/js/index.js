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

$('.navbar-toggler').click(function() { 
  if ($('#navbarResponsiveClose').hasClass('navbar-toggler-icon')){
    $('.navbar-toggler-icon').removeClass('navbar-toggler-icon').addClass('navbar-close');
    $('.header').addClass('header-mobile');
   } else {
    $('.navbar-close').removeClass('navbar-close').addClass('navbar-toggler-icon');
    $('.header').removeClass('header-mobile');
  }
});

$('#alertSuccess').click(function(){
  $("#alertSuccess").addClass('d-none');
});

$('#alertError').click(function(){
  $("#alertError").addClass('d-none');
});

if($('#pillsLogin input').hasClass('is-invalid')){
  $('#modalLoginRegister').modal('show');
  $('#pillsLoginTab').tab('show');
};

if($('#pillsRegister input').hasClass('is-invalid')){
  $('#modalLoginRegister').modal('show');
  $('#pillsRegisterTab').tab('show');
};

$('#btnFilter').click(function() {
  if($('.course-lookup').hasClass('d-none')){
    $('.course-lookup').removeClass('d-none').addClass('d-flex');
  } else {
    $('.course-lookup').addClass('d-none').removeClass('d-flex');
  }
});

$('.newest').click(function() {
  $('.newest').removeClass('course-lookup-btn-status').addClass('course-lookup-btn-status-active');
  $('.oldest').addClass('course-lookup-btn-status');
});

$('.oldest').click(function() {
  $('.oldest').removeClass('course-lookup-btn-status').addClass('course-lookup-btn-status-active');
  $('.newest').addClass('course-lookup-btn-status');
});

$('.add-select2').select2({
});

$('#pills-lessons-tab').click(function() {
  $(this).addClass('active');
  $('#pills-teacher-tab').removeClass('active');
  $('#pills-reviews-tab').removeClass('active');
  $('#pills-lessons').tab('show');
  $('#pills-teacher').removeClass('show active');
  $('#pills-reviews').removeClass('show active');
});

$('#pills-teacher-tab').click(function() {
  $(this).addClass('active');
  $('#pills-lessons-tab').removeClass('active');
  $('#pills-reviews-tab').removeClass('active');
  $('#pills-teacher').tab('show');
  $('#pills-lessons').removeClass('show active');
  $('#pills-reviews').removeClass('show active');
});

$('#pills-reviews-tab').click(function() {
  $(this).addClass('active');
  $('#pills-teacher-tab').removeClass('active');
  $('#pills-lessons-tab').removeClass('active');
  $('#pills-reviews').tab('show');
  $('#pills-teacher').removeClass('show active');
  $('#pills-lessons').removeClass('show active');
});
