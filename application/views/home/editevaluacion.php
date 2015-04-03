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
	<legend> Actualizar Evaluacion </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
		<?= form_label('', 'id', array('class'=> 'control-label')); ?>
		<?= form_hidden('id', $result->id); ?>

	<!--	<?= form_input(array('type'=>'text', 'name'=>'id', 'id'=>'id', 'value'=>$result->id));?>-->
	<!--	<span class="uneditable-input"> <?= $result->id; ?></span> 
		<?= form_hidden('id', $result->id); ?>            -->            		
	</div>
	
	<div class="control-group">
		<?= form_label('Descripcion', 'descripcion', array('class'=> 'control-label')); ?>
		<?= form_textarea(array('type'=>'text', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>$result->descripcion));?>                      		
	</div>

	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')) ?>
		<?= anchor('home/info_evaluacion', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>