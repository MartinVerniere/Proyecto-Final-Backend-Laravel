@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Física</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p>
                <strong>Paciente:</strong>
                {{ $examinacionFisica->consultation->getNombrePaciente() }}
            </p>
            <p>
                <strong>Fecha de realización:</strong>
                {{ $examinacionFisica->fecha_realizacion }}
            </p>
        </div>
    </div>

    {{-- Fuerza --}}
    <div class="card mb-4">
        <div class="card-header">Fuerza</div>
        <div class="card-body">
            <p>
                <strong>Fuerza de presión manual:</strong>
                {{ $examinacionFisica->valor_fuerza_presion_manual }}
                ({{ $examinacionFisica->categoria_fuerza_presion_manual }})
            </p>

            <p>
                <strong>Fuerza explosiva:</strong>
                {{ $examinacionFisica->valor_fuerza_explosiva }}
                ({{ $examinacionFisica->categoria_fuerza_explosiva }})
            </p>
        </div>
    </div>

    {{-- Movilidad --}}
    <div class="card mb-4">
        <div class="card-header">Movilidad</div>
        <div class="card-body">
            <p>
                <strong>Movilidad de tobillo:</strong>
                {{ $examinacionFisica->valor_mobilidad_tobillo }}
                ({{ $examinacionFisica->categoria_mobilidad_tobillo }})
            </p>
        </div>
    </div>

    {{-- Volver --}}
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
        Volver
    </a>

</div>
@stop


@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous">
@stop