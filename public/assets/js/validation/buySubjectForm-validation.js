$(document).ready(function () {

    jQuery.validator.addMethod("phonenu", function (value, element) {
        if (/^(?:\+?88|0088)?0[1-9]\d{9}$/g.test(value)) {
          console.log("here");
          return true;
        } else {
          console.log("not here");
            return false;
        };
    }, "Invalid phone number");

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


  /* buySubjectForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#buySubjectForm").validate({
      rules: {
        course_name: {
          required: true
        },
		    subject_id: {
		      required: true
        },
      },
      messages: {
        
        course_name: {
          required: "Please select group name."
        },
		    subject_id: {
		      required:  "Please select at lest one subject.",
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

/* buySubjectForm validation */