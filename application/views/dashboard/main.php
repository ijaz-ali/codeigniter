
<div class="header_bg">

    <div class="header container">
        <div class="row">
            <div class="col-md-4">
                <h1>WELCOME
                    <?php if ($this->session->userdata('email')) { ?>
                        <h3><a href="" ><?php echo $this->session->userdata('email') ?></a></h3>
                    <?php } ?>
                </h1>
            </div>
        </div>
    </div>

</div>
<!-- //header-ends -->