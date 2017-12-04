<html lang="fr">
    <head>
        <link rel="icon" href="<?php echo base_url('public/assets/admin/img/favicon.ico'); ?>" type="image/x-icon" />
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,
        maximum-scale=1.0, user-scalable=no"/>
        <meta name="keywords" content="<?= $meta_keywords; ?>">
        <meta name="description" content="<?= $meta_description; ?>">
        <meta name="author" content="<?= $meta_author; ?>">
        <meta name="robots" content="index, follow, noodp">
        <title><?= $title; ?></title>
        <!-- CSS  -->
        <link href="<?= base_url('public/assets/semantic-ui/css/semantic.min.css'); ?>" type="text/css" rel="stylesheet"
              media="screen,print"/>
        <link href="<?= base_url('public/assets/custom/css/init.css'); ?>" type="text/css" rel="stylesheet" />
        <?php load_css_array($more_css); ?>
    </head>
    <body>
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

        <!-- Scripts -->
        <script type="text/javascript" src="<?= base_url('public/assets/jquery/jquery-3.2.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/assets/semantic-ui/js/semantic.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/assets/custom/js/init.js'); ?>"></script>
        <?php load_js_array($more_js); ?>
    </body>
</html>