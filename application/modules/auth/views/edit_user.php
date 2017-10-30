<div class="column">
    <div class="ui segments">
        <div class="ui segment">
            <h5 class="ui header">
                <?php echo lang('edit_user_heading');?>
            </h5>
        </div>
        <?php echo form_open(uri_string(), array('class' => 'ui form segment error'));?>

            <?php if (isset($message) && ! empty($message)) { ?>
                <div class="ui error message">
                    <i class="close icon"></i>
                    <ul class="list"><?php echo $message; ?></ul>
                </div>
            <?php } ?>

            <p><?php echo lang('edit_user_subheading');?></p>
            <div class="two fields">
                <div class="field required">
                    <?php echo lang('edit_user_fname_label', 'first_name');?>
                    <?php echo form_input($first_name);?>
                </div>
                <div class="field required">
                    <?php echo lang('edit_user_lname_label', 'last_name');?>
                    <?php echo form_input($last_name);?>
                </div>
            </div>
            <div class="two fields">
                <div class="field required">
                    <?php echo lang('edit_user_company_label', 'company');?>
                    <?php echo form_input($company);?>
                </div>
                <div class="field required">
                    <?php echo lang('edit_user_phone_label', 'phone');?>
                    <?php echo form_input($phone);?>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <?php echo lang('edit_user_password_label', 'password');?>
                    <?php echo form_input($password);?>
                </div>
                <div class="field">
                    <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
                    <?php echo form_input($password_confirm);?>
                </div>
            </div>

            <?php if ($this->ion_auth->is_admin()): ?>

                <div class="inline fields">
                    <label for="colors"><?php echo lang('edit_user_groups_heading');?></label>
                    <?php foreach ($groups as $group):?>
                        <div class="field">
                            <div class="ui checkbox checked">
                                <?php
                                    $gID=$group['id'];
                                    $checked = null;
                                    $item = null;
                                    foreach($currentGroups as $grp) {
                                        if ($gID == $grp->id) {
                                            $checked= ' checked="checked"';
                                        break;
                                        }
                                    }
                                ?>
                                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                <label><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></label>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>

            <?php endif ?>

            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>

            <?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class' => 'ui blue submit button'));?>
        <?php echo form_close();?>
    </div>
</div>
