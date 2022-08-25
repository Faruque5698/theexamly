$(document).ready(function () {
  "use strict";

  // navbar scroll ScrollPosStyler
  ScrollPosStyler.init({
    scrollOffsetY: 135,
  });

  // navbar-collapse click link when screen below md
  if ($(window).width() < 992) {
    $(window).on("click", function () {
      if (!$(this).hasClass("dropdown-toggle")) {
        $(".navbar-collapse").collapse("hide");
      }
    });
  }

  // submenu dropdown open

  $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
    e.preventDefault();
    if (!$(this).next().hasClass("show")) {
      $(this)
        .parents(".dropdown-menu")
        .first()
        .find(".show")
        .removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass("show");

    $(this)
      .parents("li.nav-item.dropdown.show")
      .on("hidden.bs.dropdown", function (e) {
        $(".dropdown-submenu .show").removeClass("show");
      });

    return false;
  });

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
  $("#backToTopBtn").anchorScroll({
    scrollSpeed: 0,
    offsetTop: 0,
  });

  // footer date
  $("#year").text(new Date().getFullYear());

  // end js
});
