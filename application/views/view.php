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
            <div class="jumbotron">User Records <span><a href="<?php echo base_url('Ajax'); ?>">Back</a></span></div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>


            $(document).ready(function () {
                //For Record Show On page
                show_product();
                function show_product() {
                    //alert('ddaa');
                    $.ajax({
                        type: 'ajax',
                        url: '<?php echo site_url('Ajax/ViewUser') ?>',
                        async: false,
                        dataType: 'json',
                        success: function (data) {
                            // console.log(data['users']);
                            var html = '';
                            var i;
                            for (i = 0; i < data['users'].length; i++) {
                                html += '<tr>' +
                                        '<td>' + data['users'][i].id + '</td>' +
                                        '<td>' + data['users'][i].email + '</td>' +
                                        '<td>' + data['users'][i].password + '</td>' +
                                        '<td style="text-align:right;">' +
                                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data['users'][i].id + '" data-email="' + data['users'][i].email + '" data-password="' + data['users'][i].password + '">Edit</a>' + ' ' +
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data['users'][i].id + '">Delete</a>' +
                                        '</td>' +
                                        '</tr>';
                            }

//                            console.log(html);

                            $("#show_data").html(html);
                        }

                    });
                }
                //Record Update  And Validation
                //get data for update record
                $('#show_data').on('click', '.item_edit', function () {
                    var id = $(this).data('id');
                    var email = $(this).data('email');
                    var password = $(this).data('password');


                    $('#Modal_Edit').modal('show');
                    $('[name="id_edit"]').val(id);
                    $('[name="email_edit"]').val(email);
                    $('[name="password_edit"]').val(password);
                });

                $("#myForm").validate({
                    rules: {
                        email_edit: {
                            required: true,
                            minlength: 8
                        },
                        password_edit: {
                            required: true,
                            minlength: 5
                        }

                    },
                    messages: {
                        email_edit: {
                            required: "Please provide your email",
                            minlength: "Your email must be required."
                        },
                        password_edit: {
                            required: "Please provide your password",
                            minlength: "Your password must be at least 5 characters"
                        }

                    },
                    submitHandler: function (form) {
                        //update record to database

                        var id = $('#id_edit').val();
                        var email = $('#email_edit').val();
                        var password = $('#password_edit').val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('Ajax/UpdateUser') ?>",
                            dataType: "JSON",
                            data: {id_edit: id, email_edit: email, password_edit: password},
                            success: function (data) {
                                $('[name="id_edit"]').val("");
                                $('[name="email_edit"]').val("");
                                $('[name="password_edit"]').val("");
                                $('#Modal_Edit').modal('hide');
                                show_product();
                            }
                        });


                    }
                });

                //Delete Records

                //get data for delete record
                $('#show_data').on('click', '.item_delete', function () {
                    var id = $(this).data('id');

                    $('#Modal_Delete').modal('show');
                    $('[name="id_delete"]').val(id);
                });
                //delete record to database
                $('#btn_delete').on('click', function () {
                    var id = $('#id_delete').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Ajax/DeleteUser') ?>",
                        dataType: "JSON",
                        data: {id: id},
                        success: function (data) {
                            $('#Modal_Delete').modal('hide');
                            //$('#Modal_Delete').modal('hide');
                            show_product();
                        }
                    });
                    return false;
                });
            }
            );
        </script>

        <!-- MODAL EDIT -->
        <form name="myform" id="myForm">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Id</label>
                                <div class="col-md-10">
                                    <input type="text" name="id_edit" id="id_edit" class="form-control" placeholder="id" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Password</label>
                                <div class="col-md-10">
                                    <input type="text" name="password_edit" id="password_edit" class="form-control" placeholder="****">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--END MODAL EDIT-->
        <!--MODAL DELETE-->
        <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure to delete this record?</strong>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--END MODAL DELETE-->
    </body>
</html>