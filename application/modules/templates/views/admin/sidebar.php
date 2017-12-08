<?php
	$default_menu = $this->session->userdata('default_menu');

	$leftmenu_view = $default_menu == 'thin' ? 'menu/thinleftmenu' : 'menu/leftmenu';

	$leftmenu_class = $default_menu == 'thin' ? 'ui visible left vertical labeled icon uncover sidebar menu no-border very thin sidemenu thinside' : 'ui visible left vertical sidebar menu no-border sidemenu';

	$leftmenu_class.= ' '.$this->session->userdata('leftmenu_color');
?>

<div class="<?php echo $leftmenu_class; ?>">

    <?php $this->load->view($leftmenu_view); ?>

</div>