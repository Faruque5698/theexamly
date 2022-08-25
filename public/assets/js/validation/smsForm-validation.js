$(document).ready(function () {

    jQuery.validator.addMethod("phonenu", function (value, element) {
            if (/^(?:\+?88|0088)?0[11-9]\d{9}$/g.test(value)) {

            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");
});




  /* smsForm validation */
  $(function () {
    // validate the comment form when it is submitted
  
     
    $("#smsForm").validate({
      ignore: ":not(#first_name),.note-editable.panel-body",
      rules: {
        // title: {
        //   required: true
        // },
        message_type: {
          required: true
        },
        batchId: {
          required: true
        },
        name: {
          required: true,
          // phone:true
        }
        
      },
      messages: {
        
        // title: {
        //   required: "Please enter messages title."
        // },
        message_type: {
          required: "Please select message type."
        },
        batchId: {
          required: "Please select batch name."
        },
        name: {
          required: "Please select student."
          // phonenu: "Please enter a valid Contact Number"
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

/* smsForm validation */
