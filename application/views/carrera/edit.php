<?= form_open('home/info_asignatura', array('class' => 'form_horizontal'));?>
	<legend> Crear Syllabus </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
		<?= form_label('ID', 'id', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $registro->id; ?></span> 
		<?= form_hidden('id', $registro->id); ?>                        		
	</div>
	<!--Sigla-->
	<div class="control-group">
		<?= form_label('Sigla Asignatura', 'sigla', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $registro->sigla; ?></span>
		<?= form_hidden('sigla', $registro->sigla); ?>                        	
	</div>
	<!--Nombre Asignatura-->
	<div class="control-group">
		<?= form_label('Nombre Asignatura', 'nombre', array('class'=> 'control-label')); ?>	
		<span class="uneditable-input"> <?= $registro->nombre; ?></span>
		<?= form_hidden('nombre', $registro->nombre); ?>                        
	</div>
	<!--Corequisito-->
	<div class="control-group">
		<?= form_label('Co-requisito', 'prerequisito', array('class'=> 'control-label')); ?>	
		<span class="uneditable-input"> <?= $registro->prerequisito; ?></span>
		<?= form_hidden('prerequisito', $registro->prerequisito); ?>                        
	</div>
	<!--Prerequisito-->
	<div class="control-group">
		<?= form_label('Pre-requisito', 'corequisito', array('class'=> 'control-label')); ?>	
		<span class="uneditable-input"> <?= $registro->corequisito; ?></span>
		<?= form_hidden('corequisito', $registro->corequisito); ?>                        
	</div>
	<!--Area enseñanza-->
	<div class="control-group">
		<?= form_label('Area enseñanza', 'area_ensenanza', array('class'=> 'control-label')); ?>	
		<span class="uneditable-input"> <?= $registro->area_ensenanza; ?></span>
		<?= form_hidden('area_ensenanza', $registro->area_ensenanza); ?>                        
	</div>
	<!--Año malla -->
	<div class="control-group">
		<?= form_label('Año malla', 'ano_malla', array('class'=> 'control-label')); ?>	
		<span class="uneditable-input"> <?= $registro->ano_malla; ?></span>
		<?= form_hidden('ano_malla', $registro->ano_malla); ?>                        
	</div> 
	<!--Semestre malla-->
	<div class="control-group">
		<?= form_label('Semestre malla', 'semestre_malla', array('class'=> 'control-label')); ?>	
		<span class="uneditable-input"> <?= $registro->semestre_malla; ?></span>
		<?= form_hidden('semestre_malla', $registro->semestre_malla); ?>                        
	</div> 


	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Crear', 'class'=>'btn btn-primary')) ?>
		<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>