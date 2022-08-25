(function ($) {
    showSuccessToast = function (message) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Success',
            text: message,
			showDuration: "500000",
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#f96868',
            hideAfter: "10000",
            position: 'top-right'
        })
    };
    showInfoToast = function () {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Info',
            text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
            showHideTransition: 'slide',
            icon: 'info',
            loaderBg: '#46c35f',
            position: 'top-right',
            hideAfter: "7000",
			showDuration: "10000"
        })
    };
    showWarningToast = function (message) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Warning',
            text: message,
            showHideTransition: 'slide',
            icon: 'warning',
            loaderBg: '#57c7d4',
            position: 'top-right',
            hideAfter: "7000",
			showDuration: "10000"
        })
    };
    showDangerToast = function (message) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Danger',
            text: message,
            showHideTransition: 'slide',
            icon: 'danger',
            loaderBg: '#ff1a1a',
            position: 'top-right',
            hideAfter: "7000",
			showDuration: "10000"
        })
    };
    showToastPosition = function (position) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Positioning',
            text: 'Specify the custom position object or use one of the predefined ones',
            position: String(position),
            icon: 'info',
            stack: false,
            loaderBg: '#f96868',
            hideAfter: "7000",
			showDuration: "10000"
        })
    }
    showToastInCustomPosition = function () {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Custom positioning',
            text: 'Specify the custom position object or use one of the predefined ones',
            icon: 'info',
            position: {
                left: 120,
                top: 120
            },
            stack: false,
            loaderBg: '#f96868',
            hideAfter: "7000",
			showDuration: "10000"
        })
    }
    resetToastPosition = function () {
        $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
        $(".jq-toast-wrap").css({
            "top": "",
            "left": "",
            "bottom": "",
            "right": "",
            hideAfter: "7000",
			showDuration: "10000"
        }); //to remove previous position style
    }
})(jQuery);
