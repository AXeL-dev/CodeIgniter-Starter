<div class="sixteen wide column">
    <div class="ui segments">
        <div class="ui segment">
            <h5 class="ui header">
                <?php echo lang('deactivate_heading');?>
            </h5>
        </div>
        <div class="ui segment">
            <?php echo form_open("auth/deactivate/".$user->id, array('class' => 'ui form'));?>
                <div class="inline fields">
                    <label><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="confirm" value="yes" checked="checked" />
                            <label><?php echo lang('deactivate_confirm_y_label');?></label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="confirm" value="no" />
                            <label><?php echo lang('deactivate_confirm_n_label');?></label>
                        </div>
                    </div>
                </div>

                <?php echo form_hidden($csrf); ?>
                <?php echo form_hidden(array('id'=>$user->id)); ?>

                <?php echo form_submit('submit', lang('deactivate_submit_btn'), array('class' => 'ui blue submit button'));?>

            <?php echo form_close();?>
        </div>
    </div>
</div>
