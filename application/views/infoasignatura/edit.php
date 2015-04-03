<?= form_open('home/info_asignatura', array('class' => 'form_horizontal'));?>
	<legend> Crear Syllabus </legend>

	 <?= my_validation_errors(validation_errors());?> 

	<div class="control-group">
		<?= form_label('ID', 'id', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'id', 'id'=>'id', 'value'=> $registro->id));?>	
		
		<!--
		<span class="uneditable-input"> <?= $registro->id; ?></span>
		<?= form_hidden('id', $registro->id); ?>                        		-->
		
	</div>

	<div class="control-group">
		<?= form_label('Sigla Asignatura', 'sigla', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'Sigla', 'id'=>'sigla', 'value'=>$registro->sigla));?>

	<!--
		<span class="uneditable-input"> <?= $registro->sigla; ?></span>
		<?= form_hidden('sigla', $registro->sigla); ?>                        	-->
	
	</div>
	
	<div class="control-group">

		<?= form_label('Nombre Asignatura', 'nombre', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'nombre' 'id'=>'nombre', 'value'=> $registro->nombre));?>

	<!--
		<span class="uneditable-input"> <?= $registro->nombre; ?></span>
		<?= form_hidden('nombre', $registro->nombre); ?>                        -->
	</div>
	
	<div class="control-group">
		
		<?= form_label('Co-Requisitos', 'corequisito', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'corequisito' 'id'=>'corequisito', 'value'=> $registro->corequisito));?>

	</div>

	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Crear', 'class'=>'btn btn-primary')) ?>
		<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>