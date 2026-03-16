@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Antropogénica</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Paciente:</strong>
                {{ $examinacionAntropogenica->consultation->getNombrePaciente() }}
            </p>
            <p><strong>Fecha de realización:</strong>
                {{ $examinacionAntropogenica->fecha_realizacion }}
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
			<p><strong>Presion arterial:</strong> {{ $examinacionAntropogenica->presion_arterial_maxima_paciente }}/{{ $examinacionAntropogenica->presion_arterial_minima_paciente }} mmHg</p>
            <p><strong>Longitud de pierna:</strong> {{ $examinacionAntropogenica->longitud_pierna }} cm</p>
        </div>
    </div>

    {{-- Datos familiares --}}
    <div class="card mb-4">
        <div class="card-header">Tallas familiares</div>
        <div class="card-body">
            <p><strong>Talla padre:</strong> {{ $examinacionAntropogenica->talla_padre }} cm</p>
            <p><strong>Talla madre:</strong> {{ $examinacionAntropogenica->talla_madre }} cm</p>
            <p><strong>Talla adulta estimada:</strong> {{ $examinacionAntropogenica->talla_adulta }} cm</p>
            <p><strong>Talla objetiva genética:</strong> {{ $examinacionAntropogenica->talla_objetiva_genetica }} cm</p>
            <p><strong>Talla faltante por crecer:</strong> {{ $examinacionAntropogenica->talla_falta_crecer }} cm</p>
        </div>
    </div>

    {{-- Índices --}}
    <div class="card mb-4">
        <div class="card-header">Índices antropogenicos</div>
        <div class="card-body">
			<p>
                <strong>Nivel de actividad:</strong>
				{{ $examinacionAntropogenica->categoria_nivel_de_actividad }}
				{{ $examinacionAntropogenica->valor_nivel_de_actividad }}
                ({{ $examinacionAntropogenica->valor_EER }})
				{{ $examinacionAntropogenica->tasa_metabolica_basal }}
                ({{ $examinacionAntropogenica->gasto_energetico_total_estimado }})
            </p>

            <p>
                <strong>IRMI:</strong>
                {{ $examinacionAntropogenica->valor_IRMI }}
                ({{ $examinacionAntropogenica->categoria_IRMI }})
            </p>

            <p>
                <strong>Índice córmico:</strong>
                {{ $examinacionAntropogenica->valor_indice_cormico }}
                ({{ $examinacionAntropogenica->categoria_indice_cormico }})
            </p>

            <p>
                <strong>IMC:</strong>
                {{ $examinacionAntropogenica->valor_indice_masa_corporal }}
                ({{ $examinacionAntropogenica->categoria_indice_masa_corporal }})
            </p>

            <p>
                <strong>Estadio Tanner:</strong>
                {{ $examinacionAntropogenica->estadio_tanner }}
            </p>

            <p>
                <strong>Índice madurativo:</strong>
                {{ $examinacionAntropogenica->valor_indice_madurativo }}
            </p>

            <p>
                <strong>Edad PHV:</strong>
                {{ $examinacionAntropogenica->valor_edad_PHV }}
                ({{ $examinacionAntropogenica->categoria_edad_PHV }})
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
