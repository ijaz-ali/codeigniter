<style>
    .form-control {
        color: #c33455 !important;
    }
</style>
<div class="header_bg">

    <div class="header container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        if (isset($fetch_data)) {
                            echo "Update Employee";
                        } else {
                            ?>
                            Add Employee<?php } ?></div>
                    <div class="panel-body">

                        <form method="post" action="<?php
                        if (isset($fetch_data)) {
                            echo base_url('Login/UpdateEmployee');
                        } else {
                            echo base_url('Login/SubmitEmployee');
                        }
                        ?>">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" value=" <?php
                                if (isset($fetch_data)) {
                                    echo $fetch_data[0]->first_name;
                                } else {
                                    echo set_value('first_name');
                                }
                                ?>" id="first_name">
                                <span><?php echo form_error("first_name"); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php
                                if (isset($fetch_data)) {
                                    echo $fetch_data[0]->last_name;
                                } else {
                                    echo set_value('last_name');
                                }
                                ?> ">
                                <span><?php echo form_error("last_name"); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php
                                if (isset($fetch_data)) {
                                    echo $fetch_data[0]->email;
                                } else {
                                    echo set_value('email');
                                }
                                ?>">
                                <span><?php echo form_error("email"); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php
                                if (isset($fetch_data)) {
                                    echo $fetch_data[0]->username;
                                } else {
                                    echo set_value('username');
                                }
                                ?>">
                                <span><?php echo form_error("username"); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Cell No</label>
                                <input type="text"  class="form-control" name="cell" id="cell" value="<?php
                                if (isset($fetch_data)) {
                                    echo $fetch_data[0]->cell;
                                } else {
                                    echo set_value('cell');
                                }
                                ?>">
                                <span><?php echo form_error("cell"); ?></span>
                            </div>


                            <div class="checkbox">
                                <label><input type="checkbox"> Remember me</label>
                            </div>
                            <input type="hidden" name="id" value="<?php
                            if (isset($fetch_data)) {
                                echo $fetch_data[0]->id;
                            }
                            ?>">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- //header-ends -->
