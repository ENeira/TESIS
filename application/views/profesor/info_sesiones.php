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
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 
<script type="text/javascript">
    $(document).ready(function()
        {
        $("#boton").click(function () {     
            $('#target').toggle();
             });
        });
</script>
<script type="text/javascript">
    $(document).ready(function()
        {
        $("#boton1").click(function () {     
            $('#target1').toggle();
             });
        });
</script>

<script language="javascript" type="text/javascript">
		  function ventana1(){
				javascript:window.open('taxonomiabloom','popup','width=800,height=500')
			}
</script>
<script language="javascript" type="text/javascript">
		  function ventana2(){
				javascript:window.open('metodos','popup','width=500,height=500')
			}
</script>


<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li><a href="info_asignatura">Información de Asignatura</a></li>
 		<li><a href="info_unidades">Unidades</a></li>
 		<li><a href="info_contenidos">Contenidos</a></li>
 		<li class="active"><a href="info_sesiones">Sesiones</a></li>
		<li><a href="info_evaluaciones">Evaluaciones</a></li>
		<li><a href="info_bibliografia">Bibliografia</a></li>
	</ul>	

<?= form_open('home/insertsesion', array('class' => 'form_horizontal', 'name'=>'padre', 'id'=>'padre'));?>
	<div class="form-horizontal">
		<fieldset>
			<legend> Ingreso de Sesiones </legend>
				<div class="control-grup">
					<label class="control-label"> Unidad:</label>
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
					</br>	
					</div>
					<label class="control-label"> Numero de Sesión:</label>
						<div class="controls">
							<?= form_input(array('type'=>'text', 'name'=>'numeros', 'id'=>'numeros')); ?>
						</div>
					</br>
					<label class="control-label"> Nombre de Sesión: </label>
						<div class="controls">
							<?= form_input(array('type' =>'text', 'name'=>'nombre', 'id'=>'nombre')); ?>
						</div>

					<legend> Sesion </legend>
					
					<h5>Objetivos de aprendizaje</h5>
					<p>En esta sección Usted, debe incorporar los verbos correspondientes 
						a los objeivos de aprendizaje que espera en los alumnos de la asignatura.
					Si desea ser asistido en esta sección haga Clik en el boton de ayuda.</p>
					
						<div class="btn-group">
 							<a class="fancybox-button" rel="fancybox-button" href="<?= base_url('img/info_asignatura.png')?>" title="Ayuda Syllabus">
							<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
							</a>
						</div>
					</br>
					<label class="control-label"> Verbo:</label>
						<div class="controls">
						<!--
						
							<?= form_input(array('type'=> 'text', 'name' => 'verbo', 'id' => 'verbo' )); ?>
							 Con el siguiente boton se debe desplegar la tabla con los verbos de taxonomia de bloom
							<div class="btn-group" name="padre" id="padre">
								<a href="javascript: ventana1();" title="Wizard">
								<img src="<?= base_url('img/wizard.png')?> " alt=""/> 
								</a>
							</div>
						
            				<td><input name="sub_familia" type="text" id="sub_familia"> <a href="javascript: ventana1();"> WIZARD</a></td> -->
            				<td><input name="verbo" type="text" id="verbo"> <a href="javascript: ventana1();"> WIZARD</a></td>
          				</tr>
	

						</div>	
					

					</br>
					<label class="control-label">Descripción :</label>
						<div class="controls">
							<?= form_input(array('type'=> 'text', 'name' => 'descripcion1', 'id' => 'descripcion1' )); ?>
						</div>
					</br>
					<legend> Metodologias/Estrategias </legend>
					
					<p> Dado al verbo definido anteriormente en los Objetivos de aprendizaje, Usted en esta sección, 
						debe incorporar las metodologias para lograrlos.
					Si desea ser asistido en esta sección haga Clik en el boton de ayuda.</p>
					<div class="btn-group">
 							<a class="fancybox-button" rel="fancybox-button" href="<?= base_url('img/info_asignatura.png')?>" title="Ayuda Syllabus">
							<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
							</a>
					</div>

					</br>
					<label class="control-label"> Metodo:</label>
						<div class="controls">
							<!--
							<?= form_input(array('type'=> 'text', 'name' => 'metodo', 'id' => 'metodo' )); ?>
							<!--Con el siguiente boton se debe desplegar la tabla con las metodologias 
							<div class="btn-group">
								
								<a href="javascript: ventana1();" title="Wizard">
								<img src="<?= base_url('img/wizard.png')?> " alt=""/>
								</a>
							</div>
							-->
					<td><input name="metodo" type="text" id="metodo"> <a href="javascript: ventana2();"> WIZARD</a></td>
						</div>	
					</br>
					<label class="control-label">Descripción :</label>
						<div class="controls">
						<?= form_input(array('type'=> 'text','name' => 'descripcion2', 'id' => 'descripcion2' )); ?>
						</div>
				</div>
		</fieldset>
	</div>
	</br>
	</br>
	</br>
	</br>

	<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Guardar Registros', 'class'=>'btn btn-primary','onclick' => 'showUser(this.value)')) ?>
		
	</div>	
<?= form_close(); ?>
</div>

</br>
</br>

<fieldset>
	<legend> Tabla con registros ingresados </legend>
<table class="table table-condensed table-bordered">
<thead>
	<tr>
		<th>Ind. Unidad</th>
		<th>Ind. Sesión</th>
		<th>Nombre Sesión</th>
		<th>Verbo</th>
		<th>Descripción</th>
		<th>Metodología</th>
		<th>Descripción</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
</thead>

<tbody>

	<?php $result = $this->model_sesion->all(); ?>
	<?php foreach ($result as $row): ?>
	<tr>
  		<td> <?= $row->unidades_id ?> </td>  		
		<td> <?= $row->nombre?> </td>
		<td> <?= $row->numeros ?> </td>
		<td> <?= $row->verbo ?> </td>
		<td> <?= $row->descripcion1 ?> </td>
		<td> <?= $row->metodo ?> </td>
		<td> <?= $row->descripcion2 ?> </td>
      	<?= form_open('home/editsesion/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-edit"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
      	<?= form_open('home/delatesesion/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      	<td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-remove"></i>', 'class'=>'btn'))?>
      	<?= form_close();?>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
</fieldset>

</br>
</br>
</br>

<div>
<?= form_open('home/info_evaluaciones', array('class' => 'form_horizontal'));?>
<div>
	<?= form_button(array('type'=> 'submit', 'content'=>'Continuar', 'class'=>'btn btn-primary')) ?>
	<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
</div>
<?= form_close(); ?>
</div>

