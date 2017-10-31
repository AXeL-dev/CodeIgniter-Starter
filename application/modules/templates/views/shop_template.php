<html lang="fr">
<head>
    <!--
    <link rel="icon" href="<?= base_url('public/assets/img/index_f/logo_icone.png'); ?>">
    -->
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1,
    maximum-scale=1.0, user-scalable=no"/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="index, follow, noodp">
    <!-- CSS screen,projection,print -->
    <title><?= $title; ?></title>
    <!-- CSS  -->
    <!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
    <link href="<?= base_url('public/assets/semantic-ui/css/semantic.min.css'); ?>" type="text/css" rel="stylesheet"
          media="screen,print"/>
    <!--link href="<?= base_url('public/assets/font-awesome/font-awesome.min.css'); ?>" type="text/css" rel="stylesheet"
          media="screen,print"/-->
    <!--link href="<?= base_url('public/assets/my_assets/css/style.css'); ?>" type="text/css" rel="stylesheet"
          media="screen,print"/-->
    <!--link href="<?= base_url('public/assets/my_assets/css/mobile.css'); ?>" type="text/css" rel="stylesheet"
          media="only screen,print and (max-width: 767px)"/-->
    <!--link href="<?= base_url('public/assets/my_assets/css/tabs.css'); ?>" type="text/css" rel="stylesheet"
          media="only screen,print and (min-width: 768px) and (max-width: 991px)"/-->
    <!--link href="<?= base_url('public/assets/my_assets/css/desktop.css'); ?>" type="text/css" rel="stylesheet"
          media="only screen,print and (min-width: 992px) and (max-width: 1199px)"/-->
    <!--link href="<?= base_url('public/assets/my_assets/css/large.css'); ?>" type="text/css" rel="stylesheet"
          media="only screen,print and (min-width: 1200px) and (max-width: 1919px)"/-->
    <!--link href="<?= base_url('public/assets/my_assets/css/wide.css'); ?>" type="text/css" rel="stylesheet"
          media="only screen,print and (min-width: 1920px)"/-->

</head>
<!--style>
    main {
        flex: 1 0 auto;
    }

    .pusher {
        display: flex;
        overflow: visible;
        min-height: 100vh;
        flex-direction: column;
    }
</style-->
<body>
<!-- Side Nav -->
<?php $this->load->view('shop/sidebar'); ?>
<!-- Navbar-->
<div id="pusher" class="pusher">
    <main id="main">
        <header class="ui container">
            <?php $this->load->view('shop/navbar'); ?>
        </header>
        <!-- Content-->
        <br>
        <div class="ui container">
            <?php $this->load->view($view); ?>
        </div>
    </main>
    <!-- Footer -->
    <footer class="page-footer" style="padding-top: 5rem;">
        <?php $this->load->view('shop/footer'); ?>
    </footer>
</div>

<!--  Scripts-->
<script type="text/javascript" src="<?= base_url('public/assets/jquery/jquery-3.2.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/assets/semantic-ui/js/semantic.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/assets/my_assets/js/init.js'); ?>"></script>
<!--script>
    $(document).ready(function () {

    });
</script-->
</body>
</html>