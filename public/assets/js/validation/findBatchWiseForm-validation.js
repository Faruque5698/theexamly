/* findBatchWiseForm validation */
$(function () {
    // validate the comment form when it is submitted

    $("#findBatchWiseForm").validate({
      rules: {
        batch_id: {
          required: true
        }, 
      },
      messages: {

        batch_id: {
          required: "Please select a Batch."
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

/* findBatchWiseForm validation */
