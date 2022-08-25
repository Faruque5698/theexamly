$(document).ready(function () {

    jQuery.validator.addMethod("phonenu", function (value, element) {
            if (/^(?:\+?88|0088)?0[1-9]\d{9}$/g.test(value)) {

            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");
 
});

  /* phoneBookForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#phoneBookForm").validate({
      rules: {
        name: {
          required: true
        },
        phone: {
          required: true,
          phonenu: true
        },
		    email: {
          email: true,
        },
        group_no: {
          required: true,
        }
      },
      messages: {
        
        name: {
          required: "Please enter Name."
        },
        phone: {
          required:  "Please enter a mobile number.",
          phonenu:  "Please enter a valid mobile number.",
        },
		    email: {
		      email: "Please enter a valid email address."
		    },
        group_no: {
          required: "Please select a group name.",
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

/* phoneBookForm validation */