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
		<?= form_input(array('type'=>'text', 'name'=>'usuario', 'id'=>'usuario', 'value'=>$result->usuario));?>                      		
	</div>

	<div class="control-group">
		<?= form_label('Rut', 'rut', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'rut', 'id'=>'rut', 'value'=>$result->rut));?>                      		
	</div>

	<div class="control-group">
		<?= form_label('Telefono', 'telefono', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'telefono', 'id'=>'telefono', 'value'=>$result->telefono));?>                      		
	</div>	

	<div class="control-group">
		<?= form_label('Mail', 'mail', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'mail', 'name'=>'mail', 'id'=>'mail', 'value'=>$result->mail));?>                      		
	</div>

	<div class="control-group">
		<?= form_label('Contraseña', 'pass', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'password', 'name'=>'pass', 'id'=>'pass', 'value'=>$result->pass));?>                      		
	</div>

	<div class="control-group">
		<?= form_hidden('tipousuario', $result->tipousuario); ?>                        		
	</div>

	
	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')) ?>
		<?= anchor('home/gestion_usuario', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>