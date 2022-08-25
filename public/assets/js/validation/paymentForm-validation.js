
  /* paymentForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#paymentForm").validate({
      rules: {
        paymented_amount: {
          required: true,
          min: 1
        },
        coupon_code: {
          required: true,
        },
      },
      messages: {
        
        paymented_amount: {
          required: "Please enter payment amount.",
          min: "Value must be greater than 0"
        },
        coupon_code: {
          required: "Please enter your coupon_code."
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

/* paymentForm validation */