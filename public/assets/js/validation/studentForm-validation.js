  /* studentForm validation */
  $(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("phonenu", function (value, element) {
      if (/^(?:\+?88|0088)?01[15-9]\d{8}$/g.test(value)) {
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
      // if(element.files[0].size <= 2097152){
      if(element.files[0].size <= 800000){  
          return true;
      }else{
          return false;
      }
    },'Image size has to be less than 800 kb');          

    $.validator.addMethod("multifile_extension", function (value, element) {
      let files = $('#document')[0].files;
      let extensions = ["jpg", "png", "jpeg"];
      let check = true;
      for (var i = 0; i < files.length; i++)
      {
        let ext = files[i].name;
        ext = ext.split('.').pop().toLowerCase();
        if(!extensions.includes(ext)){
          console.log(ext);
          check = false;
        }
      }
      return check;
    }, "One more file contains invalid extension");  
	    
    
    $("#studentForm").validate({
      ignore: "",
      invalidHandler: function(e, validator){
        if(validator.errorList.length)
          $('#nav a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
      },
      rules: {
        name: {
          required: true,
        },
        short_name: {
          //required: true,
        },
        student_phone: {
          //required: true,
          phonenu:true,          
        },
        phone: {
          required: true,
          phonenu:true,          
        },
        email: {
          email:true,
          required:true,
        },
        present_address:{
          // required:true,
        },
        permanent_address:{
          // required:true,
        },
        birth_id:{
          maxlength:17,
        },
        batch_id:{
          required:true,
        },
         roll_no:{
          required:true,
        },
        password:{
          required:true,
        },
        father_name: {
          //required:true,
        },
        mother_name: {
          //required:true,
        },
        local_email: {
          email:true,
        },
        fa_phone: {
          //phonenu:true,
          //required:true
        },
        image: {
          extension: "jpg|png|jpeg",
          size: true,
          // dimention:[250,250],
        },
        "document[]":{
          extension: "jpg|png|jpeg",
          size: true,
          multifile_extension:true,
        }	    
      },
      messages: {
        
        first_name: {
          required: "Please enter Student First Name.",
        },
        last_name: {
          required: "Please enter Student Last Name.",
        },
        phone: {
          required: "Please enter Contact Number.",
        },
        short_name: {
          //required:  "Please enter Student Nick Name.",
        },
        email: {
          email: "Please enter a valid email.",
          required:  "Please enter Student email.",
        },
        phone: {
          required:  "Please enter Student's phone number.",
          phonenu: "Please enter a valid Contact Number"
        },
        present_address: {
          // required:  "Please enter Present Address.",
        },
        permanent_address: {
          //required:  "Please enter Permanent Address.",
        },
        birth_id: {
          maxlength: "Birth ID cannot be longer than 17 digits."
        },
        batch_id: {
          required:  "Please select a Batch.",
        },
        roll_no: {
          required:  "Please give a roll no.",
        },
        password: {
          required:  "Please give a password.",
        },
        father_name: {
          //required: "Please enter father's name.",
        },
        fa_phone: {
          //phonenu: "Please enter a valid Contact Number.",
          //required:  "Please enter father's contact number.",
        },
        mother_name: {
         // required: "Please enter mother's name.",
        },
        local_email: {
          email: "Please enter a valid email.",
        },
        image: {
          extension: "Please select an image with an extension of either .jpg .png or .jpeg",
          maxsize: "Image size has to be less than 800kb"
        },
        "document[]": {
          extension: "Please select a document file with an extension of either .jpg .png .jpeg",
          maxsize: "File size has to be less than 800kb"
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