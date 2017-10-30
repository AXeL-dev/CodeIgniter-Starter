
<?php
    $dashboard_active = $this->uri->segment(1) == 'admin' ? ' active' : '';
    $users_active = $this->uri->segment(1) == 'auth' ? ' active' : '';
?>

<div class="ui visible left vertical sidebar menu no-border sidemenu">

    <a href="<?php echo base_url(); ?>admin" class="ui medium image borderless">
        <img src="<?php echo base_url(); ?>public/assets/admin/img/bg/3.png" />
    </a>
    <a class="item">
        <b><?php echo lang('main'); ?></b>
    </a>

    <div class="ui accordion">
        <div class="title<?= $dashboard_active ?>">
            <i class="dropdown icon"></i>
            <?php echo lang('dashboard'); ?>  <a class="ui mini red label"><?php echo lang('new'); ?></a>
        </div>
        <div class="content<?= $dashboard_active ?>">
            <a class="item" href="<?php echo base_url(); ?>admin">
                <?php echo lang('dashboard'); ?> <i class="dashboard icon"></i>
            </a>
          
        </div>

        <a class="item">
            <b><?php echo lang('advanced'); ?></b>
        </a>

        <div class="title<?= $users_active ?>">
            <i class="dropdown icon"></i>
            <?php echo lang('users'); ?>
        </div>
        <div class="content<?= $users_active ?>">
            <a class="item" href="<?php echo base_url(); ?>auth">
                <?php echo lang('users_list'); ?>
            </a>
            <a class="item" href="<?php echo base_url(); ?>auth/create_user">
                <?php echo lang('new_user'); ?>
            </a>
            <a class="item" href="<?php echo base_url(); ?>auth/create_group">
                <?php echo lang('new_group'); ?>
            </a>
        </div>

        <a class="item">
            <b>Help</b>
        </a>
        <a class="item" href="#">
            <i class="question icon"></i> Documentation
        </a>
       
        <a class="item">
            <div class="ui red empty circular label"></div>
            Important
        </a>

        <a class="item">
            <div class="ui orange empty circular label"></div>
            Warning
        </a>

        <a class="item">
            <div class="ui blue empty circular label"></div>
            Info
        </a>
    </div>
</div>