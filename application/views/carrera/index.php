<div class="page-header">
	<h3> Bienvenido a Syllabus </h3>
</div>

<p>Syllabus es una herramienta que permite la creación de 
	programas de asignatura para los docentes
	de la Escuela de Ingenieria Civil Informatica 
	de la Universidad de Valparaiso</p>

<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>
				Perfil de Egreso
			</th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($query as $registro): ?>
		<tr>
			<td>
				<?= $registro->perfilegreso?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>

	<thead>
		<tr>
			<th>
				Mision
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
		<tr>
			<td>
				<?= $registro->mision?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	
	<thead>
		<tr>
			<th>
				Vision
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $registro): ?>
		<tr>
			<td>
				<?= $registro->vision?>
			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>

<!--<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Crear', 'class'=>'btn btn-primary'))?>
		<?= anchor('asignatura', 'Cancelar', array('class'=>'btn'))?>
</div> -->


<!--
<h1>Bienvenido a Syllabus </h1>

<p>Syllabus es una herramienta que permite la creación de 
	programas de asignatura para los docentes
	de la Escuela de Ingenieria Civil Informatica 
	de la Universidad de Valparaiso</p>

<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th> ID </th>
			<th> Perfil Egreso </th>
			<th> Mision </th>
			<th> Vision </th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td> <?= $registro->id ?> </td>
			<td> <?= $registro->perfilegreso ?> </td>
			<td> <?= $registro->mision ?> </td>
			<td> <?= $registro->vision ?> </td>	
		</tr>
	</tbody>
</table>
-->