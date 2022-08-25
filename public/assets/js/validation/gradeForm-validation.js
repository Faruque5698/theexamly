/* gradeForm validation */
$(function () {
    // validate the comment form when it is submitted



    $("#gradeForm").validate({
      rules: {
        grade_name: {
            required: true,
        },
        grade_point: {
            required: true,
            number:true,
        },
        number_from: {
            required: true,
            number:true,
        },
        number_to: {
            required: true,
            number:true,
        },
      },
      messages: {

        grade_name: {
            required: "Please Enter an appropriate Grade Name.",
        },
        grade_point: {
            required:"Please enter an appropriate Grade Point Value",
            number: "Grade Point Value amount has to be a valid number"
        },
        number_from: {
            required:"Please enter an appropriate Number From Value",
            number: "Number from Value amount has to be a valid number"
        },
        number_to: {
            required:"Please enter an appropriate Number To Value",
            number: "Number to Value amount has to be a valid number"
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

/* gradeForm validation */
