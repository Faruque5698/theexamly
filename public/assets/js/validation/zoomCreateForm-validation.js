  /* zoomCreateForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#zoomCreateForm").validate({
      rules: {
        user_name: {
          required: true
        },
		    zoom_api_url: {
          required: true
        },
		    zoom_api_key: {
		      required: true
        },
        zoom_api_secret: {
          required: true
        },
      },
      messages: {
        
        user_name: {
          required: "Please select a user name."
        },
		    zoom_api_url: {
		      required:  "Please enter a valid zoom api url."
		    },
		    zoom_api_key: {
		      required:  "Please enter a valid zoom api key."
		    },
        zoom_api_secret: {
          required:  "Please enter a valid zoom api secret."
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

/* zoomCreateForm validation */