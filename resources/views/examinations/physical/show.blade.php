@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Física</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p>
                <strong>Paciente:</strong>
                {{ $examination->consultation->getNombrePaciente() }}
            </p>
            <p>
                <strong>Fecha de realización:</strong>
                {{ $examination->fecha_realizacion }}
            </p>
        </div>
    </div>

	{{-- Medidas básicas --}}
    <div class="card mb-4">
        <div class="card-header">Medidas</div>
        <div class="card-body">
            <p><strong>Talla paciente:</strong> {{ $examination->talla_paciente }} cm</p>
			<p><strong>Talla paciente sentado:</strong> {{ $examination->talla_paciente_sentado }} cm</p>
            <p><strong>Peso paciente:</strong> {{ $examination->peso_paciente }} kg</p>
			<p><strong>Presion arterial:</strong> {{ $examination->presion_arterial_maxima_paciente }}/{{ $examination->presion_arterial_minima_paciente }} mmHg</p>
        </div>
    </div>

    {{-- Fuerza --}}
    <div class="card mb-4">
        <div class="card-header">Fuerza</div>
        <div class="card-body">
            <p>
                <strong>Fuerza de presión manual:</strong>
                {{ $examination->valor_fuerza_presion_manual }}
                ({{ $examination->categoria_fuerza_presion_manual }})
            </p>

            <p>
                <strong>Fuerza explosiva:</strong>
                {{ $examination->valor_fuerza_explosiva }}
                ({{ $examination->categoria_fuerza_explosiva }})
            </p>
        </div>
    </div>

    {{-- Movilidad --}}
    <div class="card mb-4">
        <div class="card-header">Movilidad</div>
        <div class="card-body">
            <p>
                <strong>Movilidad de tobillo:</strong>
                {{ $examination->valor_mobilidad_tobillo }}
                ({{ $examination->categoria_mobilidad_tobillo }})
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