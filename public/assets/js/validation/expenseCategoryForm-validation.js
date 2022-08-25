/* courseCategoryForm validation */
$(function () {
    // validate the comment form when it is submitted



    $("#expenseCategoryForm").validate({
      rules: {
        expense_title: {
          required: true,
          minlength: 3
        },
      },
      messages: {

        expense_title: {
          required: "Please Enter Expense Category Name.",
          minlength: "Your Expense Category Name must consist of at least 3 characters."
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

/* courseCategoryForm validation */
