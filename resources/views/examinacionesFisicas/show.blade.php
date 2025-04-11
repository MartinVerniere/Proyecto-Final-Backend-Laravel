@extends('master')
@section('content')
<div class="examinacionesFisicas-container">
    <h1>Examinación Física</h1>

    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">ID:</div>
        <div class="examinacionesFisicas-container-row-content readonly-field">
            {{ $examinacionFisica->id }}
        </div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Paciente:</div>
        <div class="examinacionesFisicas-container-row-content readonly-field">
            {{ $examinacionFisica->examination->getNombrePaciente() }}
        </div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Fecha Realización:</div>
        <div class="examinacionesFisicas-container-row-content readonly-field">
            {{ $examinacionFisica->fecha_realizacion }}
        </div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Fuerza Presión Manual:</div>
        <div class="examinacionesFisicas-container-row-content readonly-field">
            {{ $examinacionFisica->valor_fuerza_presion_manual }} – {{ $examinacionFisica->categoria_fuerza_presion_manual }}
        </div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Fuerza Explosiva:</div>
        <div class="examinacionesFisicas-container-row-content readonly-field">
            {{ $examinacionFisica->valor_fuerza_explosiva }} – {{ $examinacionFisica->categoria_fuerza_explosiva }}
        </div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Mobilidad Tobillo:</div>
        <div class="examinacionesFisicas-container-row-content readonly-field">
            {{ $examinacionFisica->valor_mobilidad_tobillo }} – {{ $examinacionFisica->categoria_mobilidad_tobillo }}
        </div>
    </div>
<!--     <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Sentadillas:</div>
        <div class="examinacionesFisicas-container-row-content">{{$examinacionFisica->evaluacion_sentadillas}}</div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Actividad Pierna:</div>
        <div class="examinacionesFisicas-container-row-content">{{$examinacionFisica->evaluacion_activa_pierna}}</div>
    </div>
    <div class="examinacionesFisicas-container-row">
        <div class="examinacionesFisicas-container-row-title">Movilidad Hombros:</div>
        <div class="examinacionesFisicas-container-row-content">{{$examinacionFisica->movilidad_hombros}}</div>
    </div> -->
</div>
@stop