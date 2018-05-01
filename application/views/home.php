<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js" type="text/javascript"></script>
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">User Records     <span><a href="<?php echo base_url('Ajax/view'); ?>">View</a></span></div>
            <div class="row">
                <div class="col-md-4">

                </div>

                <div class="col-md-4">
                    <!--<form method="post" action="<?php //echo base_url('Ajax/AddUser')                ?>">-->
                    <form name="myform">
                        <div class="form-group">
                            <label>Email address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default" id="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $(function () {
                    // Initialize form validation on the registration form.
                    // It has the name attribute "registration"
                    $("form[name='myform']").validate({
                        // Specify validation rules
                        rules: {
                            email: {
                                required: true,
                                // Specify that email should be validated
                                // by the built-in "email" rule
                                email: true
                            },
                            password: {
                                required: true,
                                minlength: 5
                            }
                        },
                        // Specify validation error messages
                        messages: {

                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long"
                            },
                            email: "Please enter a valid email address"
                        },
                        // Make sure the form is submitted to the destination defined
                        // in the "action" attribute of the form when valid
                        submitHandler: function (form) {
                            //Save product
                            $('#submit').on('click', function () {

                                var email = $('#email').val();
                                var password = $('#password').val();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo site_url('Ajax/AddUser') ?>",
                                    dataType: "JSON",
                                    data: {email: email, password: password},
                                    success: function (data) {
                                        $('[name="email"]').val("");
                                        $('[name="password"]').val("");
                                        alert("Data Insert Successfully");
                                        show_product();
                                    }
                                });
                                return false;
                            });
                        }
                    });
                });



            });


        </script>
    </body>
</html>