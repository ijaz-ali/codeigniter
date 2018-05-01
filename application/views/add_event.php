<html>
    <head>
        <title>Calendar</title>
        <link rel='stylesheet' href='<?php echo base_url('assets/css/'); ?>bootstrap.min.css' />
    </head>
    <body class="container">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>            