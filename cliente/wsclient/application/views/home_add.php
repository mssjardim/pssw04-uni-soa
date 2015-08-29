<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-offset-2">
			<h2>Voce ainda nao possivel cadastro!</h2>
			<h3>Deseja se cadastrar?</h3>
			<?php echo form_open('/index.php/home/usuario_add'); ?>
			<?php //echo validation_errors("<p>","</p>")?>
			<div class="form-group">
				<?php echo form_label('Nome '); ?>
        		<?php echo form_input(array('id' => 'nome', 'name' => 'nome', 'class'=>'form-control', 'value'=> (isset($nome)? $nome : '')), set_value('nome'), 'autofocus'); ?>
				<?php echo form_error('nome'); ?>
				<?php echo form_label('Celular '); ?>
        		<?php echo form_input(array('type' => 'text', 'id' => 'celular', 'name' => 'celular', 'class'=>'form-control', 'value'=> (isset($celular)? $celular : '')), set_value('celular')); ?>
				<?php echo form_label('Email '); ?>
        		<?php echo form_input(array('type' => 'email', 'id' => 'email', 'name' => 'email', 'class'=>'form-control', 'value'=> (isset($email)? $email : '')), set_value('email')); ?>
				<?php echo form_error('email'); ?>
			</div>
			<?php echo form_submit(array('name' => 'Cadastrar', 'class'=>'btn btn-default'), 'Cadastrar'); ?>
			<?php echo form_close(); ?>
		 </div>
	</div>
</div>