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
	<h5> Si desea ayuda haga clik en Ayuda </h5>
		<div class="btn-toolbar">
  			<div class="btn-group">
 				<a class="fancybox-button" rel="fancybox-button" href="#" title="Ayuda Syllabus">
			 		<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
				</a>
				
 			 </div>
		</div>
<div>
<?= form_open('home/updatesesion', array('class' => 'form_horizontal'));?>
	<legend> Actualizar Contenido </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
		<?= form_label('', 'id', array('class'=> 'control-label')); ?>
		<?= form_hidden('id', $result->id); ?>          		
	</div>
	<!-- Indice de Unidad-->
	<div class="control-group">
		<?= form_label('Indice Unidad', 'unidades_id', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'unidades_id', 'id'=>'unidades_id', 'value'=>$result->unidades_id));?>                      		
	</div>
	<!-- Nombre Sesión-->
	<div class="control-group">
		<?= form_label('Nombre Sesión', 'nombre', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'value'=>$result->nombre));?>                      		
	</div>	
	<!-- Indice de Sesión-->
	<div class="control-group">
		<?= form_label('Indice Sesión', 'numeros', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'numeros', 'id'=>'numeros', 'value'=>$result->numeros));?>                      		
	</div>
	<!--Verbo -->
	<div class="control-group">
		<?= form_label('Verbo', 'verbo', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'verbo', 'id'=>'verbo', 'value'=>$result->verbo));?>                      		
	</div>
	<!--Descripcion 1-->
	<div class="control-group">
		<?= form_label('Descripción', 'descripcion1', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'descripcion1', 'id'=>'descripcion1', 'value'=>$result->descripcion1));?>                      		
	</div>
	<!--Metodo-->
	<div class="control-group">
		<?= form_label('Metodo', 'metodo', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'metodo', 'id'=>'metodo', 'value'=>$result->metodo));?>                      		
	</div>
	<!--Descripcion 2-->
	<div class="control-group">
		<?= form_label('Descripción', 'descripcion2', array('class'=> 'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'descripcion2', 'id'=>'descripcion2', 'value'=>$result->descripcion2));?>                      		
	</div>
	</br>
	</br>
	</br>
	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')) ?>
		<?= anchor('home/info_sesiones', 'cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>