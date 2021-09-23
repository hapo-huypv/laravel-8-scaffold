$('.feedback-slide').slick({
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

var c = 0;
$('.navbar-toggler').click(function() { 
  if (c == 0) {
    $('.navbar-toggler-icon').removeClass('navbar-toggler-icon').addClass('navbar-close');
    c = 1;
    $('.header').addClass('header-mobile');
  } 
  else {
    $('.navbar-close').removeClass('navbar-close').addClass('navbar-toggler-icon');
    c = 0;
    $('.header').removeClass('header-mobile');
  }
});

$('#alertHome').click(function(){
  $("#alertHome").addClass('d-none');
});

if($('#pills-home input').hasClass('is-invalid')){
  $(window).on ("load", function() {
    $('#loginRegisterModal').modal('show');
    $('#pills-login-tab').tab('show');;
  })
};

if($('#pills-register input').hasClass('is-invalid')){
  $(window).on ("load", function() {
    $('#loginRegisterModal').modal('show');
    $('#pills-register-tab').tab('show');;
  })
};

$('#btnFilter').click(function() {
  if($('.course-lookup').hasClass('d-none')){
    $('.course-lookup').removeClass('d-none').addClass('d-flex');
  } else {
    $('.course-lookup').addClass('d-none').removeClass('d-flex');
  }
});