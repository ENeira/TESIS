<?= form_open('home/insertevaluacion', array('class' => 'form_horizontal'));?>
<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a href="info_asignatura">Información de Asignatura</a></li>
 		<li><a href="info_unidades">Unidades</a></li>
 		<li><a href="info_contenidos">Contenidos</a></li>
 		<li><a href="info_sesiones">Sesiones</a></li>
		<li class="active"><a href="info_evaluaciones">Evaluaciones</a></li>
		<li><a href="info_bibliografia">Bibliografia</a></li>

	</ul>	
	<form class="form-horizontal">
		<div class=''>  
        	<fieldset>  
        		<legend>Evaluación</legend>
        		<p> En esta sección, considere colocar la cantidad de certamenes y su tipo de evaluacion. Se suguiere el siguiente ejemplo. </p> 
			
				<div class="control-group">
		  			<label class="control-label"></label>
						<div class="controls">
						<?= form_textarea(array('type'=> 'text', 'name' => 'descripcion', 'id' => 'descripcion' , 'placeholder'=>'Certamen 1: 25%. Certamen 2: 30%. Certamen 3: 35%.Quices 4: 10%. NF => 3.95 Aprovado, 3.45 <= NF <= 3.94 Examen especial, NF < 3.44 Reprobado')); ?>
				<!--		<textarea class="input-xxlarge" placeholder="Certamen 1: 25%. Certamen 2: 30%. Certamen 3: 35%.Quices 4: 10%. NF => 3.95 Aprovado, 3.45 <= NF <= 3.94 Examen especial, NF < 3.44 Reprobado"></textarea>
					-->	
						</div>
		  			<label class="control-label"></label>
						<div class="controls">
					<?= form_input(array('type'=> 'hidden', 'name' => 'syla','id'=>'syla', 'value'=>'1',)); ?> 
						</div>
		  			<label class="control-label"></label>
						<div class="controls">
					<?= form_input(array('type'=> 'hidden', 'name' => 'id','id'=>'id')); ?> 
						</div>
					<label class="control-label"></label>
						<div class="controls">
					<?= form_input(array('type'=> 'hidden', 'name' => 'tipoevaluacion_id','id'=>'tipoevaluacion_id', 'value'=>'1',)); ?> 
						</div>
		  		</div>
			</fieldset>
		</div>
    </form>  
	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Guardar Evaluacion', 'class'=>'btn btn-primary','onclick' => 'showUser(this.value)')) ?>
		
	</div>	
<?= form_close(); ?>
</div>
<br>
<br>

<fieldset>
	<legend> Tabla con registros ingresados </legend>
<table class="table table-condensed table-bordered">
<thead>
	<tr>
		<th>Evaluacion Descripcion</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
</thead>

<tbody>

	<?php $result = $this->model_evaluacion->all(); ?>
	<?php foreach ($result as $row): ?>
	<tr>
		<td> <?= $row->descripcion ?> </td>
      	<?= form_open('home/editevaluacion/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-edit"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
      	<?= form_open('home/delateevaluacion/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-remove"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
</fieldset>

<div>
<?= form_open('home/info_bibliografia', array('class' => 'form_horizontal'));?>
<div>
	<?= form_button(array('type'=> 'submit', 'content'=>'Continuar', 'class'=>'btn btn-primary')) ?>
	<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
</div>
<?= form_close(); ?>
</div>