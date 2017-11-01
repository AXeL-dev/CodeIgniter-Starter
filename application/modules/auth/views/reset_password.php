<div class="ui equal width center aligned padded grid stackable">
    <div class="row">
        <div class="five wide column">
            <div class="ui segments">
                <div class="ui segment inverted nightli">
                    <h3 class="ui header">
                        <?php echo lang('reset_password_heading');?>
                    </h3>
                </div>
                <div class="ui segment">
                    <?php if (isset($message) && ! empty($message)) { ?>
                        <div class="ui error message">
                            <ul class="list"><?php echo $message; ?></ul>
                        </div>
                    <?php } ?>

                    <?php echo form_open('auth/reset_password/' . $code);?>

                        <div class="ui input fluid">
                        	<?php echo form_input($new_password, '', 'placeholder="'.sprintf(lang('reset_password_new_password_label'), $min_password_length).'"');?>
                        </div>
                        <div class="ui divider hidden"></div>
                        <div class="ui input fluid">
                        	<?php echo form_input($new_password_confirm, '', 'placeholder="'.lang('reset_password_new_password_confirm_label').'"');?>
                        </div>
                        <div class="ui divider hidden"></div>

                        <?php echo form_input($user_id);?>
                        <?php echo form_hidden($csrf); ?>

                        <button class="ui primary fluid button">
                            <i class="key icon"></i>
                            <?php echo lang('reset_password_submit_btn'); ?>
                        </button>

                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
