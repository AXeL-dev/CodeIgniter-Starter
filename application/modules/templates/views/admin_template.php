<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="image_src" type="image/jpeg" href="<?php echo base_url(); ?>public/assets/admin//images/logo.png" />
    <link rel="icon" href="<?php echo base_url(); ?>public/assets/admin/img/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/admin/<?php echo base_url(); ?>public/assets/admin/img/favicon.ico" type="image/x-icon" />
    <!-- Site Properities -->
    <meta name="generator" content="Semantic-Ui" />
    <title><?= $title; ?></title>
    <meta name="description" content="Admin Panel" />
    <meta name="keywords" content="html5, ,semantic,ui, library, framework, javascript,jquery,admin,theme" />
    <link href="<?php echo base_url(); ?>public/assets/admin/plugins/chartist/chartist.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/admin/plugins/datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/admin/dist/semantic.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/admin/css/main.css" rel="stylesheet" />
    <!--link href="<?php echo base_url(); ?>public/assets/admin/plugins/pacejs/pace.css" rel="stylesheet" /-->
    <script src="<?php echo base_url(); ?>public/assets/admin/js/jquery-2.1.4.min.js"></script>
</head>
<body class="admin">
    <!--sidebar mobile-->
    <div class="ui vertical push sidebar menu  thin" id="toc">
        <?php $this->load->view('admin/mobile/mobilesidebar'); ?>
    </div>
    <!--sidebar mobile-->
    <!--navbar mobile-->
    <div class="mobilenavbar">
        <?php $this->load->view('admin/mobile/mobilenavbar'); ?>
    </div>
    <!--navbar mobile-->

    <div class="pusher">
        <div class="full height">
            <!--Load Sidebar Menu In App.js loadhtml function-->
            <div class="toc">
                <?php $this->load->view('admin/sidemenu'); ?>
            </div>
            <!--Load Sidebar Menu In App.js loadhtml function-->

            <div class="article">

                <!--Load Navbar Menu In App.js loadhtml function-->
                <div class="navbarmenu">
                    <?php $this->load->view('admin/navbar'); ?>
                </div>
                <!--Load Navbar Menu In App.js loadhtml function-->
                <!--Begin Container-->
                <div class="containerli">
                    <div class="ui equal width left aligned padded grid stackable">
                        <div class="row">
                            <?php $this->load->view($view); ?>
                        </div>
                    </div>
                </div>
                <!--Finish Container-->
                <!--Load Footer Menu In App.js loadhtml function-->
                <div class="footer">
                    <?php $this->load->view('admin/footer'); ?>
                </div>
                <!--Load Footer Menu In App.js loadhtml function-->
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>public/assets/admin/plugins/nicescrool/jquery.nicescroll.min.js"></script>
    <!--script src="<?php echo base_url(); ?>public/assets/admin/js/raphael.min.js"></script-->
    <script src="<?php echo base_url(); ?>public/assets/admin/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/dist/semantic.min.js"></script>
    <!--script data-pace-options='{ "ajax": false }' src="<?php echo base_url(); ?>public/assets/admin/plugins/pacejs/pace.js"></script-->
    <!--script src="<?php echo base_url(); ?>public/assets/admin/plugins/morris/morris.min.js"></script-->
    <!--script src="<?php echo base_url(); ?>public/assets/admin/js/customjs/custom-dashboard.js"></script-->
    <script src="<?php echo base_url(); ?>public/assets/admin/js/app.js"></script>
</body>
</html>