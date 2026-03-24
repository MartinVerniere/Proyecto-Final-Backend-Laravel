@extends('master')
@section('content')
<div class="container mt-4">
    <h2>Crear Nuevo Paciente</h2>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Paciente
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero" required>
						<option value="MASCULINO">Masculino</option>
						<option value="FEMENINO">Femenino</option>
					</select>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="mb-3">
                    <label for="DNI" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="DNI" name="dni" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Guardar Paciente</button>
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </div>
    </form>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop