$(document).ready(function () {

    jQuery.validator.addMethod("phonenu", function (value, element) {
            if (/^(?:\+?88|0088)?0[11-9]\d{9}$/g.test(value)) {

            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");

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

  });


  /* staffForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#staffForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
		    email: {
          email: true
        },
		    phone: {
		      required: true,
          phonenu: true
        },
        password: {
          required: true,
          minlength: 8
        },
        image: {
          extension: "jpg|png|jpeg",
          dimention:[250,250],
          size: true,
        },
      },
      messages: {
        
        name: {
          required: "Please enter Staff Name.",
          minlength: "Your Staff Name must consist of at least 3 characters."
        },
		    email: {
		      email: "Please enter a valid email address."
		    },
		    phone: {
		      required:  "Please enter a mobile number.",
		      phonenu:  "Please enter a valid mobile number.",
		    },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        image: {
          extension: "Please select an image with an extension of either .jpg .png or .jpeg",
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

/* staffForm validation */