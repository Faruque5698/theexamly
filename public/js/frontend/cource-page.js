"use strict";
$(document).ready(function () {
  //   filter
  // active filiter
  $("#cource-filter-button li").on("click", function () {
    $(this).addClass("active").siblings().removeClass("active");
  });

  // project filter
  $(".cource-page-filtr-container").filterizr({
    animationDuration: 0.5,
    easing: "ease-out",
    filter: "physics",
  });

  //   end
});
