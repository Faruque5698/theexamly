/* courseForm validation */
$(function () {
    // validate the comment form when it is submitted
    $("#aboutUsForm").validate({
      ignore: '',
      rules: {
        description: {
          required: true
        },
        image: {
          required: true
        },
        video:{
           accept: "video/*",
        }
      },
      messages: {

        description: {
          required: "Please Enter Abou us descriptionion"
        },
        image:{
          required: "Please select one image for about us."
        },
        video: {
          accept: "Only video allowed."
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

/* aboutUsForm validation */
