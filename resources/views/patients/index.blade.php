@extends('master')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pacientes:</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped content-table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Genero</th>
				<th>Fecha de nacimiento</th>
                <th>DNI</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->apellido }}</td>
                    <td>{{ $paciente->genero }}</td>
					<td>{{ $paciente->fecha_nacimiento }}</td>
                    <td>{{ $paciente->DNI }}</td>
                    <td class="table-acciones-list">
						<a href="{{ route('patients.consultations', $paciente) }}" class="btn btn-primary">
							Ver consultas realizadas
						</a>
						<a href="{{ route('patients.edit', $paciente) }}" class="btn btn-warning">
							Editar
						</a>
						<form action="{{ route('patients.destroy', $paciente) }}" method="POST" class="d-inline"
						onsubmit="return confirm('¿Estás seguro que quieres eliminar esta paciente? Se ELIMINARAN todas sus consultas y examinaciones asociadas!')">
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
    <div class="d-flex justify-content-end">
		<form action="{{ route('patients.create') }}" method="get">
			<button type="submit" class="btn btn-success">
				Crear paciente
			</button>
		</form>
	</div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop