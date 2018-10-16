<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<table class="table">
	<thead>
		<tr>
			<th>Identificador</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	<!-- Entre el tbody y filastabla(tr) de la table el codigo necesario para cargar los registros
		NOTA: El arreglo $datos es enviado como parametro desde el controlador con la respuesta de la consulta, por eso se cargan los datos en la tabla -->
	<?php foreach ($datos['usuarios'] as $usuario) : ?>
		<tr>
			<td><?php echo $usuario->id_usuario; ?></td>
			<td><?php echo $usuario->nombre; ?></td>
			<td><?php echo $usuario->email; ?></td>
			<td><?php echo $usuario->telefono; ?></td>
			<td><a href="<?php echo RUTA_URL; ?>paginas/editar/<?php echo $usuario->id_usuario; ?>">Editar</a></td>
			<td><a href="<?php echo RUTA_URL; ?>paginas/borrar/<?php echo $usuario->id_usuario; ?>">Borrar</a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
