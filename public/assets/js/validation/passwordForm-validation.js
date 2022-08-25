  /* passwordForm validation */
  $(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("validpassword", function(value, element) {
        return this.optional(element) ||
            /^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W_]).*$/.test(value);
    }, "The password must contain a minimum of one lower case character," +
               " one upper case character, one digit and one special character..");

    $("#passwordForm").validate({
      rules: {
        oldpassword: {
          required: true,
          minlength: 8
        },
    password: {
          required: true,
          minlength: 8,
          validpassword:true  
        },
    password_confirmation: {
        required: true,
        equalTo : "#password"
        },
      },  
      messages: {
        
    oldpassword: {
          required: "Please enter old password.",
          minlength: "Your old password must be at least 8 characters long."
        },
    password: {
      required:  "Please enter new password.",
      minlength: "Your new password must be at least 8 characters long.",
      validpassword: "Passwords must contain at least 8 characters, including uppercase, lowercase letters, numbers and a special character."
    },
    password_confirmation: {
      required:  "Please enter confirm password.",
      equalTo : "Confirm password are not match"
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

/* passwordForm validation */