<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-offset-2">
			<?php echo form_open('/index.php/home/usuario'); ?>
			
			<!--  <form role="form" method="post" action="<?php //echo  base_url('/index.php/home/usuario')?>"> -->
			<div class="form-group">
				<?php echo form_label('Email '); ?>
        		<?php echo form_input(array('type' => 'email', 'id' => 'email', 'name' => 'email', 'class'=>'form-control'), set_value('email'), 'autofocus'); ?>
				<?php echo form_error('email'); ?>
			</div>
			<?php echo form_submit(array('name' => 'Entrar', 'class'=>'btn btn-default'), 'Entrar'); ?>
			<!-- </form> -->
			<?php echo form_close(); ?>
		 </div>
	</div>
</div>