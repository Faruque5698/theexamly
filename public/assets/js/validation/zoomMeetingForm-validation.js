  /* zoomMeetingForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#zoomMeetingForm").validate({
      rules: {
        topic: {
          required: true
        },
		    start_date: {
          required: true
        },
		    start_time: {
		      required: true
        },
        agenda: {
		      required: true
        },
      },
      messages: {
        
        topic: {
          required: "Please enter topic name."
        },
		    start_date: {
		      required:  "Please select a date."
		    },
        start_time: {
          required:  "Please select a time."
        },
        agenda: {
          required:  "Please write some agenda."
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

/* zoomMeetingForm validation */