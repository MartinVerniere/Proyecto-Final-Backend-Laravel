@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Antropométrica</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Paciente:</strong>
                {{ $examinacionAntropometrica->consultation->getNombrePaciente() }}
            </p>
            <p><strong>Fecha de realización:</strong>
                {{ $examinacionAntropometrica->fecha_realizacion }}
            </p>
        </div>
    </div>

	{{-- Medidas básicas --}}
    <div class="card mb-4">
        <div class="card-header">Medidas</div>
        <div class="card-body">
            <p><strong>Talla paciente:</strong> {{ $examinacionAntropogenica->talla_paciente }} cm</p>
			<p><strong>Talla paciente sentado:</strong> {{ $examinacionAntropogenica->talla_paciente_sentado }} cm</p>
            <p><strong>Peso paciente:</strong> {{ $examinacionAntropogenica->peso_paciente }} kg</p>
			<p><strong>Presion arterial:</strong> {{ $examinacionAntropogenica->presion_arterial_paciente }} mmHg</p>
        </div>
    </div>

    {{-- Pliegues --}}
    <div class="card mb-4">
        <div class="card-header">Pliegues</div>
        <div class="card-body">
            <p><strong>Tríceps:</strong> {{ $examinacionAntropometrica->pliegues_triceps }}</p>
            <p><strong>Subescapular:</strong> {{ $examinacionAntropometrica->pliegues_subescapular }}</p>
            <p><strong>Supraespinal:</strong> {{ $examinacionAntropometrica->pliegues_supraespinal }}</p>
            <p><strong>Abdominal:</strong> {{ $examinacionAntropometrica->pliegues_abdominal }}</p>
            <p><strong>Muslo:</strong> {{ $examinacionAntropometrica->pliegues_muslo }}</p>
            <p><strong>Pantorrilla:</strong> {{ $examinacionAntropometrica->pliegues_pantorrilla }}</p>
        </div>
    </div>

    {{-- Perímetros --}}
    <div class="card mb-4">
        <div class="card-header">Perímetros</div>
        <div class="card-body">
            <p><strong>Brazo relajado:</strong> {{ $examinacionAntropometrica->perimetro_brazo_relajado }}</p>
            <p><strong>Brazo flexionado:</strong> {{ $examinacionAntropometrica->perimetro_brazo_flexionado }}</p>
            <p><strong>Cintura mínima:</strong> {{ $examinacionAntropometrica->perimetro_cintura_minima }}</p>
            <p><strong>Cadera:</strong> {{ $examinacionAntropometrica->perimetro_cadera }}</p>
            <p><strong>Muslo:</strong> {{ $examinacionAntropometrica->perimetro_muslo }}</p>
            <p><strong>Pantorrilla:</strong> {{ $examinacionAntropometrica->perimetro_pantorrilla }}</p>
        </div>
    </div>

    {{-- Índices --}}
    <div class="card mb-4">
        <div class="card-header">Índices corporales</div>
        <div class="card-body">
            <p>
                <strong>Índice cintura-cadera:</strong>
                {{ $examinacionAntropometrica->valor_indice_cintura_cadera }}
                ({{ $examinacionAntropometrica->categoria_indice_cintura_cadera }})
            </p>

            <p>
                <strong>Índice de masa grasa:</strong>
                {{ $examinacionAntropometrica->valor_indice_masa_grasa }}
                ({{ $examinacionAntropometrica->categoria_indice_masa_grasa }})
            </p>

            <p>
                <strong>Índice de masa muscular:</strong>
                {{ $examinacionAntropometrica->valor_indice_masa_muscular }}
                ({{ $examinacionAntropometrica->categoria_indice_masa_muscular }})
            </p>

            <p>
                <strong>Sumatoria de 6 pliegues:</strong>
                {{ $examinacionAntropometrica->suma_pliegues }}
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