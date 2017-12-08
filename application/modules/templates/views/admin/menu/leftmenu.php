<?php
    $users_active = $this->uri->segment(1) == 'auth' ? ' active' : '';
?>

<a href="<?php echo base_url('admin'); ?>" class="ui medium image borderless">
    <img src="<?php echo base_url('public/assets/admin/img/bg/6.png'); ?>" />
</a>

<a class="item" href="<?php echo base_url('admin'); ?>">
    <span>
        <i class="dashboard icon"></i>
        <?php echo lang('dashboard'); ?>
    </span>
</a>

<div class="ui accordion right">

    <div class="ui item title<?= $users_active ?>">
        <i class="dropdown icon"></i>
        <span>
            <i class="user icon"></i>
            <?php echo lang('users'); ?>
        </span>
    </div>
    <div class="ui content<?= $users_active ?>">
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

<div class="ui fitted divider"></div>

<a class="item" href="<?php echo base_url(); ?>">
    <span>
        <i class="home icon"></i>
        <?php echo lang('back_to_home'); ?>
    </span>
</a>