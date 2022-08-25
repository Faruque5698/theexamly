  /* phoneBookGroupForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#phoneBookGroupForm").validate({
      rules: {
        group_name: {
          required: true
        },
      },
      messages: {
        
        group_name: {
          required: "Please enter group name."
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

/* phoneBookGroupForm validation */