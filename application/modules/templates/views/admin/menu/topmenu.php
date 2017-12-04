
<?php $this->load->view('langdropdown'); ?>

<div class="ui dropdown item">
    <img class="ui mini circular image" src="<?php echo base_url('public/assets/admin/img/avatar/people/Rick.png'); ?>">
    <div class="menu">
        <a class="item" href="<?php echo base_url('auth/edit_user/'.$this->ion_auth->get_user_id()); ?>"><?php echo lang('profile'); ?></a>
        <!--a class="item" href="<?php echo base_url('admin/settings'); ?>"><?php echo lang('settings'); ?></a-->
        <div class="ui divider"></div>
        <a class="item" href="<?php echo base_url('auth/logout'); ?>"><?php echo lang('logout_link'); ?></a>
    </div>
</div>
