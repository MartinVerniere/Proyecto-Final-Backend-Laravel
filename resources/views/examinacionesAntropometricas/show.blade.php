@extends('master')
@section('content')
<div class="examination-container">
    <h1>Examinacion Antropometrica</h1>
    <div class="examination-row">
        <div class="row-title">ID:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropometrica->id}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Paciente:</div>
        <div class="row-content readonly-field">
            {{ $examinacionAntropometrica->examination->getNombrePaciente() }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Fecha Realizacion:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropometrica->fecha_realizacion}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Pliegues</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Triceps:</div>
                <div class="row-content">{{$examinacionAntropometrica->pliegues_triceps}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Subescapular:</div>
                <div class="row-content">{{$examinacionAntropometrica->pliegues_subescapular}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Supraespinal:</div>
                <div class="row-content">{{$examinacionAntropometrica->pliegues_supraespinal}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Abdominal:</div>
                <div class="row-content">{{$examinacionAntropometrica->pliegues_abdominal}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Muslo:</div>
                <div class="row-content">{{$examinacionAntropometrica->pliegues_muslo}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Pantorrilla:</div>
                <div class="row-content">{{$examinacionAntropometrica->pliegues_pantorrilla}}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Perimetros</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Brazo Relajado:</div>
                <div class="row-content">{{$examinacionAntropometrica->perimetro_brazo_relajado}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Brazo Flexionado:</div>
                <div class="row-content">{{$examinacionAntropometrica->perimetro_brazo_flexionado}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Cintura Minima:</div>
                <div class="row-content">{{$examinacionAntropometrica->perimetro_cintura_minima}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Cadera:</div>
                <div class="row-content">{{$examinacionAntropometrica->perimetro_cadera}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Muslo:</div>
                <div class="row-content">{{$examinacionAntropometrica->perimetro_muslo}}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Pantorrilla:</div>
                <div class="row-content">{{$examinacionAntropometrica->perimetro_pantorrilla}}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Indice cintura cadera:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropometrica->valor_indice_cintura_cadera}} - {{$examinacionAntropometrica->categoria_indice_cintura_cadera}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Indice masa grasa:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropometrica->valor_indice_masa_grasa}} - {{$examinacionAntropometrica->categoria_indice_masa_grasa}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Indice masa muscular:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropometrica->valor_indice_masa_muscular}} - {{$examinacionAntropometrica->categoria_indice_masa_muscular}}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Sumatoria 6 pliegues:</div>
        <div class="row-content readonly-field">
            {{$examinacionAntropometrica->suma_pliegues}}
        </div>
    </div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop