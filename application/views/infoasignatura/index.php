<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li class="active"><a href="info_asignatura">Información de Asignatura</a></li>
 		<li><a href="info_unidades">Unidades</a></li>
 		<li><a href="#">Contenidos</a></li>
 		<li><a href="info_sesiones">Sesiones</a></li>
		<li><a href="info_evaluaciones">Evaluaciones</a></li>
		<li><a href="info-bilbiografia">Bibliografia</a></li>
	</ul>	
</div>

<p>Si desea ayuda haga clik en el boton</p>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" onClick='alert("Para crear un syllabus haga click en el ID de la Asignatura")'><i class="icon-question-sign"></i></a>
  </div>
</div>

<div class="form-horizontal"> 
        <fieldset>  
        	<legend>Información asignatura</legend> 
		  		<?php foreach ($query as $registro): ?>
		  		
		  		<div class="control-group">
		  			<label class="control-label"> Carrera:</label>		
		 			<div class="controls">
		 			<span class="uneditable-input"> Ingenieria Civil Informatica</span>									
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Sigla: </label>
					<div class="controls">
					<span class="uneditable-input"> <?= $registro->sigla ?> </span>
					<!-- Colocar aqui la sigla del ramo a crear -->
					</div>
		  		</div>
				<div class="control-group">
		  			<label class="control-label"> Nombre Asignatura: </label>
					<div class="controls">
					<span class="uneditable-input"> <?= $registro->nombre ?> </span>
					<!-- Colocar aqui el Nombre de la asignatura-->
					</div>
		  		</div>
				<div class="control-group">
		  			<label class="control-label"> Descripción de la Asignatura: </label>
					<div class="controls">
					<textarea class="input-xlarge" id="input02"></textarea> 
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Contribucion de la Asignatura: </label>
					<div class="controls">
					<textarea class="input-xlarge" id="input03"></textarea> 
					</div>
		  		</div>
				<legend>Red de Aprendizaje</legend>
				<div class="control-group">
		  			<label class="control-label"> Co-requisito(s): </label>
					<div class="controls">
					 <textarea class="input-xlarge" readonly><?= $registro->prerequisito ?></textarea>
					 <!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
				<div class="control-group">
		  			<label class="control-label"> Pre-requisito(s): </label>
					<div class="controls">
					<textarea class="input-xlarge" readonly> <?= $registro->corequisito?> </textarea>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Area enseñanza: </label>
					<div class="controls">
					<span class="uneditable-input"> <?= $registro->area_enseñanza ?> </span>
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Año malla curricular: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $registro->año_malla ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Semestre malla curricular: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $registro->semestre_malla ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>

				<legend>Introducción</legend>
				<div class="control-group">
		  			<label class="control-label"> Bienvenida a Alumnos: </label>
					<div class="controls">
					<textarea class="input-xlarge"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
					</div>
		  		</div>
			<?php endforeach; ?>	

          <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Guardar</button>  
            <button class="btn"> Salir</button>  
          </div>  
        </fieldset>  
</div>

<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th> ID </th>
			<th> Sigla </th>
			<th> Nombre </th>
			<th> Requisito </th>
			<th> Pre-requisito </th>
			<th> Area de Enseñanza </th>
			<th> Semestre Malla</th>
			<th> Año Malla </th>
			<th> Creación Syllabus </th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($query as $registro): ?>
		<tr>
			<!--<td> <?= $registro->id ?> </td>-->
			<td> <?= anchor('asignatura/edit/'.$registro->id, $registro->id); ?> </td>
			<td> <?= $registro->sigla ?> </td>
			<td> <?= $registro->nombre ?> </td>
			<td> <?= $registro->corequisito ?> </td>
			<td> <?= $registro->prerequisito ?> </td>
			<td> <?= $registro->area_enseñanza ?> </td>
			<td> <?= $registro->semestre_malla ?> </td>
			<td> <?= $registro->año_malla ?> </td>
			<td> <?= $registro->estado ?> </td>
			<!--<td> <?= $registro->estado ?> <input name="estado" type="checkbox" /> </td> -->
			
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>