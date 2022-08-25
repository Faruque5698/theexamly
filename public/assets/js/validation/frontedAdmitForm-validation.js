  /* studentForm validation */
  $(function () {
    // validate the comment form when it is submitted
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

    $("#frontedAdmitForm").validate({
      ignore: "",
      invalidHandler: function(e, validator){
        if(validator.errorList.length)
          $('#nav a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
      },
      rules: {
        first_name: {
          required: true,
        },
        last_name: {
          required: true,
        },
        phone: {
          required: true,
          phonenu:true,          
        },
        email: {
          email:true,
          required:true,
        },
        exam_type:{
          required:true,
        },
        exam:{
          required:true,
        },
        subject_id:{
          required:true,
        },
        password:{
          required:true,
          validpassword:true
        }, 
        confirm_password:{
          required:true,
          equalTo : "#password"
        }, 
        checkbox:{
          required:true
        }   
      },
      messages: {
        
        first_name: {
          required: "Please enter Your First Name.",
        },
        last_name: {
          required: "Please enter Your Last Name.",
        },
        email: {
          email: "Please enter a valid email.",
          required:  "Please enter your email address.",
        },
        phone: {
          required:  "Please enter your mobile number.",
          phonenu: "Please enter a valid Contact Number"
        },
        exam_type: {
          required:  "Please select exam type.",
        },
        exam: {
          required:  "Please select your exam.",
        },
        subject_id: {
          required:  "Please select your subject.",
        },
        password: {
          required:  "Please give a password.",
          validpassword: "পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার(!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।"
        },
        confirm_password: {
          required:  "Please give the confirm password.",
          equalTo : "Confirm password are not match"
        },
        checkbox: {
          required:  "Must click the checkbox."
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

/* frontedAdmitForm validation */