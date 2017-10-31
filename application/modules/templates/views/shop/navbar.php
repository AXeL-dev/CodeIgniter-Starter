<nav class="ui large stackable menu">
	<div class="item">
		<img class="logo" src="<?php echo base_url(); ?>public/assets/admin/img/thumblogo.png">
        <a href="<?= base_url();?>">Home</a>
    </div>
	<a href="#" class="item">Blog</a>
	<a href="#" class="item">Articles</a>
	<a href="#" class="ui dropdown item">
	Dropdown <i class="dropdown icon"></i>
	<div class="menu">
	  <div class="item">Link Item</div>
	  <div class="item">Link Item</div>
	  <div class="divider"></div>
	  <div class="header">Header Item</div>
	  <div class="item">
	    <i class="dropdown icon"></i>
	    Sub Menu
	    <div class="menu">
	      <div class="item">Link Item</div>
	      <div class="item">Link Item</div>
	    </div>
	  </div>
	  <div class="item">Link Item</div>
	</div>
	</a>
	<div class="right menu">
    	<a class="item" onclick="$('.ui.sidebar').sidebar('setting', 'transition', 'overlay').sidebar('toggle');">
	        <i class="large sidebar icon"></i>
	    </a>
	    <div class="item">
	    	<?php if (! $this->ion_auth->logged_in()) { ?>
	        	<a href="<?php echo base_url(); ?>auth/login" class="ui primary button"><?php echo lang('login_heading'); ?></a>
	        <?php } else { ?>
	        	<a href="<?php echo base_url(); ?>auth/logout" class="ui button"><?php echo lang('logout_link'); ?></a>
	        <?php } ?>
	    </div>
    </div>
</nav>
