

<div class="page-header">
	<h3> Ramos Asignados al Profesor </h3>
</div>

	<p>Si desea ayuda haga clik en Ayuda</p>
		<div class="btn-toolbar">
  			<div class="btn-group">
 			<a class="fancybox-button" rel="fancybox-button" href="<?= base_url('img/ayuda_asignatura.png')?>" title="Ayuda Syllabus">
			<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
			</a>
				
 			 </div>
		</div>

<table class="table table-condensed table-bordered">
	<thead>
		<tr>
		<!--	<th> ID </th>		-->
				<th> Sigla </th>
				<th> Nombre </th>
		<!--	<th> Pre-Requisito </th>	-->
		<!--	<th> Co-requisito </th> 	-->
		<!--	<th> Area de Enseñanza </th>	-->
		<!--	<th> Semestre Malla</th>	-->
		<!--	<th> Año Malla </th>	-->
				<th> Creación Syllabus </th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($query as $registro): ?>
		
		<tr>
		<!-- 		<td> <?= $registro->id ?> </td>												-->
		<!--		<td> <?= anchor('asignatura/edit/'.$registro->id, $registro->id); ?> </td> 	-->
					<td> <?= anchor('asignatura/edit/'.$registro->id, $registro->sigla);?></td>
		<!-- 		<td> <?= $registro->sigla ?> </td> 											-->
					<td> <?= $registro->nombre ?> </td>
		<!--		<td> <?= $registro->corequisito ?> </td>									-->
		<!--		<td> <?= $registro->prerequisito ?> </td>									-->
		<!--		<td> <?= $registro->area_ensenanza ?> </td>									-->
		<!--		<td> <?= $registro->semestre_malla ?> </td>									-->
		<!--		<td> <?= $registro->ano_malla ?> </td>										-->
					<td> <?= $registro->estado ?> </td>
		<!-- 		<td> <?= $registro->estado ?> <input name="estado" type="checkbox" /> </td> -->
					
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>

<!--<div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Crear', 'class'=>'btn btn-primary'))?>
		<?= anchor('asignatura', 'Cancelar', array('class'=>'btn'))?>
</div> -->