
  /* testimonialForm validation */
  $(function () {
    // validate the comment form when it is submitted
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

    $("#testimonialForm").validate({
        ignore: [],  
        rules: {
          author: {
              required: true,
          },
          description: {
              required: function() 
              {
                  CKEDITOR.instances.description.updateElement();
              },
              minlength:100
          },
          images: {
              extension: "jpg|png|jpeg",
              size: true,
            },
  
        },
        messages: {
          
          author: {
            required: "Please enter a Author Name.",
          },
          description: {
            required: "Please enter description.",
          },
          image: {
              extension: "Author Image has to be either jpeg, jpg or png file.",
  
          }
        },
        errorPlacement: function (label, element) {
            if (element.is('textarea')) {
                element.next().css('border', '1px solid red');
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            }else{
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            }
        },
        highlight: function (element, errorClass) {
          $(element).parent().addClass('has-danger')
          $(element).addClass('form-control-danger')
        }
      });
});

/* newsForm validation */