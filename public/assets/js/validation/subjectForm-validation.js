/* subjectForm validation */
$(function () {
    // validate the comment form when it is submitted

    $("#subjectForm").validate({
      rules: {
        name: {
          required: true,
          minlength:3
        }, 
      },
      messages: {

        name: {
          required: "Please Enter Subject Name.",
          minlength: "Your Subject Name must consist of at least 3 characters."
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

/* subjectForm validation */
