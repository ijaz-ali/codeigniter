
<!DOCTYPE HTML>
<html>
    <head>
        <title> Dashboard | Home </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/'); ?>css/style.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="<?php echo base_url('assets/'); ?>css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/icon-font.min.css" type='text/css' />
        <script src="<?php echo base_url('assets/'); ?>js/amcharts.js"></script>	
        <script src="<?php echo base_url('assets/'); ?>js/serial.js"></script>	
        <!-- //lined-icons -->
        <script src="<?php echo base_url('assets/'); ?>js/jquery-1.10.2.min.js"></script>
        <!--pie-chart- -->
        <script src="<?php echo base_url('assets/'); ?>js/pie-chart.js" type="text/javascript"></script>
       
        <!--DataTables CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
        <!--DataTables Css-->
        <!--Data Tables Js-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
              <!--Data Tables Js-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#demo-pie-1').pieChart({
                    barColor: '#3bb2d0',
                    trackColor: '#eee',
                    lineCap: 'round',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-2').pieChart({
                    barColor: '#fbb03b',
                    trackColor: '#eee',
                    lineCap: 'butt',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-3').pieChart({
                    barColor: '#ed6498',
                    trackColor: '#eee',
                    lineCap: 'square',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });


            });

        </script>
    </head> 
    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="inner-content">
                    <!-- header-starts -->
                    <div class="header-section">
                        <!-- top_bg -->
                        <div class="top_bg">

                            <div class="header_top">
                                <div class="top_right">
                                    <ul>
                                        <li><a href="contact.html">help</a></li>|
                                        <li><a href="contact.html">Contact</a></li>|
                                        <li><a href="checkout.html">Delivery information</a></li>
                                    </ul>
                                </div>
                                <div class="top_left">
                                    <h2><span></span> Call us : 032 2352 782</h2>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <!-- /top_bg -->
                    </div>