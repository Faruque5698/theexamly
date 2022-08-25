
  /* reAdmissionForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#reAdmissionForm").validate({
      rules: {
        course_name: {
          required: true,
        },
        // batch_name: {
        //   required: true,
        // },
      },
      messages: {

        
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

/* reAdmissionForm validation */