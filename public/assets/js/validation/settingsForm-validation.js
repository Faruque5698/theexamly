/* settingsForm validation */
$(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod('dimention', function(value, element, param) {
        if(element.files.length == 0){
            return true;
        }
        if(img.naturalWidth <= param[0] && img.naturalHeight <= param[1]){
            return true;
        }else{
            return false;
        }
    },'Please upload an image with 250 x 250 pixels dimension');

    $.validator.addMethod('size', function(value, element) {
        if(element.files.length == 0){
            return true;
        }
        if(element.files[0].size <= 2097152){
            return true;
        }else{
            return false;
        }
    },'Image size has to be less than 2 MB');


    $("#settingsForm").validate({
      rules: {
        school_name: {
          required: true,
          minlength: 3
        },
        site_title: {
            required: true,
            minlength: 3
          },
          phone: {
            required: true,
            // number: true
          },
          email: {
              required:true,
              email:true
          },
          from_email: {
              email:true
          },
          smtp_port: {
              number: true
          },
          customer_email: {
              email: true
          },
          smtp_password: {
              minlength: 8
          },
          password: {
              minlength:8
          },
          customer_password: {
              minlength:8
          },
          image: {
            extension: "jpg|png|jpeg",
            size: true,
            dimention:[250,250],
        }
      },
      messages: {

        school_name: {
          required: "Please Enter Name.",
          minlength: "Name must consist of at least 3 characters."
        },
        site_title: {
            required: "Please Enter Site title.",
            minlength: "Site title must consist of at least 3 characters."
          },
          phone: {
            required: "Please Enter a phone number.",
            number: "Phone number should only contain numerical digits."
          },
          email: {
              required: "Please Enter an email.",
              email: "Please enter an valid email."
          },
          from_email: {
              email: "Please enter an valid email."
          },
          smtp_port: {
              number:  "SMTP Port should only contain numerical digits."
          },
          customer_email: {
              email: "Please enter an valid email."
          },
          smtp_password: {
              minlength: "SMTP password has to be at least 8 characters long."
          },
          password: {
              minlength: "SMS password has to be at least 8 characters long."
          },
          customer_password: {
            minlength: "Password has to be at least 8 characters long."
          },
          image: {
              extension: "Please select an image with either .jpg .png or .jpeg",
              maxsize: "Image size has to be less than 2 MB"
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

/* settingsForm validation */
