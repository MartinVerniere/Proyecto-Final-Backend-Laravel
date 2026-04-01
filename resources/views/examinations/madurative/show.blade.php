@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Madurativa</h3>

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
            <p><strong>Longitud de pierna:</strong> {{ $examination->longitud_pierna }} cm</p>
        </div>
    </div>

    {{-- Datos familiares --}}
    <div class="card mb-4">
        <div class="card-header">Tallas familiares</div>
        <div class="card-body">
            <p><strong>Talla padre:</strong> {{ $examination->talla_padre }} cm</p>
            <p><strong>Talla madre:</strong> {{ $examination->talla_madre }} cm</p>
            <p><strong>Talla adulta estimada:</strong> {{ $examination->talla_adulta }} cm</p>
            <p><strong>Talla objetiva genética:</strong> {{ $examination->talla_objetiva_genetica }} cm</p>
            <p><strong>Talla faltante por crecer:</strong> {{ $examination->talla_falta_crecer }} cm</p>
        </div>
    </div>

    {{-- Índices --}}
    <div class="card mb-4">
        <div class="card-header">Índices madurativos</div>
        <div class="card-body">
			<p>
                <strong>Nivel de actividad:</strong>
				{{ $examination->categoria_nivel_de_actividad }}
				{{ $examination->valor_nivel_de_actividad }}
                ({{ $examination->valor_EER }})
				{{ $examination->tasa_metabolica_basal }}
                ({{ $examination->gasto_energetico_total_estimado }})
            </p>

            <p>
                <strong>IRMI:</strong>
                {{ $examination->valor_IRMI }}
                ({{ $examination->categoria_IRMI }})
            </p>

            <p>
                <strong>Índice córmico:</strong>
                {{ $examination->valor_indice_cormico }}
                ({{ $examination->categoria_indice_cormico }})
            </p>

            <p>
                <strong>IMC:</strong>
                {{ $examination->valor_indice_masa_corporal }}
                ({{ $examination->categoria_indice_masa_corporal }})
            </p>

            <p>
                <strong>Estadio Tanner:</strong>
                {{ $examination->estadio_tanner }}
            </p>

            <p>
                <strong>Índice madurativo:</strong>
                {{ $examination->valor_indice_madurativo }}
            </p>

            <p>
                <strong>Edad PHV:</strong>
                {{ $examination->valor_edad_PHV }}
                ({{ $examination->categoria_edad_PHV }})
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
