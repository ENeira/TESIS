<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a>Información de Asignatura</a></li>
 		<li><a>Unidades</a></li>
 		<li><a>Contenidos</a></li>
 		<li><a>Sesiones</a></li>
		<li><a>Evaluaciones</a></li>
		<li class="active"><a>Bibliografia</a></li>

	</ul>
</div>
	<h5> Si desea ayuda haga clik en Ayuda </h5>
		<div class="btn-toolbar">
  			<div class="btn-group">
 				<a class="fancybox-button" rel="fancybox-button" href="<?= base_url('img/info_asignatura.png')?>" title="Ayuda Syllabus">
			 		<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
				</a>
				
 			 </div>
		</div>
<div>
<?= form_open('home/updatebibliografia', array('class' => 'form_horizontal'));?>
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
		<?= form_label('Nombre', 'titulo', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'titulo', 'id'=>'titulo', 'value'=>$result->titulo));?>                      		
	</div>
	<div class="control-group">
		<?= form_label('Autor', 'autor', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'autor', 'id'=>'autor', 'value'=>$result->autor));?>                      		
	</div>
	<div class="control-group">
		<?= form_label('Editorial', 'editorial', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'editorial', 'id'=>'editorial', 'value'=>$result->editorial));?>                      		
	</div>
	<div class="control-group">
		<?= form_label('Tipo', 'tipo', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'tipo', 'id'=>'tipo', 'value'=>$result->tipo));?>                      		
	</div>
	<div class="control-group">
		<?= form_label('Año', 'ano', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'ano', 'id'=>'ano', 'value'=>$result->ano));?>                      		
	</div>
	<div class="control-group">
		<?= form_label('Edición', 'edicion', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'edicion', 'id'=>'edicion', 'value'=>$result->edicion));?>                      		
	</div>

	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')) ?>
		<?= anchor('home/info_bibliografia', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>