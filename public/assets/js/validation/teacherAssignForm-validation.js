/* teacherAssignForm validation */
$(function () {
    // validate the comment form when it is submitted

    $("#teacherAssignForm").validate({
        rules: {
            user_id: {
                required: true,
            },
            course_name: {
                required: true,
            },
            subject_name: {
                required: true,
            },
            batch_name: {
                required: true,
            }
        },
        messages: {

            user_id: {
                required: "Please select a Teacher.",
            },
            course_name: {
                required: "Please select a course.",
            },
            subject_name: {
                required: "Please select a subject.",
            },
            batch_name: {
                required: "Please select a batch.",
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

/* teacherAssignForm validation */