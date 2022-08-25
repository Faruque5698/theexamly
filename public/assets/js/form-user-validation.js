(function ($) {
  'use strict';
  // $.validator.setDefaults({
  //   submitHandler: function (form, event) {
  //
  //     // Ajax code for submission
  //     var form = $(form); // jshint ignore:line
  //     event.preventDefault();
  //     $.ajax({
  //       type: form.attr('method'),
  //       data: form.serialize(),
  //       url: form.attr('action'),
  //       success: function (data) {
  //         //success message
  //       },
  //       error: function (data) {
  //         //error message
  //       }
  //     });
  //   }
  // });
  $(function () {

    $.validator.addMethod("phonenu", function (value, element) {
      if (/^(?:\+?88|0088)?0[11-9]\d{9}$/g.test(value)) {
      return true;
      } else {
        return false;
      };
    }, "Invalid phone number");

    $.validator.addMethod("validpassword", function(value, element) {
        return this.optional(element) ||
            /^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W_]).*$/.test(value);
    }, "The password must contain a minimum of one lower case character," +
               " one upper case character, one digit and one special character..");

    // validate signup form on keyup and submit
    $('#signupForm').validate({
        rules: {
          first_name: {
              required: true
          },
          last_name: {
              required: true
          },
          name: {
              required: true,
              minlength: 2
          },
          raw_password: {
              required: true,
              minlength: 8,
              validpassword:true 
          },
          confirmPassword: {
              required: true,
              minlength: 5,
              equalTo: '#password'
          },
          email: {
              required: true,
              email: true
          },
          phone: {
              required: true,
              phonenu:true  
          },
          roleId:{
              required:true,
          }

      },
        messages: {
            first_name: {
                required: 'Please enter your first name'
            },
            last_name: {
                required: 'Please enter your last name'
            },
            name: {
                required: 'Please enter a username',
                minlength: 'Your username must consist of at least 2 characters'
            },
            raw_password: {
                required: 'Please provide a password',
                minlength: 'Your password must be at least 8 characters long',
                validpassword: "Passwords must contain at least 8 characters, including uppercase, lowercase letters, numbers and a special character."
            },
            confirmPassword: {
                required: 'Please provide a confirm password',
                minlength: 'Your password must be at least 5 characters long',
                equalTo: 'Please enter the same password as above'
            },
            phone: {
                required:  "Please enter your mobile number.",
                phonenu: "Please enter a valid Contact Number"
            },
            email: 'Please enter a valid email address',
            roleId: 'Please select A role',
        },
        errorPlacement: function (label, element) {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            },
        highlight: function (element) {
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        }
    });

    // //code to hide topic selection, disable for demo
    // var newsletter = $("#newsletter");
    // // newsletter topics are optional, hide at first
    // var inital = newsletter.is(":checked");
    // var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
    // var topicInputs = topics.find("input").attr("disabled", !inital);
    // // show when newsletter is checked
    // newsletter.on("click", function () {
    //   topics[this.checked ? "removeClass" : "addClass"]("gray");
    //   topicInputs.attr("disabled", !this.checked);
    // });
  });
})(jQuery);
