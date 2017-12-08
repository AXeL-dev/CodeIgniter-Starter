<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="image_src" type="image/jpeg" href="<?php echo base_url('public/assets/admin/images/logo.png'); ?>" />
    <link rel="icon" href="<?php echo base_url('public/assets/admin/img/favicon.ico'); ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/admin/img/favicon.ico'); ?>" type="image/x-icon" />
    <!-- Site Properities -->
    <!--meta name="generator" content="Semantic-Ui"-->
    <title><?= $title; ?></title>
    <meta name="description" content="<?= $meta_description; ?>" />
    <meta name="keywords" content="<?= $meta_keywords; ?>" />
    <meta name="author" content="<?= $meta_author; ?>" />
    <link href="<?php echo base_url('public/assets/admin/semantic-ui/semantic.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/admin/css/main.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/custom/css/media.css'); ?>" type="text/css" rel="stylesheet" />
    <script src="<?php echo base_url('public/assets/admin/js/jquery-2.1.4.min.js'); ?>"></script>
    <?php load_css_array($more_css); ?>
</head>
<body class="admin">
    <!--sidebar mobile-->
    <div class="ui vertical push sidebar menu <?php echo $this->session->userdata('leftmenu_color'); ?>" id="toc">
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
            <div class="toc"<?php echo $this->session->userdata('default_menu') == 'thin' ? ' style="width: 100px;"' : ''; ?>>
                <?php $this->load->view('admin/sidebar'); ?>
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
    <script src="<?php echo base_url('public/assets/admin/plugins/nicescrool/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/admin/semantic-ui/semantic.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/admin/js/app.js'); ?>"></script>
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
        var leftmenu_color = '<?php echo $this->session->userdata('leftmenu_color'); ?>';
        var topmenu_color = '<?php echo $this->session->userdata('topmenu_color'); ?>';
    </script>
    <script src="<?php echo base_url('public/assets/custom/js/search.js'); ?>"></script>
    <?php load_js_array($more_js); ?>
</body>
</html>