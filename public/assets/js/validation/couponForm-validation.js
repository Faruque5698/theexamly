
  /* couponForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#couponForm").validate({
      rules: {
        coupon_code: {
          required: true,
          minlength: 10
        },
      },
      messages: {

        coupon_code: {
          required: "Please enter coupon code first.",
          minlength: "Coupon Code must be 10 up."
        },
      },
      errorPlacement: function (label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    
  });

/* couponForm validation */