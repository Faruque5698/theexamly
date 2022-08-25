
  /* bannerForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#bannerForm").validate({
      rules: {
        image: {
            required:true,
            extension: "jpg|png|jpeg"
          },
      },
      messages: {
        image: {
            extension: "Banner Image has to be either jpeg, jpg or png file.",
            required: "Please select a banner image to upload"
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

/* bannerForm validation */