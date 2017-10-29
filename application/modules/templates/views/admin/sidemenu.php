
<?php
    $dashboard_active = $this->uri->segment(1) == 'admin' ? ' active' : '';
    $users_active = $this->uri->segment(1) == 'auth' ? ' active' : '';
?>

<div class="ui visible left vertical sidebar menu no-border sidemenu">

    <a href="<?php echo base_url(); ?>admin" class="ui medium image borderless">
        <img src="<?php echo base_url(); ?>public/assets/admin/img/bg/3.png" />
    </a>
    <a class="item">
        <b>Main</b>
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
            <b>Components</b>
        </a>

        <div class="title">
            <i class="dropdown icon"></i>
            UI-Kit
        </div>
        <div class="content">
            <a class="item" href="accordion.html">
                Accordion
            </a>
            <a class="item" href="breadcrumb.html">
                Breadcrumb
            </a>
            <a class="item" href="button.html">
                Button
            </a>
            <a class="item" href="divider.html">
                Divider
            </a>
            <a class="item" href="dropdown.html">
                Dropdown
            </a>
            <a class="item" href="flag.html">
                Flag
            </a>
            <a class="item" href="icon.html">
                Icon
            </a>
            <a class="item" href="image.html">
                Image
            </a>
            <a class="item" href="label.html">
                Label
            </a>
            <a class="item" href="list.html">
                List
            </a>
            <a class="item" href="modal.html">
                Modal
            </a>
            <a class="item" href="notification.html">
                Notification
            </a>
            <a class="item" href="alert.html">
                Alert
            </a>

            <a class="item" href="progress.html">
                Progress
            </a>
            <a class="item" href="range-v1.html">
                Range Semantic
            </a>
            <a class="item" href="range-v2.html">
                Range Material
            </a>
            <a class="item" href="rating.html">
                Rating
            </a>
            <a class="item" href="tab.html">
                Tab
            </a>
            <a class="item" href="tooltip.html">
                Tooltip
            </a>
            <a class="item" href="transition.html">
                Transition
            </a>
        </div>

        <div class="title">
            <i class="dropdown icon"></i>
            Pages
        </div>
        <div class="content">
            <a class="item" href="profile.html">
                Profile
            </a>

            <a class="item" href="settings.html">
                Settings
            </a>

            <a class="item" href="blank.html">
                Blank
            </a>
            <a class="item" href="signin.html">
                Sign In
            </a>
            <a class="item" href="signup.html">
                Sign Up
            </a>
            <a class="item" href="forgotpassword.html">
                Forgot Password
            </a>
            <a class="item" href="lockme.html">
                Lock Me Screen
            </a>
            <a class="item" href="404.html">
                Error 404
            </a>
            <a class="item" href="comingsoon.html">
                Coming Soon
            </a>
        </div>

        <div class="title">
            <i class="dropdown icon"></i>
            Form
        </div>
        <div class="content">
             <a class="item" href="formelements.html">
                Form Element
            </a>
            <a class="item" href="input.html">
                Input
            </a>
            <a class="item" href="formvalidation.html">
                Form Validation
            </a>

            <a class="item" href="editor.html">
                Html Editor
            </a>
        </div>

        <div class="title">
            <i class="dropdown icon"></i>
            Tables
        </div>
        <div class="content">
            <a class="item" href="table.html">
                Static Table
            </a>
            <a class="item" href="datatable.html">
                Datatable
            </a>
            <a class="item" href="editable.html">
                Editable
            </a>
        </div>
        <div class="title">
            <i class="dropdown icon"></i>
            Chart
        </div>
        <div class="content">
            <a class="item" href="chart.html">
                Charts 1
            </a>
            <a class="item" href="chart-2.html">
                Charts 2
            </a>
            <a class="item" href="chart-3.html">
                Charts 3
            </a>
        </div>

        <a class="item">
            <b>Help</b>
        </a>
        <a class="item" href="document.html">
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