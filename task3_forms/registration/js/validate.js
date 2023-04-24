  $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    fname: {
                        required: true,
                        minlength: 3
                    },
                    lname: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    conpassword: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    image: {
                        required: true,
                        accept: "image/*"
                    },
                    desc: {
                        required: true
                    }
                },
                messages: {
                    fname: {
                        required: "Please enter First name",
                        minlength: "First name should be at least 3 characters"
                    },
                    lname: {
                        required: "Please enter Last name",
                        minlength: "Last name should be at least 3 characters"
                    },
                    email: {
                        required: "Please enter email",
                        email: "email should be in the format: abc@domain.ltd"
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Password should be at least 5 characters"
                    },
                    conpassword: {
                        required: "Please enter confirm password",
                        minlength: "Confirm Password should be same as password"
                    },
                    image: {
                        required: "Please upload image.",
                        accept: "Only image files are allowed."
                    },
                    desc: {
                        required: "Please enter description"
                    }
                },
                errorClass: "text-danger"
            });
        });












































































// $(document).ready(function () {

//     //Fname validation
//     $('.fnamecheck').hide();
//     let fnameError = true;
//     $('#fname').keyup(function () {
//         validateFname();
//     });

//     function validateFname() {
//         let fnameValue = $('#fname').val();
//         if (fnameValue.length == '') {
//             $('.fnamecheck').show();
//             fnameError = false;
//             return false;
//         } else {
//             $('.fnamecheck').hide();
//         }
//     }

//     //Lname validation
//     $('.lnamecheck').hide();
//     let lnameError = true;
//     $('#lname').keyup(function () {
//         validateLname();
//     });

//     function validateLname() {
//         let lnameValue = $('#lname').val();
//         if (lnameValue.length == '') {
//             $('.lnamecheck').show();
//             lnameError = false;
//         } else {
//             $('.lnamecheck').hide();
//         }
//     }


//     // Password validation
//     $('.passcheck').hide();
//     let passwordError = true;
//     $('#password').keyup(function (){
//         validatePassword();
//     });
//     function validatePassword(){
//         let passValue = $('#password').val();
//         if(passValue.length == ''){
//             $('.passcheck').show();
//             passwordError = false;
//         }else{
//             $('.passcheck').hide();
//         }
//     }

//     // Confirm password validation
//     $('.conpasscheck').hide();
//     let confirmPasswordError = true;
//     $('#conpassword').keyup(function(){
//         validateConPassword();
//     });
//     function validateConPassword(){
//         let conPassValue = $('#conpassword').val();
//         let passValue = $('#password').val();
//         if(passValue != conPassValue){
//             $('.conpasscheck').show();
//             confirmPasswordError = false;
//         }else{
//             $('.conpasscheck').hide();
//         }
//     }





//     //submit button
//     $('#submitbtn').click(function () {
//         validateFname();
//         validateLname();
//         validatePassword();
//         validateConPassword();
        

//         if (fnameError == true &&
//             lnameError == true &&
//             passwordError == true &&
//             confirmPasswordError == true) {
//             return true;
//         } else {
//             return false;
//         }
//     });

// });

