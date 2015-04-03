
<div class="page-header">
	<h3> Ramos de la Carrera </h3>
</div>

<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th> Sigla </th>
			<th> Nombre </th>
			<th> Creación Syllabus </th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($query as $registro): ?>
		
		<tr>
			<td> <?= $registro->sigla ?> </td>
			<td> <?= $registro->nombre ?> </td>
			<td> <?= $registro->estado ?> </td>
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>


