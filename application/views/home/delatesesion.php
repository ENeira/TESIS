<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a>Información de Asignatura</a></li>
 		<li><a>Unidades</a></li>
 		<li><a>Contenidos</a></li>
 		<li class="active"><a>Sesiones</a></li>
		<li><a>Evaluaciones</a></li>
		<li><a>Bibliografia</a></li>

	</ul>
</div>
<div>
<?= form_open('home/updatesesion', array('class' => 'form_horizontal'));?>
	<legend> Eliminar Sesión </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
	<!--	<?= form_label('ID', 'id', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->id; ?></span> -->
		<?= form_hidden('id', $result->id); ?>                        		
	</div>
	
	<div class="control-group">
	<?= form_label('Nombre Sesión', 'nombre', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->nombre; ?></span> 
		<?= form_hidden('nombre', $result->nombre); ?>                        		
	</div>	

	<div class="control-group">
	<?= form_label('Indice Sesión', 'numeros', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->numeros; ?></span> 
		<?= form_hidden('numeros', $result->numeros); ?>                        		
	</div>	
	
	<div class="control-group">
	<?= form_label('Verbo', 'verbo', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->verbo; ?></span> 
		<?= form_hidden('verbo', $result->verbo); ?>                        		
	</div>
	
	<div class="control-group">
	<?= form_label('Metodo', 'metodo', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->metodo; ?></span> 
		<?= form_hidden('metodo', $result->metodo); ?>                        		
	</div>	

	<div class="form-action">
	<!--	<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-warning')) ?>-->
		<?= anchor('home/deletesesion/'.$result->id, 'Eliminar', array('class'=>'btn btn-danger', 'onClick'=>"return confirm('¿Esta seguro en eliminar la sesión?')"))?>
		<?= anchor('home/info_sesiones', 'Cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>