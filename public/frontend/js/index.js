$(document).ready(function () {
    "use strict";

    //scrollspy
    // $("body").scrollspy({
    //   target: "#navbarSupportedContent",
    //   offset: 100,
    // });

    // //  scroll position
    // $("#scrollToHome").anchorScroll({
    //   scrollSpeed: 0,
    //   offsetTop: 0,
    // });

    // $("#scrollToBooks").anchorScroll({
    //   scrollSpeed: 0,
    //   offsetTop: 48,
    // });

    // $("#scrollToTesimonials").anchorScroll({
    //   scrollSpeed: 0,
    //   offsetTop: 51,
    // });

    // $("#scrollToBlog").anchorScroll({
    //   scrollSpeed: 0,
    //   offsetTop: 20,
    // });

    // testimonial slider
    // $(".tesimonials_slider").slick({
    //     dots: true,
    //     infinite: false,
    //     speed: 300,
    //     slidesToShow: 2,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     responsive: [
    //         {
    //             breakpoint: 992,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: true,
    //                 arrows: false,
    //             },
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2,
    //                 dots: true,
    //                 arrows: false,
    //             },
    //         },
    //         {
    //             breakpoint: 575,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 dots: true,
    //                 arrows: false,
    //             },
    //         },
    //         // You can unslick at a given breakpoint now by adding:
    //         // settings: "unslick"
    //         // instead of a settings object
    //     ],
    // });

    // notice background color change
    setInterval(function () {
        $(".temporary_notice").toggleClass("opacity_none");
    }, 1000);

    // end js
    // advertisement start
  $(".preview_slide_slider").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 991.98,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
          arrows: false,
        },
      },
      {
        breakpoint: 767.98,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        },
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });

  // notice background color change
  setInterval(function () {
    $(".temporary_notice").toggleClass("opacity_none");
  }, 1000);

  // $(".galleryItem").magnificPopup({ type: "image" });

  $(".preview_slide_slider").magnificPopup({
    delegate: "a", // child items selector, by clicking on it popup will open
    type: "image",
    // other options
  });

  // $(".preview_slide_slider").each(function () {
  //   // the containers for all your galleries
  //   $(this).magnificPopup({
  //     delegate: "a", // the selector for gallery item
  //     type: "image",
  //     gallery: {
  //       enabled: true,
  //     },
  //   });
  // });

  // end js
});
