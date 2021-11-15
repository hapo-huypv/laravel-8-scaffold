$('.feedback-slide').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  prevArrow: '<button class="slide-arrow prev-arrow"><i class="fas fa-angle-left"></i></button>',
  nextArrow: '<button class="slide-arrow next-arrow"><i class="fas fa-angle-right"></i></button>',
  responsive: [{
      breakpoint: 1024,
      settings: 
      {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
      {
        breakpoint: 600,
        settings: 
        {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
});

$('.footer-iconandlink').on('mouseover', function() {
  $('#imgContact', this).removeClass('txt-hidden').addClass('readmore');
});

$('.footer-iconandlink').on('mouseout', function() {
  $('#imgContact', this).removeClass('readmore').addClass('txt-hidden');
});

$('.close-button').on('click', function() {
  $('#messenger', this).removeClass('chatbox');
});

$('.close-button').on('click', function() {
  $('#messenger').slideUp();
});

$('.logo-messenger').on('click', function() {
  $('#messenger').slideDown();
});

$('.header-nav').on('click', function() {
  $('.header-nav').removeClass('nav-link-active');
  $(this).addClass('nav-link-active');
});

$('.navbar-toggler').on('click', function() {
  if ($('#navbarResponsiveClose').hasClass('navbar-toggler-icon')) {
      $('.navbar-toggler-icon').removeClass('navbar-toggler-icon').addClass('navbar-close');
      $('.header').addClass('header-mobile');
  } else {
      $('.navbar-close').removeClass('navbar-close').addClass('navbar-toggler-icon');
      $('.header').removeClass('header-mobile');
  }
});

$(".alert").on('click', function() {
  $(".alert").removeClass('d-flex').addClass('d-none');
});

setTimeout(function() {
  $(".alert").removeClass('d-flex').addClass('d-none');
}, 2000);

if ($('#pillsLogin input').hasClass('is-invalid')) {
  $('#modalLoginRegister').modal('show');
  $('#pillsLoginTab').tab('show');
};

if ($('#pillsRegister input').hasClass('is-invalid')) {
  $('#modalLoginRegister').modal('show');
  $('#pillsRegisterTab').tab('show');
};

$('#btnFilter').on('click', function() {
  if ($('.course-lookup').hasClass('d-none')) {
      $('.course-lookup').removeClass('d-none').addClass('d-flex');
  } else {
      $('.course-lookup').addClass('d-none').removeClass('d-flex');
  }
});

$('.newest').on('click', function() {
  $('.newest').removeClass('course-lookup-btn-status').addClass('course-lookup-btn-status-active');
  $('.oldest').addClass('course-lookup-btn-status');
});

$('.oldest').on('click', function() {
  $('.oldest').removeClass('course-lookup-btn-status').addClass('course-lookup-btn-status-active');
  $('.newest').addClass('course-lookup-btn-status');
});

$('.add-select2').select2({});

$('.nav-item button').on('click', function(e) {
  e.preventDefault();
  $(this).tab('show');
});

$('.nav-item button').on('shown.bs.tab', function(event) {
  var activeTab = $(event.target).attr('data-bs-target'); // active tab
  var previousTab = $(event.relatedTarget).attr('data-bs-target'); // previous tab
  $(activeTab).tab('show');
  $(previousTab).removeClass('show active');
});

$('#imgCamera').on('click', function(event) {
  if ($('#formUploadImg').hasClass('d-none')) {
      $('#formUploadImg').removeClass('d-none');
  } else {
      $('#formUploadImg').addClass('d-none');
  }
});

$("#selectReview").on('change', function() {
  $.get("/course", function (data) {
      alert(data);
  });
});

$('#btnAddReview').on('click', function() {
  $.post("/course/review/1", function(data) {
      $('#showReview').load('home');
  });
})

$('#paginationReview').on('click', function() {
  $('#pills-reviews').addClass('show active');
});

if ($('.pop-up').hasClass('pop-up')) {
  $('#modalLoginRegister').modal('show');
  $('#pillsLoginTab').tab('show');
}
