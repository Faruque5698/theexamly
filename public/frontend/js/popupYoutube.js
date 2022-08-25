$(document).ready(function () {
  "use strict";

  //popup Youtube video
  $(".popupYoutubeVideo").magnificPopup({
    type: "iframe",
    iframe: {
      markup:
        '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        "</div>",
      patterns: {
        youtube: {
          index: "youtube.com/",
          id: "v=",
          src: "https://www.youtube.com/embed/%id%?autoplay=1&mute=1",
        },
      },
      srcAction: "iframe_src",
    },
  });

  // end js
});
