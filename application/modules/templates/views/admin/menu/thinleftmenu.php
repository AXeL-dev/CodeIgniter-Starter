
<a href="<?php echo base_url('admin'); ?>" class="ui medium image borderless">
    <img src="<?php echo base_url('public/assets/admin/img/bg/6.png'); ?>" />
</a>

<div class="ui dropdown item">
    <i class="dashboard icon"></i>

    <div class="menu">
        <div class="header">
            <i class="dashboard icon"></i>
            <?php echo lang('dashboard'); ?>
        </div>
        <div class="ui divider"></div>
        <a class="item" href="<?php echo base_url('admin'); ?>">
            <?php echo lang('dashboard'); ?>
        </a>
      
    </div>
</div>

<div class="ui dropdown item">
    <i class="user icon"></i>

    <div class="menu">
        <div class="header">
            <i class="user icon"></i>
            <?php echo lang('users'); ?>
        </div>
        <div class="ui divider"></div>
        <a class="item" href="<?php echo base_url('auth'); ?>">
            <?php echo lang('users_list'); ?>
        </a>
        <a class="item" href="<?php echo base_url('auth/create_user'); ?>">
            <?php echo lang('new_user'); ?>
        </a>
        <a class="item" href="<?php echo base_url('auth/create_group'); ?>">
            <?php echo lang('new_group'); ?>
        </a>
    </div>
</div>

<div class="ui dropdown item">
    <i class="home icon"></i>

    <div class="menu">
        <div class="header">
            <i class="home icon"></i>
            <?php echo lang('back_to_home'); ?>
        </div>
        <div class="ui divider"></div>
        <a class="item" href="<?php echo base_url(); ?>">
            <?php echo lang('back_to_home'); ?>
        </a>
    </div>
</div>
