
  /* batchScheduleDayForm validation */
  $(function () {
    // validate the comment form when it is submitted
    $("#batchScheduleDayForm").validate({
      rules: {
        class_date: {
          required: true
        },
        topic: {
          required: true
        },
        room: {
          required: true
        },
        teacher: {
          required: true
        },
        day: {
          required: true
        },
      },
      messages: {
        
        class_date: {
          required: "Please enter Class Date."
        },
        topic: {
          required: "Please enter a Topic."
        },
        room: {
          required: "Please enter a Room."
        },
        teacher: {
          required: "Please select a Teacher."
        },
        day: {
          required: "Please select a week day."
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

/* batchScheduleDayForm validation */