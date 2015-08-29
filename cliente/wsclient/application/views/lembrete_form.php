<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-offset-2">
			<h2>Lembrete</h2>
			<?php if($this->session->flashdata('addOK')):?>
				<p><?php echo $this->session->flashdata('addOK');?> </p>
			<?php endif; ?>
			<?php echo (isset($idlembrete)? form_open('/index.php/lembrete/edit'): form_open('/index.php/lembrete/add')); ?>
			<?php //echo validation_errors("<p>","</p>")?>
			<div class="form-group">
				<?php echo form_label('Titulo '); ?>
        		<?php echo form_input(array('id' => 'titulo', 'name' => 'titulo', 'class'=>'form-control','value'=> (isset($titulo)? $titulo : '')), set_value('titulo'), 'autofocus'); ?>
				<?php echo form_error('titulo'); ?>
				<?php echo form_label('Data '); ?>
        		<?php echo form_input(array('type' => 'datetime-local', 'id' => 'data', 'name' => 'data', 'class'=>'form-control','value'=> (isset($data)? $data : '')), set_value('data')); ?>
				<?php echo form_error('data'); ?>
			</div>
			<?php echo form_submit(array('name' => (isset($idlembrete)? 'editar':'cadastrar'), 'class'=>'btn btn-default'), (isset($idlembrete)? 'Editar':'Cadastrar')); ?>
			<?php echo form_close(); ?>
		 </div>
	</div>
</div>