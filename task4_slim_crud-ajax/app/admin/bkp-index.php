<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX CRUD</title>

    <!-- JQUERY CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->


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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

</head>

<body>
    <div class="container">
        <h3 class="text-center my-5">PHP Ajax CRUD operation</h3>

        <span>Manage Employees</span>
        <button type="button" class="btn btn-success float-end mb-4" data-bs-toggle="modal"
            data-bs-target="#addEmployeeModal">
            <i class="fa-solid fa-circle-plus fa-flip me-2"></i>Add New Employee
        </button>

        <table class="table table-striped table-hover" id="myTableNew">
            <thead class="table-dark">
                <tr>
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
            <tbody id="employee_data"> </tbody>
        </table>

        <!-- Add Employee Modal -->
        <form id="myForm" class="formValidation" enctype="multipart/form-data">
            <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addEmployeeModalLabel">Add Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body add_employee">

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
                            <div class="mb-3">
                                <label class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Confirm Password</b></label>
                                <input type="password" class="form-control" name="confirm_password"
                                    id="confirm_password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Profile image</b></label>
                                <label id="profile" class="float-end"><i class="fa-solid fa-chevron-down"
                                        onclick="myFunctionImg()"></i></label>
                                <input type="file" class="form-control" id="image" name="image">
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
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="reset" class="btn btn-info">Reset</button>
                            <button type="button" class=" submit btn btn-primary"
                                onclick="$('#myForm').submit();">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- Edit Employee Modal -->
        <form id="myFormEdit" class="formValidation" enctype="multipart/form-data">
            <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editEmployeeModalLabel">Edit Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body edit_employee">

                            <input type="hidden" id="employee_id" name="employee_id" class="form-control" required>
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
                            <!-- <div class="mb-3">
                                <label class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Confirm Password</b></label>
                                <input type="password" class="form-control" name="confirm_password"
                                    id="confirm_password">
                            </div>-->
                            <div class="mb-3">
                                <label class="form-label"><b>Profile image</b></label>
                                <label id="profile" class="float-end"><i class="fa-solid fa-chevron-down"
                                        onclick="myFunctionImg()"></i></label>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="" width="100" style="display:none;margin:10px;" id="fileName">
                            </div>

                            <input type="hidden" id="oldFile" name="oldFile" class="form-control">
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
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Gender</b></label> <br>
                                <input type="radio" class="form-check-input" name="gender" value="Male"> <label
                                    class="me-4">Male</label>
                                <input type="radio" class="form-check-input" name="gender" value="Female"> <label
                                    class="me-4">Female</label>
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
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- View Employee Modal -->
        <div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewEmployeeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="viewEmployeeModalLabel">View Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body viewEmployee">

                        <div class="mb-3">
                            <label class="form-label"><b>First Name</b></label>
                            <input type="text" class="form-control" id="fname" name="fname" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Last Name</b></label>
                            <input type="text" class="form-control" id="lname" name="lname" readonly>
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label class="form-label"><b>Email address</b></label>
                            <input type="email" class="form-control" name="email" id="email" readonly>
                            <div id="emailHelp" class="form-text text-light msg">We'll never share your email with
                                anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Profile image</b></label>
                            <label id="profile" class="float-end"><i class="fa-solid fa-chevron-down"
                                    onclick="myFunctionImg()"></i></label>
                            <img src="" width="100" style="display:none;margin:10px;" id="viewFile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Hobbies</b></label> <br>
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Reading"
                                disabled="disabled">
                            <label class="me-4">Reading</label>
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Travelling"
                                disabled="disabled">
                            <label class="me-4">Travelling</label>
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Sports"
                                disabled="disabled">
                            <label class="me-4">Sports</label>
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Coding"
                                disabled="disabled">
                            <label class="me-4">Coding</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Gender</b></label> <br>
                            <input type="radio" class="form-check-input" name="gender" value="Male" disabled="disabled">
                            <label class="me-4">Male</label>
                            <input type="radio" class="form-check-input" name="gender" value="Female"
                                disabled="disabled"> <label class="me-4">Female</label>
                        </div>
                        <div class="mb-3 gen">
                            <label class="form-label"><b>Description</b></label>
                            <label id="profile" class="float-end"><i class="fa-solid fa-chevron-down"
                                    onclick="myFunctionDesc()"></i></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control desc"
                                readonly></textarea>
                        </div>

                    </div>
                    <div class="modal-footer bg-light" style="border-top: 0">
                        <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            $(document).ready(function () {
                employeeList();
            });

            function employeeList() {
                $.ajax({
                    type: 'get',
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
                                '<button type="button" class="btn btn-info mx-2 badge" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal" onclick="viewEmployee(' +
                                id + ')">VIEW</button>';
                            tr +=
                                '<button type="button" class="btn btn-success mx-2 badge" data-bs-toggle="modal" data-bs-target="#editEmployeeModal" onClick="editEmployee(' +
                                id + ')">EDIT</button>';
                            tr +=
                                '<button type="button" class="btn btn-danger mx-2 badge" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal" onclick="deleteEmployee(' +
                                id + ')">DELETE</button>';
                            tr += '</td>';
                            tr += '</tr>';
                        }
                        $('#employee_data').html(tr);
                        let table = new DataTable('#myTableNew');
                    }
                });
            }



            function editEmployee(employee_id) {
                $('.edit_employee #employee_id').val(employee_id);
                $.ajax({
                    type: 'get',
                    data: {
                        employee_id: employee_id
                    },
                    url: '../src/public/selectEmployee',
                    success: function (response) {
                        var response = JSON.parse(response)
                        $.each(response, function (key, value) {
                            $('.edit_employee #fname').val(value.fname);
                            $('.edit_employee #lname').val(value.lname);
                            $('.edit_employee #email').val(value.email);
                            // $('.edit_employee #password').val(value.password);
                            $('.edit_employee #oldFile').val(value.image);
                            $('.edit_employee input[name="hobbies"]:checked');
                            var hobbies = value.hobbies.split(",");
                            hobbies.forEach(element => {
                                $('.edit_employee input[type="checkbox"][value="' + element +
                                    '"]').prop('checked', true);
                            });
                            $(".edit_employee #fileName").show();
                            $(".edit_employee #fileName").attr('src', '../src/images/' + value.image);
                            $('.edit_employee input[type="radio"][value="' + value.gender + '"]').prop(
                                'checked', true);
                            $('.edit_employee #description').val(value.description);
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
                            $('.viewEmployee #fname').val(value.fname);
                            $('.viewEmployee #lname').val(value.lname);
                            $('.viewEmployee #email').val(value.email);
                            $('.viewEmployee input[name="hobbies"]:checked');
                            var hobbies = value.hobbies.toString().split(",");
                            hobbies.forEach(element => {
                                $('.viewEmployee input[type="checkbox"][value="' + element +
                                    '"]').prop('checked', true);
                            });

                            $('input[name="name_of_your_radiobutton"]:checked').val();
                            $('.viewEmployee input[type="radio"][value="' + value.gender + '"]').prop(
                                'checked', true);
                            $('.viewEmployee #gender').val(value.gender);
                            $('.viewEmployee #viewFile').attr('src', '');
                            $('.viewEmployee #viewFile').show();
                            $('.viewEmployee #viewFile').attr('src', '../src/images/' + value.image);
                            $('.viewEmployee #description').val(value.description);
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
        <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        <script>

        </script>
</body>

</html>