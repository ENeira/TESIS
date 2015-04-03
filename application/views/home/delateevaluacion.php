<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a>Información de Asignatura</a></li>
 		<li><a>Unidades</a></li>
 		<li><a>Contenidos</a></li>
 		<li><a>Sesiones</a></li>
		<li class="active"><a>Evaluaciones</a></li>
		<li><a>Bibliografia</a></li>

	</ul>
</div>
<div>
<?= form_open('home/updateevaluacion', array('class' => 'form_horizontal'));?>
	<legend> Eliminar Contenido </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
	<!--	<?= form_label('ID', 'id', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->id; ?></span> -->
		<?= form_hidden('id', $result->id); ?>                        		
	</div>
	
	<div class="control-group">
	<?= form_label('Descripción', 'descripcion', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->descripcion; ?></span> 
		<?= form_hidden('descripcion', $result->descripcion); ?>                        		
	</div>	

	<div class="form-action">
	<!--	<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-warning')) ?>-->
		<?= anchor('home/deleteevaluacion/'.$result->id, 'Eliminar', array('class'=>'btn btn-danger', 'onClick'=>"return confirm('¿ESTA SEGURO?')"))?>
		<?= anchor('home/info_evaluaciones', 'Cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>