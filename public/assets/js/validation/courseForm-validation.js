/* courseForm validation */
$(function () {
        $.validator.addMethod("mytst", function (value, element) {

          var flag = true;

        $("[name^=subject_id]").each(function (i, j) {
                        //  $(this).parent('p').find('label.error').remove();
      //$(this).parent('p').find('label.error').remove();
            if ($.trim($(this).val()) == '') {
                flag = false;

            }
          });
                      //$("#choices-multiple-remove-button").css({ "color": "#EEE"});
        return flag;


      }, "");

    // validate the comment form when it is submitted
    $("#courseForm").validate({
      ignore: '',
      rules: {
        full_name: {
          required: true,
          minlength: 3
        },
        course_fee_type: {
          required: true
        },
        "subject_id[]": {
          mytst:true
        },
        course_duration:{
          min:1,
        }
      },
      messages: {

        full_name: {
          required: "Please Enter Course Full Name.",
          minlength: "Your Course Full Name must consist of at least 3 characters."
        },
        course_duration:{
          min: "Course duration cannot be less than 1 month."
        },
        course_fee_type: {
          required: "Please select payment fee type"
        },
        "subject_id[]": {
          mytst: "Please Select Subject.",

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

/* courseForm validation */
