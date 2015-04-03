<!-- En este menu uno esta lo que es la tabla con los datos sacados de la base de
datos como son las siglas de las asignaturas, nombre de los ramos, estado de creacion o no etc -->

<div>
<div class="hero-unit">
	<h3> Ramos asignados al profesor </h3>
    <hr>
	
	<table class="table table-bordered">
	<tr>
		<td><b>Sigla</b></td>									<!-- Sigla del ramo-->
		<td><b>Nombre Asignaura</b></td>						<!-- Nombre de la asignatura-->
		<td><b>Requisito</b></td>								<!-- Prerequisito del ramo-->
		<td><b>Pre-Requisito</b></td>							<!-- Ramo siguiente-->
		<td><b>Creación sylabus</b></td>						<!-- Estado /creado o No creado -->
	</tr>
	
	<!--Esta parte debe ser creada dinamicamente correspondiente a los ramos que tenga asignado cada profesor-->
	<tr>
		<td>INC 100</td>
		<td>Algebra Elemental</td>
		<td>--</td>
		<td>INC 201</td>
		<td>Creado</td>
	
	</tr>	
	</table>
		

<br> 
<?= anchor('home/info_asignatura', 'Ingresar', array('class' => "btn btn-primary"));?>
</div> 
</div>

