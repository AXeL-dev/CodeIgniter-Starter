<div class="column">
    <div class="ui segments">
        <div class="ui segment">
            <h5 class="ui header">
                <?php echo lang('create_group_heading');?>
            </h5>
        </div>
        <?php echo form_open("auth/create_group", array('class' => 'ui form segment error'));?>

            <?php if (isset($message) && ! empty($message)) { ?>
                <div class="ui error message">
                    <i class="close icon"></i>
                    <ul class="list"><?php echo $message; ?></ul>
                </div>
            <?php } ?>

            <p><?php echo lang('create_group_subheading');?></p>
            <div class="field required">
                <?php echo lang('create_group_name_label', 'group_name');?>
            	<?php echo form_input($group_name);?>
            </div>
            <div class="field">
                <?php echo lang('create_group_desc_label', 'description');?>
            	<?php echo form_input($description);?>
            </div>
            <?php echo form_submit('submit', lang('create_group_submit_btn'), array('class' => 'ui blue submit button'));?>
        <?php echo form_close();?>
    </div>
</div>
