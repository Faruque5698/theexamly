  /* commentsForm validation */
  $(function () { 
    
    $("#commentsForm").validate({
      ignore: "",
      invalidHandler: function(e, validator){
        if(validator.errorList.length)
          $('#nav a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
      },
      rules: {
        subject: {
          required: true,
        },
        comments: {
          required: true,        
        } 
      },
      messages: {
        
        subject: {
          required: "Please enter title first.",
        },
        comments: {
          required:  "Please enter your comment."
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

/* commentsForm validation */