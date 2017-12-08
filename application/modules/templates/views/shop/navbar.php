<?php
	$user_is_logged_in = $this->ion_auth->logged_in();
?>

<nav class="ui large stackable menu">
	<div class="item">
		<img class="logo" src="<?php echo base_url('public/assets/admin/img/thumblogo.png'); ?>">
        <a href="<?= base_url();?>">Home</a>
    </div>
	<a href="<?= base_url('shop/contact'); ?>" class="item"><?= lang('contact'); ?></a>
	<div class="right menu">
	    <div class="item">
	    	<?php if (! $user_is_logged_in) { ?>
	        	<a href="<?php echo base_url('auth/login'); ?>" class="ui primary button"><?php echo lang('login_heading'); ?></a>
	        <?php } else { ?>
	        	<a href="<?php echo base_url('auth/logout'); ?>" class="ui button"><?php echo lang('logout_link'); ?></a>
	        <?php } ?>
	    </div>
    </div>
</nav>
