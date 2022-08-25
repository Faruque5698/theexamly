
  /* noticeForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#noticeForm").validate({
      rules: {
        title: {
          required: true,
          // minlength: 3
        },
        description: {
            required: true
        },
        notice_file: {
            // required: true,
            extension: "pdf|jpg|png|jpeg"
          },

      },
      messages: {
        
        title: {
          required: "Please enter Notice Title.",
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
        },
        description: {
          required: "Please enter notice description."
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
        },
        notice_file: {
            // required: "Select either an image or a pdf as notice attachment.",
            extension: "Notice Attachment has to be either pdf, jpeg, jpg or png file."
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

/* noticeForm validation */