<div class="ui equal width center aligned padded grid stackable">
	<div class="row">
		<div class="five wide column">
		    <div class="ui segments">
		        <div class="ui segment inverted nightli">
		            <h3 class="ui header">
		                <?php echo lang('forgot_password_heading');?>
		            </h3>
		        </div>
		        <div class="ui segment">
		        	<?php if (isset($message) && ! empty($message)) { ?>
		              	<div class="ui error message">
		                  	<ul class="list"><?php echo $message; ?></ul>
		              	</div>
		            <?php } ?>
		            
		            <div class="content">
		                <div class="description">
		                    <?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?>
		                </div>
		            </div>

		            <div class="ui divider"></div>

		            <?php echo form_open("auth/forgot_password");?>
		         
		            <div class="ui input fluid">
		                <?php
		                	$placeholder = $type=='email' ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label);
		                	echo form_input($identity, '', 'placeholder="'.$placeholder.'"');
		            	?>
		            </div>

		            <div class="ui divider hidden"></div>

		            <button class="ui primary fluid button">
		                <i class="send icon"></i>
		                <?php echo lang('forgot_password_submit_btn'); ?>
		            </button>

		            <?php echo form_close();?>

		        </div>
		    </div>
		</div>
	</div>
</div>
