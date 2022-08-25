/* courseCategoryForm validation */
$(function () {
    // validate the comment form when it is submitted



    $("#expenseForm").validate({
      rules: {
        expenseCategory_id: {
          required: true,
        },
        amount: {
            required: true,
            number:true,
          },
      },
      messages: {

        expenseCategory_id: {
            required: "Please Select an expense Category.",
        },
        amount: {
            required:"Please enter an expense amount",
            number: "Expense amount has to be a valid number"
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

/* courseCategoryForm validation */
