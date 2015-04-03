<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Wizzard. Metodos de Enseñanaza y Definición.</title>
	</head>
	<body>	
		<form action="hijo">
			<div>
				<fieldset>
					<table>
						<thead>
							<a>Listado de los tipos de metodos establecidos y una pequeña definicion de los mismos.</a>
							<tr>
								<th>ID</th>
								<th>Tipo de Metodo</th>
								<th>Definición</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $row): ?>
							<tr>
							<td> <?= $row->id ?> </td>
								<td> <?= $row->tiposmetodos ?> </td>
								<td> <?= $row->definicion ?> </td>
								<td><input type="button" value="Selec" onClick="javascript: opener.document.padre.metodo.value='<?= $row->tiposmetodos;?>'; self.close()"></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</fieldset>
			</div>
		</form>
	</body>
</html>