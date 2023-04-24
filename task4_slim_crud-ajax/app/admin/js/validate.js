$(document).ready(function () {
  $(".formValidation").validate({
    rules: {
      fname: {
        required: true,
        minlength: 3,
      },
      lname: {
        required: true,
        minlength: 3,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#password",
      },
      "hobbies[]": {
        required: true,
        minlength: 1,
      },
      gender: {
        required: true,
        minlength: 1,
      },
      // image: {
      //   required: true,
      //   extension: "jpg|gif|jpeg|png",
      // },
      description: {
        required: true,
      },
    },
    messages: {
      fname: {
        required: "Please enter First name",
        minlength: "First name should be at least 3 characters",
      },
      lname: {
        required: "Please enter Last name",
        minlength: "Last name should be at least 3 characters",
      },
      email: {
        required: "Please enter email",
        email: "email should be in the format: abc@domain.ltd",
      },
      password: {
        required: "Please enter password",
        minlength: "Password should be at least 5 characters",
      },
      confirm_password: {
        required: "Please enter confirm password",
        minlength: "Confirm Password should be same as password",
      },
      image: {
        required: "Select Image",
        extension: "please upload only jpg|gif|jpeg|png",
      },
      "hobbies[]": {
        required: "Please select at least 1 hobby",
      },
      gender: {
        required: "Please select gender",
      },
      description: {
        required: "Please enter description",
      },
    },
    errorPlacement: function (error, element) {
      if (
        element.attr("name") == "hobbies[]" ||
        element.attr("name") == "gender"
      ) {
        error.appendTo(element.closest(".mb-3"));
      } else {
        error.insertAfter(element);
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: "../src/public/addRecords",
        type: "post",
        data: new FormData(form),
        success: function (data) {
          $("#addEmployeeModal").modal("hide");
          employeeList();
          $(".add_employee .form-control").val("");
          $('.add_employee input[type="checkbox"]').prop("checked", false);
          $('.add_employee input[type="radio"]').prop("checked", false);
        },
        processData: false,
        contentType: false,
        error: function () {
          // Handle error response
        },
      });
      return false; // Prevent the default form submission behavior
    },
    errorClass: "text-danger",
  });
});

$("#myFormEdit").submit(function (e) {
  $.ajax({
    url: "../src/public/addRecords",
    type: "post",
    data: new FormData(this),
    success: function (data) {
      $("#addEmployeeModal").modal("hide");
      employeeList();
    },
    processData: false,
    contentType: false,
    error: function () {
      // Handle error response
    },
  });

  //e.preventDefault();
  return false;
});
