<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="image_src" type="image/jpeg" href="<?php echo base_url('public/assets/admin/images/logo.png'); ?>" />
    <link rel="icon" href="<?php echo base_url('public/assets/admin/img/favicon.ico'); ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/admin/img/favicon.ico'); ?>" type="image/x-icon" />
    <!-- Site Properities -->
    <!--meta name="generator" content="Semantic-Ui" /-->
    <title><?= $title ?></title>
    <meta name="description" content="<?= $meta_description; ?>" />
    <meta name="keywords" content="<?= $meta_keywords; ?>" />
    <meta name="author" content="<?= $meta_author; ?>" />
    <link href="<?php echo base_url('public/assets/semantic-ui/semantic.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/admin/css/main.css'); ?>" rel="stylesheet" />
    <?php load_css_array($more_css); ?>
</head>
<body class="signin">

    <div class="ui container">
        <?php $this->load->view($view); ?>      
    </div>
    
    <?php load_js_array($more_js); ?>
</body>
</html>