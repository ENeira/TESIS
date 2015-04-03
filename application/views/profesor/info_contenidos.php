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
function selecUnidad(){
	document.getElementById('mensajeuni').value=document.getElementById('numero').options[document.getElementById('numero').selectedIndex].text;
	}
</script>

<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a href="info_asignatura">Información de Asignatura</a></li>
 		<li><a href="info_unidades">Unidades</a></li>
 		<li class="active"><a href="info_contenidos">Contenidos</a></li>
 		<li><a href="info_sesiones">Sesiones</a></li>
		<li><a href="info_evaluaciones">Evaluaciones</a></li>
		<li><a href="info_bibliografia">Bibliografia</a></li>

	</ul>	

<?= form_open('home/insertcontenido', array('class' => 'form_horizontal'));?>
	<div class="form-horizontal">
		<fieldset>
			<legend> Contenidos </legend>
				<div class="control-group">		
					<label class="control-label"> Unidad: </label>
					<div>
						<?php $result = $this->model_unidades->all(); ?>
							<div class="controls">
								<select  id="numero" onChange="selecUnidad()">
									<?php foreach ($result as $row): ?> 	
										<option> <?= $row->numero ?> </option>	
									<?php endforeach; ?> 
								</select>
								</br>
								<div class="controls">
									<?= form_input(array('type'=>'hidden', 'name'=>'mensajeuni','id'=>'mensajeuni')); ?>
								</div>
							</div>
						
					</div>
					</br>
					<label class="control-label"> Indice de Contenido:</label>
						<div class="controls">
							<?= form_input(array('type'=> 'text', 'name' => 'numeroc', 'id' => 'numeroc' )); ?>
						</div>	
					</br>
					<label class="control-label">Nombre :</label>
						<div class="controls">
							<?= form_input(array('type'=> 'text', 'name' => 'nombre', 'id' => 'nombre' )); ?>
						</div>
					<label class="control-label">Descripción :</label>
						<div class="controls">
							<?= form_input(array('type'=> 'text', 'name' => 'descripcion', 'id' => 'descripcion' )); ?>
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
		<th>Indice Unidad</th>
		<th>Indice Contenido</th>
		<th>Nombre Contenido</th>
		<th>Descripción</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
</thead>

<tbody>
	<?php $result = $this->model_contenidos->all(); ?>
	<?php foreach ($result as $row): ?>
	<tr>
  		<td> <?= $row->unidades_id ?> </td>  		<!-- indice de la tabla contenidos la cual debe ser la de arriba numero-->
  	<!-- <td> <?= $row->id ?> </td> -->
		<td> <?= $row->numeroc ?> </td>
		<td> <?= $row->nombre ?> </td>
		<td> <?= $row->descripcion ?> </td>
		<!--Modificar -->
      	<?= form_open('home/editcontenido/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-edit"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
      	<!--Eliminar-->
      	<?= form_open('home/delatecontenido/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
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
<?= form_open('home/info_sesiones', array('class' => 'form_horizontal'));?>
<div>
	<?= form_button(array('type'=> 'submit', 'content'=>'Continuar', 'class'=>'btn btn-primary')) ?>
	<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
</div>
<?= form_close(); ?>
</div>



