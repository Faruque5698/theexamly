"use strict";
$(document).ready(function () {
  // window scroll
  let prevScrolling = $(window).scrollTop();
  $(window).on("scroll", function () {
    let currentScrolling = $(this).scrollTop();
    let stickytop = $("#navbar-fixed");

    if (prevScrolling > currentScrolling) {
      stickytop.removeClass("fixed-top");
    } else {
      stickytop.addClass("fixed-top");
    }
    prevScrolling = currentScrolling;
  });

  // collapse Nav Link
  $(".nav_link").on("click", function (e) {
    let className = $(this).hasClass("dropdown-toggle");

    if (!className) {
      $(".navbar-collapse").collapse("hide");
    }
  });
  // footer date
  $("#year").text(new Date().getFullYear());

  //   end
});
