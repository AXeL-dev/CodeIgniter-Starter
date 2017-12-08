<?php
    if (! isset($message_type) || empty($message_type)) {
        $message_type = 'error';
    }

    $dashboard_leftmenu       = isset($settings['DASHBOARD_LEFTMENU']) ? $settings['DASHBOARD_LEFTMENU'] : '';
    $dashboard_leftmenu_color = isset($settings['DASHBOARD_LEFTMENU_COLOR']) ? $settings['DASHBOARD_LEFTMENU_COLOR'] : '';
    $dashboard_topmenu_color  = isset($settings['DASHBOARD_TOPMENU_COLOR']) ? $settings['DASHBOARD_TOPMENU_COLOR'] : '';
?>

<div class="sixteen wide column">
    <div class="ui segments">
        <div class="ui segment">
            <h5 class="ui header">
                <?php echo lang('settings');?>
            </h5>
        </div>

        <?php echo form_open("admin/save_settings", array('class' => 'ui form segment '.$message_type));?>

            <?php if (isset($message) && ! empty($message)) { ?>
                <div class="ui <?php echo $message_type; ?> message">
                    <i class="close icon"></i>
                    <ul class="list"><?php echo $message; ?></ul>
                </div>
            <?php } ?>

            <div class="four fields mobile hidden">
                <div class="field">
                	<label><?php echo lang('dashboard_leftmenu'); ?></label>
                	<div class="ui compact selection dropdown">
                		<input type="hidden" name="dashboard_leftmenu" value="<?= $dashboard_leftmenu ?>">
                		<i class="dropdown icon"></i>
                		<div class="text"><?php echo $dashboard_leftmenu == 'thin' ? lang('minimalistic') : lang('default'); ?></div>
                		<div class="menu">
                			<div class="item<?php echo $dashboard_leftmenu == 'default' ? ' active' : ''; ?>" data-value="default" data-text="<?php echo lang('default'); ?>">
                				<i class="list layout icon"></i>
                				<?php echo lang('default'); ?>
                			</div>
                			<div class="item<?php echo $dashboard_leftmenu == 'thin' ? ' active' : ''; ?>" data-value="thin" data-text="<?php echo lang('minimalistic'); ?>">
                				<i class="ellipsis vertical icon"></i>
                				<?php echo lang('minimalistic'); ?>
                			</div>
                		</div>
    				</div>
                </div>
        	</div>

            <div class="field">
                <label><?php echo lang('dashboard_color'); ?></label>
                <div class="ui center padded aligned grid">
                    <div class="row">
                        <div class="column">
                            <h4 class="ui header"><?php echo lang('navbar_color'); ?></h4>

                            <ul class="colorlist" style="max-width: 100%;">
                                <?php $this->load->view('templates/admin/parts/colorlist'); ?>
                            </ul>
                            <?php echo form_hidden('dashboard_topmenu_color', $dashboard_topmenu_color); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <h4 class="ui header"><?php echo lang('sidebar_color'); ?></h4>

                            <ul class="sidecolor" style="max-width: 100%;">
                                <?php $this->load->view('templates/admin/parts/colorlist'); ?>
                            </ul>
                            <?php echo form_hidden('dashboard_leftmenu_color', $dashboard_leftmenu_color); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo form_submit('submit', lang('save'), array('class' => 'ui blue submit button')); ?>

        <?php echo form_close();?>
    </div>
</div>