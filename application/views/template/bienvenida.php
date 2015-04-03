<h1>Bienvenido a Syllabus </h1>

<p>Syllabus es una herramienta que permite la creación de 
	programas de asignatura para los docentes
	de la Escuela de Ingenieria Civil Informatica 
	de la Universidad de Valparaiso</p>

<div>



<table class="table table-condensed table-bordered">
<?php $result = $this->model_carrera->find($this->session->userdata('carrera')); ?>

	<thead>
		<tr>
			<th>
				Perfil de Egreso
			</th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<td>
			<?= $result->perfil_egreso ?>
			</td>
		</tr>
	</tbody>

	<thead>
		<tr>
			<th>
				Mision
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
			<?= $result->mision ?>
			</td>
		</tr>
	</tbody>
	
	<thead>
		<tr>
			<th>
				Vision
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
			<?= $result->vision ?>
			</td>
		</tr>
	</tbody>

</table>


