<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>

<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a href="info_asignatura">Información de Asignatura</a></li>
 		<li><a href="info_unidades">Unidades</a></li>
 		<li><a href="info_contenidos">Contenidos</a></li>
 		<li><a href="info_sesiones">Sesiones</a></li>
		<li><a href="info_evaluaciones">Evaluaciones</a></li>
		<li class="active"><a href="info_bibliografia">Bibliografia</a></li>

	</ul>	

<?= form_open('home/insertbibliografia', array('class' => 'form_horizontal'));?>
	<div class="form-horizontal">
		<fieldset>
			<legend> Bibliografia </legend>
				<div class="control-group">

					<label class="control-label">Numero Bibliografia:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'bibliografia','id'=>'bibliografia')); ?>
						</div>
					</br>
					<label class="control-label">Nombre:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'titulo','id'=>'titulo')); ?>
						</div>
					</br>
					<label class="control-label">Autor:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'autor','id'=>'autor')); ?>
						</div>
					</br>
					<label class="control-label">Editorial:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'editorial','id'=>'editorial')); ?>
						</div>
					</br>
					<label class="control-label">Tipo:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'tipo','id'=>'tipo')); ?>
						</div>
					</br>
					<label class="control-label">Año:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'ano','id'=>'ano')); ?>
						</div>
					</br>
					<label class="control-label">Edición:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'edicion','id'=>'edicion')); ?>
						</div>

				</div>
		</fieldset>
	</div>

    <div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Guardar', 'class'=>'btn btn-primary','onclick' => 'showUser(this.value)')) ?>
		
	</div>
	<?= form_close(); ?>
</div>

</br>
</br>

<table class="table table-condensed table-bordered">
<thead>
	<tr>
		<th>Numero Libro</th>
		<th>Nombre </th>
		<th>Autor</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
</thead>

<tbody>
	<?php $result = $this->model_bibliografia->all(); ?>
	<?php foreach ($result as $row): ?>
	<tr>
  		<td> <?= $row->id ?> </td>
		<td> <?= $row->titulo ?> </td>
		<td> <?= $row->autor ?> </td>
		<?= form_open('home/editbibliografia/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-edit"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
      	<?= form_open('home/delatebibliografia/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-remove"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
	</tr>

	<?php endforeach; ?>
</tbody>
</table>

</br>
</br>
</br>

<div>
<?= form_open('home/bienvenida', array('class' => 'form_horizontal'));?>
<div>
	<?= form_button(array('type'=> 'submit', 'content'=>'Continuar', 'class'=>'btn btn-primary')) ?>
	<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
</div>
<?= form_close(); ?>
</div>

