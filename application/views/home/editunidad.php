<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a>Información de Asignatura</a></li>
 		<li class="active"><a>Unidades</a></li>
 		<li><a>Contenidos</a></li>
 		<li><a>Sesiones</a></li>
		<li><a>Evaluaciones</a></li>
		<li><a>Bibliografia</a></li>

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
<?= form_open('home/updateuni', array('class' => 'form_horizontal'));?>
	<legend> Actualizar Unidad </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
		<?= form_label('', 'id', array('class'=> 'control-label')); ?>
		<?= form_hidden('id', $result->id); ?>                     		
	</div>
	
	<div class="control-group">
		<?= form_label('Numero Unidad', 'numero', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'numero', 'id'=>'numero', 'value'=>$result->numero));?>                      		
	</div>

	<div class="control-group">
		<?= form_label('Nombre Unidad', 'nombre', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'value'=>$result->nombre));?>                      		
	</div>
	<div class="control-group">
		<?= form_label('Descripción Unidad', 'descripcion', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>$result->descripcion));?>                      		
	</div>

	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')) ?>
		<?= anchor('home/info_unidades', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>