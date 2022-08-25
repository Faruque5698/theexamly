$(document).ready(function () {
  "use strict";

  // navbar scroll ScrollPosStyler
  ScrollPosStyler.init({
    scrollOffsetY: 135,
  });

  // navbar-collapse click link when screen below md
  if ($(window).width() < 992) {
    $(window).on("click", function (e) {
      e.preventDefault();
      if (!$(this).hasClass("dropdown-toggle")) {
        $(".navbar-collapse").collapse("hide");
      }
    });
  }

  // dropdown open on hover when up md
  if ($(window).width() > 991) {
    $("ul.navbar-nav li.dropdown").hover(
      function () {
        $(this).find(".dropdown-menu").stop(true, true).delay(0).fadeIn(500);
      },
      function () {
        $(this).find(".dropdown-menu").stop(true, true).delay(0).fadeOut(500);
      }
    );
  }

  // back to top fade
  $(window).on("scroll", function () {
    const currentScrolling = $(this).scrollTop();
    const bc2top = $(".back_to_top_btn");

    if (currentScrolling > 300) {
      bc2top.fadeIn();
    } else {
      bc2top.fadeOut(1000);
    }
  });
  // back to top scroll
  // $("#backToTopBtn").anchorScroll({
  //   scrollSpeed: 0,
  //   offsetTop: 0,
  // });

  // footer date
  $("#year").text(new Date().getFullYear());

  // end js
});
