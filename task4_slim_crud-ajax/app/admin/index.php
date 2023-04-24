<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX CRUD</title>

    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JAVASCRIPT FILES  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


    <!-- CUSTOM CSS FILE -->
    <link rel="stylesheet" href="css/style.css">

    <!-- FONT AWESOME CDN LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Datatable css & js cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="container mb-5">
        <h3 class="text-center my-2">PHP Ajax CRUD operation</h3>

        <span>Manage Employees</span>
        <button type="button" class="btn btn-success float-end mb-4" data-bs-toggle="modal"
            data-bs-target="#addEmployeeModal"
            onClick=" $('#methodName').val('add'); $('#employee_id').val(''); $('.passwordField').show();$('.submit.btn.btn-primary').html('Add'); $('.form-control').val(''); $('.form-check-input').prop('checked', false); $('.add_employee #fileName').hide();$('#myForm .form-control').attr('readonly', false);  $('.addbutton').show(); $('.resetButton').show(); $('#image').show()">
            <i class="fa-solid fa-circle-plus fa-flip me-2"></i>Add New Employee
        </button>
        <form action="" method="" class="my-3">
            <!-- <input type="text" name="keywords" id="keywords">
            <button type="button" onClick="return searchKeywords();">Search</button> -->
            <button type="button" class="btn btn-danger btn-sm me-5" onClick="return deleteSelected();">Delete Selected</button>
            <input type="radio" name="genderFilter" class="GenderFilter" value="Male"> Male
            <input type="radio" name="genderFilter" class="GenderFilter" value="Female"> Female
            <input type="reset" name="Reset" class="btn btn-info btn-sm" id="reset" onClick="employeeList();">
        </form>
        <table class="table table-striped table-hover myTable" id="myTableNew">
            <thead class="table-dark">
                <tr>
                    <th><input type="checkbox" name="" id="checkboxSelect"></th>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Hobbies</th>
                    <th>Gender</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="employee_data" style="vertical-align:middle"> </tbody>
        </table>

        <!-- Add Employee Modal -->
        <form id="myForm" class="formValidation" enctype="multipart/form-data">

            <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addEmployeeModalLabel">Add/Update Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body add_employee">
                            <input type="hidden" class="readonly" name="employee_id" id="employee_id" readonly>
                            <input type="hidden" class="readonly" name="methodName" id="methodName" readonly>
                            <input type="hidden" class="readonly" name="oldFile" id="oldFile" readonly>
                            <div class="mb-3">
                                <label class="form-label"><b>First Name</b></label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Last Name</b></label>
                                <input type="text" class="form-control" id="lname" name="lname">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label"><b>Email address</b></label>
                                <input type="email" class="form-control" name="email" id="email">
                                <div id="emailHelp" class="form-text text-light msg">We'll never share your email
                                    with
                                    anyone else.
                                </div>
                            </div>
                            <div class="mb-3 passwordField">
                                <label class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3 passwordField">
                                <label class="form-label"><b>Confirm Password</b></label>
                                <input type="password" class="form-control" name="confirm_password"
                                    id="confirm_password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Profile image</b></label>
                                <label id="profile" class="float-end"><i class="fa-solid fa-chevron-down"
                                        onclick="myFunctionImg()"></i></label>
                                <input type="file" class="form-control" id="image" name="image">

                                <img src="" width="100" style="display:none;margin:10px;" id="fileName">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Hobbies</b></label> <br>
                                <input type="checkbox" class="form-check-input form-checkbox" name="hobbies[]"
                                    value="Reading">
                                <label class="me-4">Reading</label>
                                <input type="checkbox" class="form-check-input form-checkbox" name="hobbies[]"
                                    value="Travelling">
                                <label class="me-4">Travelling</label>
                                <input type="checkbox" class="form-check-input form-checkbox" name="hobbies[]"
                                    value="Sports">
                                <label class="me-4">Sports</label>
                                <input type="checkbox" class="form-check-input form-checkbox" name="hobbies[]"
                                    value="Coding">
                                <label class="me-4">Coding</label>
                                <div class="form-group"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Gender</b></label> <br>
                                <input type="radio" class="form-check-input" name="gender" value="Male"> <label
                                    class="me-4">Male</label>
                                <input type="radio" class="form-check-input" name="gender" value="Female"> <label
                                    class="me-4">Female</label>
                                <div class="form-group"></div>
                            </div>
                            <div class="mb-3 gen">
                                <label class="form-label"><b>Description</b></label>
                                <label id="profile" class="float-end"><i class="fa-solid fa-chevron-down"
                                        onclick="myFunctionDesc()"></i></label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control desc"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer bg-light" style="border-top: 0">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="reset" class="btn btn-info resetButton btn-sm">Reset</button>
                            <button type="button" class="submit btn btn-primary addbutton btn-sm"
                                onclick="$('#myForm').submit();">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function () {
                employeeList();
            });
            function deleteSelected() {
                var confirmDelete = confirm("Are you sure you want to delete selected records?");
                if (confirmDelete) {
                    var arrayCheck = [];
                    $('input[name="checkboxIds"]:checked').each(function () {
                        arrayCheck.push(this.value);
                    });
                    var ids = arrayCheck.join(",");
                    $.ajax({
                        type: 'get',
                        data: {
                            ids: ids
                        },
                        url: '../src/public/deleteSelected',
                        success: function (data) {

                            employeeList();

                        }
                    });
                }
                else {
                    return false;
                }
            }
            // function searchKeywords() {
            //     var keywords = $('#keywords').val();
            //     $.ajax({
            //         type: 'get',
            //         data: {
            //             keywords: keywords
            //         },
            //         url: '../src/public/empList',
            //         success: function (data) {

            //             employeeList(keywords);

            //         }
            //     });
            // }

            function employeeList(keywords = "") {
                $.ajax({
                    type: 'get',
                    data: {
                        keywords: keywords
                    },
                    url: '../src/public/empList',
                    success: function (data) {
                        var response = JSON.parse(data);
                        // console.log(response);
                        var tr = '';
                        for (var i = 0; i < response.length; i++) {
                            var id = response[i].id;
                            var fname = response[i].fname;
                            var lname = response[i].lname;
                            var email = response[i].email;
                            var image = response[i].image;
                            var hobbies = response[i].hobbies;
                            var gender = response[i].gender;
                            var description = response[i].description;

                            tr += '<tr>';
                            tr += '<td><input type="checkbox" value="' + id + '" class="checkboxCls" name="checkboxIds" id=""></td>';
                            tr += '<td>' + id + '</td>';
                            tr += '<td>' + fname + '</td>';
                            tr += '<td>' + lname + '</td>';
                            tr += '<td>' + email + '</td>';
                            // tr += '<td>' + password + '</td>';
                            tr += '<td> <img src="../src/images/' + image + '"width="50"> </td>';
                            tr += '<td>' + hobbies + '</td>';
                            tr += '<td>' + gender + '</td>';
                            tr += '<td>' + description + '</td>';
                            tr += '<td>';
                            tr +=
                                '<button type="button" class="btn btn-info  badge" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" onclick="viewEmployee(' +
                                id + ')"><i class="fa-solid fa-eye fa-shake"></i></button>';
                            tr +=
                                '<button type="button" class="btn btn-success mx-2 badge editBtn" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" onClick="editEmployee(' +
                                id + ')"><i class="fa-solid fa-pen-to-square fa-shake"></i></button>';
                            tr +=
                                '<button type="button" class="btn btn-danger  badge" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal" onclick="deleteEmployee(' +
                                id + ')"><i class="fa-solid fa-trash fa-shake"></i></button>';
                            tr += '</td>';
                            tr += '</tr>';
                        }
                        $('#employee_data').html(tr);
                        let table = new DataTable('.myTable');
                    }
                    
                });
            }
            $(".GenderFilter").click(function () {
                var genderValue = $(this).val();
                $.ajax({
                    type: 'get',
                    data: {
                        keywords: genderValue
                    },
                    url: '../src/public/empList',
                    success: function (data) {

                        employeeList(genderValue);

                    }
                });
            });

            $("#checkboxSelect").click(function () {
                if ($(this).is(":checked") == true) {
                    $(".checkboxCls").prop('checked', true);
                }
                else {
                    $(".checkboxCls").prop('checked', false);
                }
            });

            function editEmployee(employee_id) {
                $('#myForm input').attr('readonly', false);
                $('.readonly').attr('readonly', true);
                $('.add_employee #employee_id').val(employee_id);
                $('.passwordField').hide();
                $("#methodName").val("edit");
                $('.submit.btn.btn-primary').html("Update");
                $.ajax({
                    type: 'get',
                    data: {
                        employee_id: employee_id
                    },
                    url: '../src/public/selectEmployee',
                    success: function (response) {
                        var response = JSON.parse(response)
                        $.each(response, function (key, value) {
                            $('.addbutton').show();
                            $('#image').show();
                            $('.resetButton').show();
                            $('.add_employee #fname').val(value.fname);
                            $('.add_employee #lname').val(value.lname);
                            $('.add_employee #email').val(value.email);
                            // $('.edit_employee #password').val(value.password);
                            $('.add_employee #oldFile').val(value.image);
                            $('.add_employee input[name="hobbies"]:checked');
                            var hobbies = value.hobbies.split(",");
                            hobbies.forEach(element => {
                                $('.add_employee input[type="checkbox"][value="' + element +
                                    '"]').prop('checked', true);
                            });
                            $(".add_employee #fileName").show();
                            $(".add_employee #fileName").attr('src', '../src/images/' + value.image);
                            $('.add_employee input[type="radio"][value="' + value.gender + '"]').prop(
                                'checked', true);
                            $('.add_employee #description').val(value.description);
                        });
                    }
                });
            }


            function viewEmployee(employee_id) {
                $.ajax({
                    type: 'get',
                    data: {
                        employee_id: employee_id
                    },
                    url: '../src/public/selectEmployee',
                    success: function (response) {
                        var response = JSON.parse(response)
                        $.each(response, function (key, value) {
                            $('.addbutton').hide();
                            $('.resetButton').hide();
                            $('.passwordField').hide();
                            $('#image').hide();
                            $('#myForm input').attr('readonly', 'readonly');

                            $('.add_employee #fname').val(value.fname);
                            $('.add_employee #lname').val(value.lname);
                            $('.add_employee #email').val(value.email);
                            // $('.edit_employee #password').val(value.password);
                            $('.add_employee #oldFile').val(value.image);
                            // $('.add_employee input[name="hobbies"]:checked');
                            var hobbies = value.hobbies.split(",");
                            hobbies.forEach(element => {
                                $('.add_employee input[type="checkbox"][value="' + element +
                                    '"]').prop('checked', true);
                            });
                            $(".add_employee #fileName").show();
                            $(".add_employee #fileName").attr('src', '../src/images/' + value.image);
                            $('.add_employee input[type="radio"][value="' + value.gender + '"]').prop(
                                'checked', true);
                            $('.add_employee #description').val(value.description);
                        });
                    }
                });
            }



            function deleteEmployee(deleteID) {
                var deleteConfirm = confirm("Are you sure you want to delete this record?");
                if (deleteConfirm) {
                    var id = $('#delete_id').val();
                    $.ajax({
                        type: 'get',
                        data: {
                            id: deleteID
                        },
                        url: '../src/public/deleteEmployee',
                        success: function (data) {

                            employeeList();

                        }
                    });
                } else {
                    return false;
                }
            }

        </script>




        <script src="js/validate.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

        <script src="js/javascript.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
            </script>
        
        <script>
           
        </script>

</body>

</html>