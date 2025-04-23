@extends('master')
@section('content')
<div class="examination-container">
    <h1>Examinacion Antropogenica</h1>
    <div class="examination-row">
        <div class="row-title">ID:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->id}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Paciente:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->consultation->getNombrePaciente() }}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Fecha Realizacion:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->fecha_realizacion}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Longitud pierna:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->longitud_pierna}}</div>
    </div>    
    <div class="examination-row">
        <div class="row-title">Talla padre:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->talla_padre}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Talla madre:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->talla_madre}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Talla adulta:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->talla_adulta}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Talla objetiva genetica:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->talla_objetiva_genetica}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Talla falta crecer:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->talla_falta_crecer}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">IRMI:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropogenica->valor_IRMI}} - {{$examinacionAntropogenica->categoria_IRMI}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Indice cormico:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropogenica->valor_indice_cormico}} - {{$examinacionAntropogenica->categoria_indice_cormico}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Indice masa corporal:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropogenica->valor_indice_masa_corporal}} - {{$examinacionAntropogenica->categoria_indice_masa_corporal}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Estadio tanner:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropogenica->valor_estadio_tanner}} - {{$examinacionAntropogenica->categoria_estadio_tanner}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Indice madurativo:</div>
        <div class="row-content readonly-field">{{$examinacionAntropogenica->valor_indice_madurativo}}</div>
    </div>
    <div class="examination-row">
        <div class="row-title">Edad PHV:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropogenica->edad_PHV}} - {{$examinacionAntropogenica->categoria_PHV}}
        </div>
    </div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop