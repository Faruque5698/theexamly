/* badgeForm validation */
  $(function () {
    $("#testimonialForm").validate({
        rules: {
          top_text: {
              required: true,
              maxlength: 10
          },
          bottom_text: {
            required: true,
            maxlength:25
          },
        },
        messages: {
          
          top_text: {
            required: "Please enter a sentence for badge top text.",
            maxlength: "Badge top text cannot be longer than 10 characters."
          },
          bottom_text: {
            required: "Please enter a sentence for badge bottom text.",
            maxlength: "Badge bottom text cannot be longer than 25 characters."
          },
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

/* badgeForm validation */