$(document).ready(function() {
    $("#regForm").validate({
        rules: {
            firstname: {
                required: true,
                maxlength: 20,
            },
            lastname:{
                required: true,
                maxlength: 20,
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 5
            },
            repeatpassword: {
                required: true,
                equalTo: "#Password"
            },
        },
        messages: {
            firstname: {
                required: "First name is required",
                maxlength: "First name cannot be more than 20 characters"
            },
            lastname: {
                required: "Last name is required",
                maxlength: "Last name cannot be more than 20 characters"
            },
            email: {
                required: "Email is required",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters",
            },
            password: {
                required: "Password is required",
                minlength: "Password must be at least 5 characters"
            },
            repeatpassword: {
                required:  "Confirm password is required",
                equalTo: "Password and confirm password should same"
            },
        }
    });
});