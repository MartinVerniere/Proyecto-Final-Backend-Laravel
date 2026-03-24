@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Editar Examinación de Condición Física</h3>

    <form action="{{ route('physical.update', $examination->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Datos generales --}}
        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Paciente:</strong> {{ $examination->consultation->getNombrePaciente() }}</p>
                <div class="mb-3">
                    <label for="fecha_realizacion" class="form-label">Fecha de realización</label>
                    <input type="date" class="form-control" id="fecha_realizacion" name="fecha_realizacion" value="{{ $examination->fecha_realizacion }}">
                </div>
            </div>
        </div>

        {{-- Medidas --}}
        <div class="card mb-4">
            <div class="card-header">Medidas</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Talla paciente (cm)</label>
                    <input type="number" class="form-control" name="talla_paciente" value="{{ $examination->talla_paciente }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Talla paciente sentado (cm)</label>
                    <input type="number" class="form-control" name="talla_paciente_sentado" value="{{ $examination->talla_paciente_sentado }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Peso paciente (kg)</label>
                    <input type="number" class="form-control" name="peso_paciente" value="{{ $examination->peso_paciente }}">
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Presión arterial máxima</label>
                        <input type="number" class="form-control" name="presion_arterial_maxima_paciente" value="{{ $examination->presion_arterial_maxima_paciente }}">
                    </div>
                    <div class="col">
                        <label class="form-label">Presión arterial mínima</label>
                        <input type="number" class="form-control" name="presion_arterial_minima_paciente" value="{{ $examination->presion_arterial_minima_paciente }}">
                    </div>
                </div>

            </div>
        </div>

        {{-- Fuerza --}}
        <div class="card mb-4">
            <div class="card-header">Fuerza</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Fuerza de presión manual (kg)</label>
                    <input type="number" class="form-control" name="valor_fuerza_presion_manual" value="{{ $examination->valor_fuerza_presion_manual }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría fuerza de presión manual</label>
                    <select class="form-select" name="categoria_fuerza_presion_manual">
                        @foreach(['Muy bajo','Bajo','Medio','Alto','Muy alto'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_fuerza_presion_manual == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fuerza explosiva (kg)</label>
                    <input type="number" class="form-control" name="valor_fuerza_explosiva" value="{{ $examination->valor_fuerza_explosiva }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría fuerza explosiva</label>
                    <select class="form-select" name="categoria_fuerza_explosiva">
                        @foreach(['Muy bajo','Bajo','Medio','Alto','Muy alto'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_fuerza_explosiva == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Movilidad --}}
        <div class="card mb-4">
            <div class="card-header">Movilidad del tobillo</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Movilidad del tobillo (cm)</label>
                    <input type="number" class="form-control" name="valor_mobilidad_tobillo" value="{{ $examination->valor_mobilidad_tobillo }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría movilidad del tobillo</label>
                    <select class="form-select" name="categoria_mobilidad_tobillo">
                        @foreach(['Rigidez','Bien'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_mobilidad_tobillo == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>

</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous">
@stop
