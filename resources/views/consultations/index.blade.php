@extends('master')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Consultas:</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped content-table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
				<th>Fecha de realizacion</th>
                <th>Paciente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->id }}</td>
					<td>{{ $consulta->fecha_realizacion }}</td>
                    <td>{{ $consulta->getNombrePaciente() }}</td>
					<td class="table-acciones-list">
						<a href="{{ route('consultations.show', $consulta) }}" class="btn btn-primary">
							Detalles
						</a>
						<a href="{{ route('consultations.edit', $consulta) }}" class="btn btn-warning">
							Editar
						</a>
						<form action="{{ route('consultations.destroy', $consulta) }}" method="POST" class="d-inline"
						onsubmit="return confirm('¿Estás seguro que quieres eliminar esta consulta? Se ELIMINARAN todas sus examinaciones asociadas!')">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">
								Eliminar
							</button>
						</form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop