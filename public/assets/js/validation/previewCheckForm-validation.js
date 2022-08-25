
  /* batchScheduleForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#previewCheckForm").validate({
      rules: {
        batch_name: {
          required: true
        },
        attendance_date: {
          required: true
        },
        days: {
          required: true
        },
        start_time: {
          required: true
        },
        end_time: {
          required: true
        },
        room_no: {
          required: true
        },
      },
      messages: {
        
        batch_name: {
          required: "Please select a Batch Name."
        },
        attendance_date: {
          required: "Please select an appropriate date to check attendance."
        },
        days: {
          required: "Please select a Day Name."
        },
        start_time: {
          required: "Please select Start Time."
        },
        end_time: {
          required: "Please select End Time."
        },
        room_no: {
          required: "Please enter Room No."
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

/* batchScheduleForm validation */