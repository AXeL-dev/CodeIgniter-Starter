<div class="ui fixed top  menu no-border no-radius borderless navmenu">
    <a class="item active no-padding logo" style="width:250px;" href="dashboard.html">

        <img class="ui image logoImg" src="<?php echo base_url(); ?>public/assets/admin/img/logo.png" />
    </a>
    <!--a class="item hamburger" data-name="show">
        <i class="align justify icon"></i>
    </a-->
    <div class="right menu">
        <div class="ui right aligned category search item">
            <div class="ui transparent icon input">
                <input class="prompt" type="text" placeholder="<?php echo lang('search'); ?>">
                <i class="search link icon"></i>
            </div>
            <div class="results"></div>
        </div>
        <div class="ui dropdown item">
            <?php echo lang('language'); ?> <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item"><i class="united kingdom flag"></i><?php echo lang('english'); ?></a>
                <a class="item"><i class="france flag"></i><?php echo lang('french'); ?></a>
            </div>
        </div>
        <div class="ui dropdown item">
            <img class="ui mini circular image" src="<?php echo base_url(); ?>public/assets/admin/img/avatar/people/Enid.png">
            <div class="menu">
                <a class="item" href="<?php echo base_url().'auth/edit_user/'.$this->ion_auth->get_user_id(); ?>"><?php echo lang('profile'); ?></a>
                <a class="item" href="#"><?php echo lang('settings'); ?></a>
                <div class="ui divider"></div>
                <a class="item" href="<?php echo base_url(); ?>auth/logout"><?php echo lang('logout_link'); ?></a>
            </div>
        </div>
    </div>
</div>