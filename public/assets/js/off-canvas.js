(function($) {
  'use strict';
  $(function() {
    $('[data-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });
})(jQuery);

(function($) {
  'use strict';
  var body = $('body');
  $(function() {
    $('[data-toggle="minimize"]').on("click", function () {
      body.toggleClass('sidebar-icon-only');
    });
  });
})(jQuery);