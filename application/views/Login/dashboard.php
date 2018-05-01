<html>
    <head>
        <title>dashboard</title>
        
    </head>
    <body>
        <h1>Welcome 
        <?php if($this->session->userdata('email')){ ?>
        <h3><a href="" ><?php echo $this->session->userdata('email') ?></a></h3>
        <?php } ?>
        </h1>
        <br><br><br>
        <?php if($this->session->userdata('logged_in')){ ?>
        <h3><a href="<?php echo base_url('Login/Logout');?>" >Logout</a></h3>
        <?php } ?>
    </body>
</html> 