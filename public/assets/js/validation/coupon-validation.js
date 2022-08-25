/* batchForm validation */
$(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("check_date", function(value, element) {
        var start_date = $("input[name='start_date']").val();
        var end_date = $("input[name='end_date']").val();
        return end_date > start_date;
    }, 'End date must be greater than Start date.');

    $.validator.addMethod("check_time", function(value, element) {
        var start_time = $("input[name='start_time']").val();
        var end_time = $("input[name='end_time']").val();
        return end_time > start_time;
    }, 'End time must be greater than Start time.');


    $("#couponForm").validate({
      rules: {
        coupon_number: {
          required: true,
          min: 1
        },  
        prefix: {
          required: true
        },
        ammount: {
          required: true,
          number:true
        },
		    start_date: {
			    required: true,
		    },
		    end_date: {
			    required: true,
			    check_date : true,
		    }
      },
      messages: {
        coupon_number: {
          required: "Please Enter Number of Coupon.",
          min: "Number of Coupons cannot be less than 1."
        },
		prefix: {
            required: "Please Enter Prefix field.",
        },
		ammount: {
            required: "Please Enter Ammount field.",
        },
        start_date: {
            required: "Please Select an appropriate Start Date."
          },
        end_date: {
            required: "Please Select an appropriate End Date.",
            greaterThan: "Batch End Date cannot be before Start Date"
          }
        
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

/* batchForm validation */
