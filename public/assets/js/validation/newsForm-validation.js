
  /* newsForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#newsForm").validate({
      rules: {
        title: {
          required: true,
          // minlength: 3
        },
        description: {
            minlength:100
        },
        "images[]": {
            extension: "jpg|png|jpeg"
          },

      },
      messages: {
        
        title: {
          required: "Please enter a News Title.",
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
        },
        "images[]": {
            extension: "News Attachment has to be either jpeg, jpg or png file."
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

/* newsForm validation */