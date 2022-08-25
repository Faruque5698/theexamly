  /* loginForm validation */
  $(function () {
    // validate the comment form when it is submitted
    jQuery.validator.addMethod("phonenu", function (value, element) {

      if (/^(?:\+?88|0088)?0[1-9]\d{9}$/g.test(value)) {
      return true;
      } else {
        return false;
      };
    }, "Invalid phone number");
    
    $("#loginForm").validate({
      ignore: "",
      invalidHandler: function(e, validator){
        if(validator.errorList.length)
          $('#nav a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
      },
      rules: {
        email: {
          required:true,
          email: true,
        },
        password:{
          required:true,
        }  
      },
      messages: {
        
        email: {
          required: "Please enter a valid email address.",
          email: "Please enter a valid email address.",
        },
        password: {
          required:  "Please enter your Password.",
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

/* loginForm validation */