<div class="ui segments">
    <div class="ui segment no-padding">
        <h5 class="ui top attached center aligned blueli inverted header">
            <?php echo lang('register_heading');?>
        </h5>
    </div>
    <div class="ui segment">

        <?php if (isset($message) && ! empty($message)) { ?>
            <div class="ui error message">
                <ul class="list"><?php echo $message; ?></ul>
            </div>
        <?php } ?>

        <?php echo form_open("auth/signup", array('class' => 'ui form segment'));?>
            <p><?php echo lang('register_subheading');?></p>
            <div class="two fields">
                <div class="required field">
                    <?php echo lang('create_user_fname_label', 'first_name');?>
                    <?php echo form_input($first_name);?>
                </div>
                <div class="required field">
                    <?php echo lang('create_user_lname_label', 'last_name');?>
                    <?php echo form_input($last_name);?>
                </div>
                <?php if($identity_column!=='email') { ?>
                    <div class="required field">
                        <?php
                            echo lang('create_user_identity_label', 'identity');
                            echo form_error('identity');
                            echo form_input($identity);
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="two fields">
                <div class="field">
                    <?php echo lang('create_user_company_label', 'company');?>
                    <?php echo form_input($company);?>
                </div>
                <div class="field">
                    <?php echo lang('create_user_phone_label', 'phone');?>
                    <?php echo form_input($phone);?>
                </div>
            </div>
            <div class="required field">
                <?php echo lang('create_user_email_label', 'email');?>
                <?php echo form_input($email);?>
            </div>
            <div class="two fields">
                <div class="required field">
                    <?php echo lang('create_user_password_label', 'password');?>
                    <?php echo form_input($password);?>
                </div>
                <div class="required field">
                    <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                    <?php echo form_input($password_confirm);?>
                </div>
            </div>

            <button class="ui blue submit fluid button"><?php echo lang('register_link');?></button>

        <?php echo form_close();?>
    </div>
    <div class="ui  center aligned segment">
        <?php echo lang('register_after');?> <a href="login" class="ui"><?php echo lang('login_heading');?></a>
    </div>
</div>
<!--script src="<?php echo base_url(); ?>public/assets/admin/js/jquery-2.1.4.min.js"></script-->
<!--script src="<?php echo base_url(); ?>public/assets/admin/dist/semantic.min.js"></script-->
<!--script>
    $('.ui.dropdown').dropdown();
</script-->
