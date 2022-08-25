
  /* achievementForm validation */
  $(function () {
    // validate the comment form when it is submitted
	   
    $("#achievementForm").validate({
      rules: {
        no_of_quiz: {
          required: true,
        },
        no_of_exam: {
          required: true,
          // minlength: 3
        },
        no_of_candidates: {
          required: true,
          // minlength: 3
        },
        no_of_exam_topics: {
          required: true,
          // minlength: 3
        },
        subject_of_theExaminee: {
          required: true,
          // minlength: 3
        },
      },
      messages: {
        
        no_of_quiz: {
          required: "Please enter number of question bank.",
        },
        no_of_exam: {
          required: "Please enter number of exam.",
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
        },
        no_of_candidates: {
          required: "Please enter number of candidates.",
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
        },
        no_of_exam_topics: {
          required: "Please enter number of exam topics.",
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
        },
        subject_of_theExaminee: {
          required: "Please enter subject of the examinee.",
          // minlength: "Your Batch Category Name must consist of at least 3 characters."
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

/* achievementForm validation */