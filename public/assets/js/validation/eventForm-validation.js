/* eventForm validation */
$(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("check_date", function(value, element) {
        var start_date = $("input[name='start_date']").val();
        var end_date = $("input[name='end_date']").val();
        return end_date >= start_date;
    }, 'Event End date must be greater than Event Start date.');

    $("#eventForm").validate({
      rules: {
        title: {
          required: true,
        },
        start_date: {
            required: true,
          },
          end_date: {
            required: true,
            check_date : true,
          },
          image: {
            extension: "jpg|png|jpeg"
          },
          location: {
            maxlength: 255,
          },
      },
      messages: {

        title: {
          required: "Please Enter Event Title."
        },
        start_date: {
            required: "Please Select an appropriate Event Start Date."
          },
        end_date: {
            required: "Please Select an appropriate Event End Date.",
            greaterThan: "Event End Date cannot be before Start Date"
          },
          image: {
            extension: "Event attachment Image has to be either jpeg, jpg or png file.",
        },
        location: {
          maxlength: "Event Location name cannot be longer than 255 characters.",
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

/* eventForm validation */
