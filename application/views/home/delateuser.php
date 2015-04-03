<?= form_open('home/update', array('class' => 'form_horizontal'));?>
	<legend> Actualizar Usuario </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
	<!--	<?= form_label('ID', 'id', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->id; ?></span> -->
		<?= form_hidden('id', $result->id); ?>                        		
	</div>

	<div class="control-group">
	<?= form_label('Nombre', 'usuario', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->usuario; ?></span> 
		<?= form_hidden('usuario', $result->usuario); ?>                        		
	</div>	

	<div class="control-group">
	<?= form_label('Rut', 'rut', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->rut; ?></span> 
		<?= form_hidden('rut', $result->rut); ?>                        		
	</div>	
	
	<div class="control-group">
	<?= form_label('Telefono', 'telefono', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->telefono; ?></span> 
		<?= form_hidden('telefono', $result->telefono); ?>                        		
	</div>	

	<div class="control-group">
	<?= form_label('Mail', 'mail', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->mail; ?></span> 
		<?= form_hidden('mail', $result->mail); ?>                        		
	</div>	
	
	<div class="control-group">
	<?= form_label('Contraseña', 'pass', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->pass; ?></span> 
		<?= form_hidden('pass', $result->pass); ?>                        		
	</div>	

	<div class="control-group">
		<?= form_hidden('tipousuario', $result->tipousuario); ?>                        		
	</div>


	<div class="form-action">
	<!--	<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-warning')) ?>-->
		<?= anchor('home/delete/'.$result->id, 'Eliminar', array('class'=>'btn btn-warning', 'onClick'=>"return confirm('¿ESTA SEGURO?')"))?>
		<?= anchor('home/gestion_usuario', 'Cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>