<div class="column">
    <div class="ui segments">
        <div class="ui segment">
            <h5 class="ui header">
                <?php echo lang('create_user_heading');?>
            </h5>
        </div>
        <?php echo form_open("auth/create_user", array('class' => 'ui form segment error'));?>

            <?php if (isset($message) && ! empty($message)) { ?>
                <div class="ui error message">
                    <i class="close icon"></i>
                    <ul class="list"><?php echo $message; ?></ul>
                </div>
            <?php } ?>

            <p><?php echo lang('create_user_subheading');?></p>
            <div class="two fields">
                <div class="field required">
                    <?php echo lang('create_user_fname_label', 'first_name');?>
                    <?php echo form_input($first_name);?>
                </div>
                <div class="field required">
                    <?php echo lang('create_user_lname_label', 'last_name');?>
                    <?php echo form_input($last_name);?>
                </div>
            </div>
            <?php
                if($identity_column!=='email') {
                    echo '<div class="field required">';
                    echo lang('create_user_identity_label', 'identity');
                    echo form_error('identity');
                    echo form_input($identity);
                    echo '</div>';
                }
            ?>
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
            <div class="field required">
                <?php echo lang('create_user_email_label', 'email');?>
                <?php echo form_input($email);?>
            </div>
            <div class="two fields">
                <div class="field required">
                    <?php echo lang('create_user_password_label', 'password');?>
                    <?php echo form_input($password);?>
                </div>
                <div class="field required">
                    <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                    <?php echo form_input($password_confirm);?>
                </div>
            </div>
            <?php echo form_submit('submit', lang('create_user_submit_btn'), array('class' => 'ui blue submit button'));?>
        <?php echo form_close();?>
    </div>
</div>
