
<div class="ui fixed main menu push no-border no-radius sidemenu2 borderless <?php echo $this->session->userdata('topmenu_color'); ?>">
   
        <a class="launch icon item" style="padding-top:20px">
            <i class="content icon"></i>
        </a>

        <div class="right menu">

            <?php $this->load->view('admin/menu/topmenu'); ?>

        </div>

</div>