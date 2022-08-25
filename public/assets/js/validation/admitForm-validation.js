  /* studentForm validation */
  $(function () {
    // validate the comment form when it is submitted
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
	  
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z\s,.\s," "]+$/i.test(value);
    }, "Only alphabetical characters");  
    
    $("#admitForm").validate({
      ignore: "",
      invalidHandler: function(e, validator){
        if(validator.errorList.length)
          $('#nav a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
      },
      rules: {
        name: {
          required: true,
          lettersonly: true
        },
        phone: {
          required: true,
          phonenu:true,          
        },
        email: {
          email: true,
        },
        course_name:{
          required:true,
        },
        batch_name:{
          required:true,
        },
        payment_amount:{
          required:true,
        }  
      },
      messages: {
        
        name: {
          required: "Please enter student full name.",
        },
        phone: {
          required:  "Please enter Contact Number.",
          phonenu: "Please enter a valid Contact Number"
        },
        email: {
          email: "Please enter a valid email address."
        },
        course_name: {
          required:  "Please select a course.",
        },
        batch_name: {
          required:  "Please select a batch.",
        },
        payment_amount: {
          required:  "Please enter payment amount",
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

/* studentForm validation */