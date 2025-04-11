@extends('master')
@section('content')
<div class="examinacionesAntropogenicas-container">
    <h1>Examinacion Antropogenica</h1>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">ID:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->id}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Paciente:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{ $examinacionAntropogenica->examination->getNombrePaciente() }}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Fecha Realizacion:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->examination->fecha_realizacion}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Longitud pierna:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->longitud_pierna}}</div>
    </div>    
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Talla padre:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->talla_padre}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Talla madre:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->talla_madre}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Talla adulta:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->talla_adulta}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Talla objetiva genetica:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->talla_objetiva_genetica}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Talla falta crecer:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->talla_falta_crecer}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">IRMI:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->valor_IRMI}}</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->categoria_IRMI}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Indice cormico:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->valor_indice_cormico}}</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->categoria_indice_cormico}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Indice masa corporal:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->valor_indice_masa_corporal}}</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->categoria_indice_masa_corporal}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Estadio tanner:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->valor_estadio_tanner}}</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->categoria_estadio_tanner}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Indice madurativo:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->valor_indice_madurativo}}</div>
    </div>
    <div class="examinacionesAntropogenicas-container-row">
        <div class="examinacionesAntropogenicas-container-row-title">Edad PHV:</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->edad_PHV}}</div>
        <div class="examinacionesAntropogenicas-container-row-content">{{$examinacionAntropogenica->categoria_PHV}}</div>
    </div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop