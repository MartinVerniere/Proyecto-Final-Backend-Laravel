@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Antropométrica</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Paciente:</strong>
                {{ $examination->consultation->getNombrePaciente() }}
            </p>
            <p><strong>Fecha de realización:</strong>
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

    {{-- Pliegues --}}
    <div class="card mb-4">
        <div class="card-header">Pliegues</div>
        <div class="card-body">
            <p><strong>Tríceps:</strong> {{ $examination->pliegues_triceps }}</p>
            <p><strong>Subescapular:</strong> {{ $examination->pliegues_subescapular }}</p>
            <p><strong>Supraespinal:</strong> {{ $examination->pliegues_supraespinal }}</p>
            <p><strong>Abdominal:</strong> {{ $examination->pliegues_abdominal }}</p>
            <p><strong>Muslo:</strong> {{ $examination->pliegues_muslo }}</p>
            <p><strong>Pantorrilla:</strong> {{ $examination->pliegues_pantorrilla }}</p>
			<div class="divider"></div>
			<p>
				<strong>Sumatoria de 6 pliegues:</strong>
				{{ $examination->suma_pliegues }}
			</p>
        </div>
    </div>

    {{-- Perímetros --}}
    <div class="card mb-4">
        <div class="card-header">Perímetros</div>
        <div class="card-body">
            <p><strong>Brazo relajado:</strong> {{ $examination->perimetro_brazo_relajado }}</p>
            <p><strong>Brazo flexionado:</strong> {{ $examination->perimetro_brazo_flexionado }}</p>
            <p><strong>Cintura mínima:</strong> {{ $examination->perimetro_cintura_minima }}</p>
            <p><strong>Cadera:</strong> {{ $examination->perimetro_cadera }}</p>
            <p><strong>Muslo:</strong> {{ $examination->perimetro_muslo }}</p>
            <p><strong>Pantorrilla:</strong> {{ $examination->perimetro_pantorrilla }}</p>
        </div>
    </div>

    {{-- Índices --}}
    <div class="card mb-4">
        <div class="card-header">Índices corporales</div>
        <div class="card-body">
            <p>
                <strong>Índice cintura-cadera:</strong>
                {{ $examination->valor_indice_cintura_cadera }}
                ({{ $examination->categoria_indice_cintura_cadera }})
            </p>

            <p>
                <strong>Índice de masa grasa:</strong>
                {{ $examination->valor_indice_masa_grasa }}
                ({{ $examination->categoria_indice_masa_grasa }})
            </p>

            <p>
                <strong>Índice de masa muscular:</strong>
                {{ $examination->valor_indice_masa_muscular }}
                ({{ $examination->categoria_indice_masa_muscular }})
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