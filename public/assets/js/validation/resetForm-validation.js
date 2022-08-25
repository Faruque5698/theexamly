  /* resetForm validation */
  $(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("validpassword", function(value, element) {
        return this.optional(element) ||
            /^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W_]).*$/.test(value);
    }, "The password must contain a minimum of one lower case character," +
               " one upper case character, one digit and one special character..");

    $("#resetForm").validate({
      ignore: "",
      invalidHandler: function(e, validator){
        if(validator.errorList.length)
          $('#nav a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
      },
      rules: {
        email: {
          email:true,
          required:true,
        },
        password:{
          required:true,
          validpassword:true
        }, 
        password_confirmation:{
          required:true,
          validpassword:true
        }   
      },
      messages: {
        
        email: {
          email: "Please enter a valid email.",
          required:  "Please enter your email address.",
        },
        password: {
          required:  "Please give a new password.",
          validpassword: "Passwords must contain at least 8 characters, including uppercase, lowercase letters, numbers and a special character."
        },
        password_confirmation: {
          required:  "Please give a confirm password.",
          validpassword: "Confirm password must be same as password"
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

/* resetForm validation */