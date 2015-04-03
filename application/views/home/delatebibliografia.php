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
<div>
<?= form_open('home/updatebibliografia', array('class' => 'form_horizontal'));?>
	<legend> Eliminar Bibliografia </legend>

	 <?= my_validation_errors(validation_errors());?> 
	
	<!--ID-->
	<div class="control-group">
	<!--	<?= form_label('ID', 'id', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->id; ?></span> -->
		<?= form_hidden('id', $result->id); ?>                        		
	</div>
	<div class="control-group">
	<?= form_label('Nombre', 'titulo', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->titulo; ?></span> 
		<?= form_hidden('titulo', $result->titulo); ?>                        		
	</div>
	<div class="control-group">
	<?= form_label('Autor', 'autor', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->autor; ?></span> 
		<?= form_hidden('autor', $result->autor); ?>                        		
	</div>
	<div class="control-group">
	<?= form_label('Editorial', 'editorial', array('class'=> 'control-label')); ?>
		<span class="uneditable-input"> <?= $result->editorial; ?></span> 
		<?= form_hidden('editorial', $result->editorial); ?>                        		
	</div>

	<div class="form-action">
	<!--	<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-warning')) ?>-->
		<?= anchor('home/deletebibliografia/'.$result->id, 'Eliminar', array('class'=>'btn btn-danger', 'onClick'=>"return confirm('¿ESTA SEGURO?')"))?>
		<?= anchor('home/info_bibliografia', 'Cancelar', array('class'=>'btn'))?>
	</div>
<?= form_close(); ?>
</div>