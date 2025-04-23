@extends('master')
@section('content')
<div class="examination-container">
    <h1>Examinación Física</h1>
    <div class="examination-row">
        <div class="row-title">ID:</div>
        <div class="row-content readonly-field">
            {{ $examinacionFisica->id }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Paciente:</div>
        <div class="row-content readonly-field">
            {{ $examinacionFisica->consultation->getNombrePaciente() }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Fecha Realización:</div>
        <div class="row-content readonly-field">
            {{ $examinacionFisica->fecha_realizacion }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Fuerza Presión Manual:</div>
        <div class="row-content readonly-field">
            {{ $examinacionFisica->valor_fuerza_presion_manual }} – {{ $examinacionFisica->categoria_fuerza_presion_manual }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Fuerza Explosiva:</div>
        <div class="row-content readonly-field">
            {{ $examinacionFisica->valor_fuerza_explosiva }} – {{ $examinacionFisica->categoria_fuerza_explosiva }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Mobilidad Tobillo:</div>
        <div class="row-content readonly-field">
            {{ $examinacionFisica->valor_mobilidad_tobillo }} – {{ $examinacionFisica->categoria_mobilidad_tobillo }}
        </div>
    </div>
<!--     <div class="examination-row">
        <div class="row-title">Sentadillas:</div>
        <div class="row-content">{{$examinacionFisica->evaluacion_sentadillas}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Actividad Pierna:</div>
        <div class="row-content">{{$examinacionFisica->evaluacion_activa_pierna}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Movilidad Hombros:</div>
        <div class="row-content">{{$examinacionFisica->movilidad_hombros}}</div>
    </div> -->
</div>
@stop