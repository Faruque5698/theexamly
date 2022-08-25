
  /* batchScheduleForm validation */
  $(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("check_date", function(value, element) {
      var start_date = $("input[name='start_date']").val();
      var end_date = $("input[name='end_date']").val();
      return end_date > start_date;
    }, 'End date must be greater than Start date.');
    $("#batchScheduleForm").validate({
      rules: {
        batch_name: {
          required: true
        },
        course_name: {
          required: true
        },
        start_date: {
          required: true
        },
        end_date: {
          required: true,
          check_date : true,
        },
      },
      messages: {
        
        batch_name: {
          required: "Please select a Batch."
        },
        course_name: {
          required: "Please select a Course."
        },
        start_date: {
          required: "Please select a Start Date."
        },
        end_date: {
          required: "Please select a End Date.",
          check_date: "End Date cannot be before Start Date"
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

/* batchScheduleForm validation */