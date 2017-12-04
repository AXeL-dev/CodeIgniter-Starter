<div class="ui dropdown item">
	<?php echo lang('language'); ?> <i class="dropdown icon"></i>
	<div class="menu">
	    <?php foreach(Modules::run('admin/_get_languages') as $lang) { ?>
	        <a href="<?php echo base_url('admin/set_lang/'.$lang->abbr); ?>" class="item<?php echo $lang->active ? ' active selected' : ''; ?>"><i class="<?php echo $lang->flag; ?> flag"></i><?php echo lang($lang->name); ?></a>
	    <?php } ?>
	</div>
</div>