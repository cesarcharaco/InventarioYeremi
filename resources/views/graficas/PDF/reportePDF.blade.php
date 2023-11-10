<!DOCTYPE html>
<html>
<head>
	<title>Reporte de insumos</title>
</head>
<body style="width: 100%;">
	<hr>
	<h2>Estado actual del almacén</h2>
	<table border="1px" width="100%">
		<thead>
			<tr>
				<th>Nro.</th>
				<th>Insumo</th>
				<th>Marca</th>
				<th>En el almacén</th>
				<th>Fuera del almacén</th>
				<th>Disponibles</th>
				<th>Entregados</th>
				<th>Usados</th>
				<th>Inservible</th>
			</tr>
		</thead>
		<tbody>
			{{$num=0}}
			@foreach($insumos as $key)
				<tr>
					<!-- <td>{{$num=$num+1}}</td>
					<td>{{$key->producto}}</td>
					<td>{{$key->marca}}</td>
					<td>{{$key->in_almacen}}</td>
					<td>{{$key->out_almacen}}</td>
					<td>{{$key->disponibles}}</td>
					<td>{{$key->entregados}}</td>
					<td>{{$key->usados}}</td>
					<td>{{$key->inservible}}</td> -->
				</tr>
			@endforeach()
		</tbody>
	</table>
	<br>
	<hr>
	<h2>Préstamos Realizados
	</h2>
	<table border="1" width="100%">
		<thead>
			<tr>
				<th colspan="3"></th>
				<th colspan="2">Tipo</th>
				<th colspan="5"></th>
			</tr>
			<tr>
				<th>Nro.</th>
				<th>Insumo</th>
				<th>Modulo</th>
				<th style="background-color: yellow;">Préstamo</th>
				<th style="background-color: aqua;">Incidencia</th>
				<th style="background-color: yellow;">Solicitante</th>
				<th>Observación</th>
				<th style="background-color: yellow;">Status</th>
				<th>Cantidad</th>
				<th style="background-color: aqua;">Fecha de incidencia</th>
			</tr>
		</thead>
		<tbody>
			{{$num=0}}
			@foreach($prestamos as $key)
				<tr>
					<td>{{$num=$num+1}}</td>
					<td>{{$key->insumos->producto}}</td>
					<td>{{$key->insumos->marca}}</td>
					<td style="background-color: yellow;">{{$key->tipo}}</td>
					<td style="background-color: aqua;"></td>
					<td style="background-color: yellow;">{{$key->solicitantes->nombres}} - {{$key->solicitantes->rut}}</td>
					<td>{{$key->observación}}</td>
					<td style="background-color: yellow;">{{$key->status}}</td>
					<td>{{$key->cantidad}}</td>
					<td style="background-color: aqua;">---</td>
				</tr>
			@endforeach()
			@foreach($incidencias as $key)
				<tr>
					<td>{{$num=$num+1}}</td>
					<td>{{$key->insumos->producto}}</td>
					<td>{{$key->insumos->marca}}</td>
					<td style="background-color: yellow;">{{$key->tipo}}</td>
					<td style="background-color: aqua;"></td>
					<td> --- </td>
					<td>{{$key->observación}}</td>
					<td style="background-color: yellow;">{{$key->status}}</td>
					<td>{{$key->cantidad}}</td>
					<td style="background-color: aqua;">{{$key->fecha_incidencia}}</td>
				</tr>
			@endforeach()
		</tbody>
	</table>

	<br>
</body>
</html>