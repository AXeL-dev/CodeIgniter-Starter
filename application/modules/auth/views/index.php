<div class="sixteen wide column">
    <div class="ui segments">
        <div class="ui segment">
            <h5 class="ui header">
                <?php echo lang('index_heading');?>
            </h5>
        </div>
        <div class="ui segment">
        	<?php if (isset($message) && ! empty($message)) { ?>
              	<div class="ui success message">
                    <i class="close icon"></i>
                  	<ul class="list"><?php echo $message; ?></ul>
              	</div>
            <?php } ?>

            <table class="ui celled sortable red selectable striped table">
                <thead class="full-width">
                    <tr>
                        <th><?php echo lang('index_fname_th');?></th>
						<th><?php echo lang('index_lname_th');?></th>
						<th><?php echo lang('index_email_th');?></th>
						<th><?php echo lang('index_groups_th');?></th>
						<th><?php echo lang('index_status_th');?></th>
						<th><?php echo lang('index_action_th');?></th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($users as $user):?>
						<tr>
				            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							<td>
								<?php foreach ($user->groups as $group):?>
									<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), 'class="ui blue label"'); ?>
				                <?php endforeach?>
							</td>
							<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, '<i class="large green checkmark link icon"></i>', array('title' => lang('index_active_link'))) : anchor("auth/activate/". $user->id, '<i class="large red remove link icon"></i>', array('title' => lang('index_inactive_link')));?></td>
							<td><?php echo anchor("auth/edit_user/".$user->id, '<i class="black pencil link icon"></i>', array('title' => lang('edit')));?></td>
						</tr>
					<?php endforeach;?>
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th colspan="6" class="right aligned">
                            <?php echo anchor('auth/create_group', '<i class="users icon"></i> '.lang('index_create_group_link'), array('class' => 'ui left floated small labeled icon button'))?>
                            <?php echo anchor('auth/create_user', '<i class="user icon"></i> '.lang('index_create_user_link'), array('class' => 'ui left floated small labeled icon button'))?>
                            <?php echo $pagination; ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
