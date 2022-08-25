/* batchForm validation */
$(function () {
    // validate the comment form when it is submitted
    $.validator.addMethod("check_date", function(value, element) {
        var start_date = $("input[name='start_date']").val();
        var end_date = $("input[name='end_date']").val();
        return end_date > start_date;
    }, 'End date must be greater than Start date.');

    $.validator.addMethod("check_time", function(value, element) {
        var prevElement = $(element).parent().parent().prev().children(":first").children().eq(1);
        if(prevElement){
          return value >= prevElement.val();
        }
        
    }, 'End Time cannot be earlier than Start Time.');

    $("#batchForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        start_date: {
            required: true,
          },
          end_date: {
            required: true,
            check_date : true,
          },
          // start_time: {
          //   required: true,
          // },
          "days[Sat][end_time]": {
            check_time : true,
          },
          "days[Sun][end_time]": {
            check_time : true,
          },
          "days[Mon][end_time]": {
            check_time : true,
          },
          "days[Tue][end_time]": {
            check_time : true,
          },
          "days[Wed][end_time]": {
            check_time : true,
          },
          "days[Thu][end_time]": {
            check_time : true,
          },
          "days[Fri][end_time]": {
            check_time : true,
          },
          batchCategory_id: {
            required: true
          },
          // subject_id: {
          //   required: true,
          // },
          course_fee: {
            required: true,
            number: true,
          },
          course_id:{
            required:true,
          }
      },
      messages: {

        name: {
          required: "Please Enter Batch Full Name.",
          minlength: "Your Batch Full Name must consist of at least 3 characters."
        },
        start_date: {
            required: "Please Select an appropriate Batch Start Date."
          },
        end_date: {
            required: "Please Select an appropriate Batch End Date.",
            greaterThan: "Batch End Date cannot be before Start Date"
          },
          start_time: {
            required: "Please Select an appropriate Batch Start Time.",
          },
          end_time: {
            // required: "Please Select an appropriate Batch End Time.",
            greaterThan: "Batch End Time cannot be before Start Time",
          },
          // subject_id: {
          //   required: "Please select a Subject.",
          // },
          batchCategory_id: {
            required: "Please select a Batch Category.",
          },
          course_fee: {
            required: "Please enter a valid Course Fee Amount.",
            number: "Course Fee amount has to be a valid number."
          },
          course_id: {
            required:"Please select a valid course.",
          }
      },
      errorPlacement: function (label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
    });
  });

/* batchForm validation */
