"use strict";
$(document).ready(function () {
  // back to top
  $(window).on("scroll", function () {
    let currentScrolling = $(this).scrollTop();
    let bc2top = $(".backToTop");

    if (currentScrolling > 150) {
      bc2top.fadeIn();
    } else {
      bc2top.fadeOut(1000);
    }
  });

  // scroll home
  $(".anchorScrollHome").anchorScroll({
    scrollSpeed: 800,
    offsetTop: 0,
  });

  // scroll about
  $(".anchorScrollAbout").anchorScroll({
    scrollSpeed: 800,
    offsetTop: 0,
  });
  // scroll back to top
  $(".anchorScrollBackToTop").anchorScroll({
    scrollSpeed: 800,
    offsetTop: 0,
  });

  // banner slider
  $("#banner-slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    fade: true,
    cssEase: "linear",
    prevArrow:
      '<span class="slick_prev"><i class="fas fa-arrow-left"></i></span>',
    nextArrow:
      '<span class="slick_next"><i class="fas fa-arrow-right"></i></span>',
  });

  //   end
});
