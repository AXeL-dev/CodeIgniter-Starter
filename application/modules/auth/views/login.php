<?php
if(!isset($identity) || !isset($password)):
    $identity = array(
        'name' => 'identity',
        'id' => 'identity',
        'type' => 'text',
        'value' => '',
    );
    $password = array(
        'name' => 'password',
        'id' => 'password',
        'type' => 'password',
    );
endif;
?>

<div class="ui equal width center aligned padded grid stackable">
    <div class="row">
        <div class="five wide column">
            <div class="ui segments">
                <div class="ui segment inverted nightli">
                    <h3 class="ui header">
                        <?php echo lang('login_heading');?>
                    </h3>
                </div>
                <div class="ui segment">
                    <?php if (isset($message) && ! empty($message)) { ?>
                        <div class="ui error message">
                            <ul class="list"><?php echo $message; ?></ul>
                        </div>
                    <?php } ?>

                    <div class="description">
                        <?php echo lang('login_subheading');?>
                    </div>

                    <div class="ui divider"></div>

                    <?php echo form_open("auth/login");?>

                        <div class="ui input fluid">
                            <?php echo form_input($identity, '', 'placeholder="'.lang('login_identity_label').'"');?>
                        </div>
                        <div class="ui divider hidden"></div>
                        <div class="ui input fluid">
                            <?php echo form_input($password, '', 'placeholder="'.lang('login_password_label').'"');?>
                        </div>
                        <div class="ui divider hidden"></div>
                        <div class="ui input fluid checkbox">
                            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                            <label class="modalTerms" for="remember" style="text-decoration:underline;cursor:pointer"><?php echo lang('login_remember_label');?></label>
                        </div>
                        <div class="ui divider hidden"></div>
                        <button class="ui primary fluid button">
                            <i class="key icon"></i>
                            <?php echo lang('login_submit_btn'); ?>
                        </button>

                    <?php echo form_close();?>

                    <div class="ui horizontal divider">Or</div>

                    <?php
                        echo anchor('auth/login_provider/Google','<i class="google plus icon"></i> Login With Google', 'class="ui google plus fluid button"');
                        
                        //echo anchor('auth/login_provider/Twitter','<i class="twitter icon"></i> Login With Twitter', 'class="ui twitter fluid button"');
                        
                        echo anchor('auth/login_provider/Facebook','<i class="facebook icon"></i> Login With Facebook', 'class="ui facebook fluid button"');
                    ?>

                    <div class="ui divider hidden"></div>

                    <a href="<?php echo base_url('auth/forgot_password'); ?>" class="ui"><?php echo lang('login_forgot_password');?></a>

                    <div class="ui hidden divider"></div>

                    <?php echo lang('register_before');?> <a href="<?php echo base_url('auth/signup'); ?>" class="ui"><?php echo lang('register_link');?></a>
                </div>
            </div>
        </div>
    </div>
</div>
