<div class="ui fixed top  menu no-border no-radius borderless navmenu">
    <a class="item active no-padding logo" href="dashboard.html" <?php echo $this->session->userdata('default_menu') == 'thin' ? 'style="width: 100px;"' : 'style="width: 250px;"'; ?>>

        <img class="ui image logoImg" src="<?php echo base_url('public/assets/admin/img/logo.png'); ?>" />
    </a>
    <a class="item hamburger" href="<?php echo base_url('admin/switch_menu'); ?>" data-name="show">
        <i class="align justify icon"></i>
    </a>
    <div class="right menu">
        <div class="ui right aligned search item">
            <div class="ui icon input">
                <input class="prompt" type="text" placeholder="<?php echo lang('search'); ?>">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
        
        <?php $this->load->view('menu/topmenu'); ?>

    </div>
</div>