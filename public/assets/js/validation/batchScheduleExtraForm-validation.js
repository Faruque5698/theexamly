
  /* batchScheduleExtraForm validation */
  $(function () {
    // validate the comment form when it is submitted
	$.validator.addMethod("check_time", function(value, element) {
        var prevElement = $(element).parent().parent().prev().children(":first").children().eq(1); 
        if(prevElement){
          return value >= prevElement.val();
        }
        
    }, 'End Time cannot be earlier than Start Time.');

    $("#batchScheduleExtraForm").validate({
      rules: {
        date: {
          required: true
        },
        start_time: {
          required: true,
        },
        end_time: {
          required: true,
          check_time : true,
        },
      },
      messages: {
        
        date: {
          required: "Please select a Date."
        },
        start_time: {
            required: "Please select a Start Time."
          },
        end_time: {
          required: "Please select a End Time.",
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

/* batchScheduleExtraForm validation */