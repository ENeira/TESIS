<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Wizzard: Tabla de Verbos y Categorias definidas por la Taxonomia de Bloom. habilidades de Pensamiento.</title>
		</head>
	<body>	
	<form action="hijo">
		<div>
			<fieldset>
				<table>
					<thead>
						<tr>
							<a> La siguiente tabla muestra los verbos definidos por la 
								Taxonomia de bloom y su correspondiente categoria. 
								Además se muestra un ejemplo de su utilización</a>
							<th>ID</th>
							<th>Verbo</th>
							<th>Categoria</th>
							<th>Ejemplo</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($result as $row): ?>
					<tr>
						<td> <?= $row->id ?> </td>
						<td> <?= $row->verbo ?> </td>
						<td> <?= $row->codigocategoria ?> </td>
						<td> <?= $row->ejemplo ?></td>
						<td>
<input type="button" value="Selec" onClick="javascript: opener.document.padre.verbo.value='<?= $row->verbo;?>'; self.close()">
						</td>
				
					</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</fieldset>
		</div>
	</form>
	</body>
</html>