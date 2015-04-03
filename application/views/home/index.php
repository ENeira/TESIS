<?= form_open('home/ingresar', array('class' => 'form_horizontal'));?>
	<legend> Inicio de sesión </legend>

	 <?= my_validation_errors(validation_errors());?> 

	<div class="control-group">
		<?= form_label('usuario', 'login', array('class'=> 'control-label'))?>
		<?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login', 'placeholder'=>'usuario...', 'value'=>set_value('login'))); ?>
	</div>

	<div class="control-group">
		<?= form_label('password :' ,'login', array('class'=> 'control-label'))?>
		<?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password', 'value'=>set_value('password'))); ?>
	</div>

	<!--
	<div class="control-group">
		<?= form_label('Tipo de usuario :' ,'Tipo de usuario', array('class'=> 'control-label'))?>
		<?=form_dropdown('TipoUsuario', array('Administrador'=>'Administrador', 'Terapeuta'=>'Terapeuta','Investigador'=>'Investigador'),1);?>
	</div>
	-->
	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Ingresar', 'class'=>'btn btn-primary'))?>
		<?= anchor('home/inicio', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>