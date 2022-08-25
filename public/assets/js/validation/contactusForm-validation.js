/* contactus validation */
$(function () {
    // validate the comment form when it is submitted
    $("#contactusForm").validate({
      rules: {
        name: {
          required: true,
        },
        email: {
            required: true,
            email: true,
          },
          phone: {
            number: true
          },
          subject: {
            required: true,
          },
          message: {
            required: true,
        },
      },
      messages: {

        name: {
          required: "Please enter your name to contact us.",
        },
        email: {
            required: "Please enter a valid email so we can contact you back.",
            email: "Please enter a valid email"
          },
        phone: {
            number: "Phone number can only contain digits."
          },
          subject: {
            required: "Please enter an appropriate subject for your message.",
          },
          message: {
            required: "Please state your message.",
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

/* contactus validation */
