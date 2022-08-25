$(document).ready(function () {
  "use strict";
  const max_fields = 5;
  const wrapper = $(".table_of_grade_tbody");
  const add_button = $(".add_form_field");

  let x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append(
        `<tr>
        <td colspan="4">
            <a
            href="#"
            class="delete btn btn-danger float-right"
            ><i class="fas fa-times"></i
            ></a>
          <table class="inner_table_of_grade">
            <tbody>
              <tr>
                <td class="degree">
                  <input
                    type="text"
                    class="form-control form_control"
                    name="degree[]"
                  />
                </td>
                <td class="passingYear">
                  <input
                    type="text"
                    class="form-control form_control"
                    name="passingYear[]"
                  />
                </td>
                <td class="result">
                  <input
                    type="text"
                    class="form-control form_control"
                    name="result[]"
                  />
                </td>
                <td class="institution">
                  <input
                    type="text"
                    class="form-control form_control"
                    name="institution[]"
                  />
                </td>
              </tr>
            </tbody>
          </table>
    
        </td>
      </tr>`
      );
    } else {
      add_button.attr("disabled", true);
      add_button.removeClass("btn_primary");
      add_button.addClass("btn_primary_disabled");
      $("#table_of_grade_error").html(`
       
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            আপনি সীমাতে পৌঁছেছেন
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        `);
    }
  });

  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent("td").parent("tr").remove();
    x--;
    add_button.attr("disabled", false);
    add_button.removeClass(" btn_primary_disabled");
    add_button.addClass("btn_primary");
    $("#table_of_grade_error").html("");
  });

  // teacher Responsibility Checkbox hidden
  $("#teacherResponsibilityCheckbox").on("change", function (e) {
    e.preventDefault();

    localStorage.teacherRegistrationForm = $(this).is(":checked");
    $("#teacherRegisterSection").toggleClass("hidden");
  });

  $(function () {

    const isTrue =
      localStorage.teacherRegistrationForm === "true" ? true : false;
    $("#teacherResponsibilityCheckbox").prop("checked", isTrue);

    if (isTrue) {
      $("#teacherRegisterSection").removeClass("hidden");
    } else {
      $("#teacherRegisterSection").addClass("hidden");
    }
  });

  //   end js
});
