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
 		<li class="active"><a href="info_unidades">Unidades</a></li>
 		<li><a href="info_contenidos">Contenidos</a></li>
 		<li><a href="info_sesiones">Sesiones</a></li>
		<li><a href="info_evaluaciones">Evaluaciones</a></li>
		<li><a href="info_bibliografia">Bibliografia</a></li>
	</ul>	


<?= form_open('home/insertunidad', array('class' => 'form_horizontal'));?>
	<div class="form-horizontal">
		<fieldset>
			<legend> Unidades </legend>
				<h5> Si desea ayuda haga clik en Ayuda </h5>
					<div class="btn-toolbar">
  						<div class="btn-group">
 							<a class="fancybox-button" rel="fancybox-button" href="<?= base_url('img/info_asignatura.png')?>" title="Ayuda Syllabus">
			 				<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
							</a>
						</div>
					</div>


				<div class="control-group">
					<label class="control-label">Sylabus:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'syla','id'=>'syla', 'value'=>'1', 'readonly'=>'readonly')); ?>                       		
						</div>	
						
						</br>
					<label class="control-label">Unidad:</label>
						<div class="controls">
							<!-- <input type="text" class="input-small" name="unidad" for="unidad" id="unidad"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'numero','id'=>'numero')); ?>
						</div>	
						</br>
					<label class="control-label">Nombre:</label>
						<div class="controls">
							<!-- <input type="text" class="input-xlarge" name="nombre" for="nombre" id="nombre"> -->
							<?= form_input(array('type'=> 'text', 'name' => 'nombre','id'=>'nombre')); ?>
						</div>
					<label class="control-label"> Descripción</label>
						<div class="controls">
							<?= form_input(array('type'=>'text', 'name' => 'descripcion', 'id' => 'descripcion')); ?>
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
		<th>Numero Unidad</th>
		<th>Nombre Unidad</th>
		<th>Descripción Unidad </th>
	</tr>
</thead>

<tbody>
	<?php $result = $this->model_unidades->all(); ?>
	<?php foreach ($result as $row): ?>
	<tr>
  		<td> <?= $row->numero ?> </td>
		<td> <?= $row->nombre ?> </td>
		<td> <?= $row->descripcion?> </td>
	  	<!--Modificar -->
      	<?= form_open('home/editunidad/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-edit"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
      	<!--Eliminar-->
      	<?= form_open('home/delateunidad/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
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
<?= form_open('home/info_contenidos', array('class' => 'form_horizontal'));?>
<div>
	<?= form_button(array('type'=> 'submit', 'content'=>'Continuar', 'class'=>'btn btn-primary')) ?>
	<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
</div>
<?= form_close(); ?>
</div>
