<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="image_src" type="image/jpeg" href="<?php echo base_url(); ?>public/assets/admin/images/logo.png" />
    <link rel="icon" href="<?php echo base_url(); ?>public/assets/admin/img/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/admin/img/favicon.ico" type="image/x-icon" />
    <!-- Site Properities -->
    <meta name="generator" content="Semantic-Ui" />
    <title><?= $title ?></title>
    <meta name="description" content="Sign in" />
    <meta name="keywords" content="html5, ,semantic,ui, library, framework, javascript,jquery,admin,theme" />
    <link href="<?php echo base_url(); ?>public/assets/admin/dist/semantic.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/admin/css/main.min.css" rel="stylesheet" />
</head>
<body class="signin">

    <div class="ui container">
        <?php $this->load->view($view); ?>      
    </div>
    
</body>
</html>