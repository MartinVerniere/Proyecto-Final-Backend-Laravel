@extends('master')
@section('content')
<div class="examinacionesAntropometricas-container">
    <h1>Examinacion Antropometrica</h1>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">ID:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{$examinacionAntropometrica->id}}
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Paciente:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{ $examinacionAntropometrica->examination->getNombrePaciente() }}
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Fecha Realizacion:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{$examinacionAntropometrica->examination->fecha_realizacion}}
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Pliegues</div>
        <div class="examinacionesAntropometricas-container-column">
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Triceps:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->pliegues_triceps}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Subescapular:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->pliegues_subescapular}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Supraespinal:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->pliegues_supraespinal}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Abdominal:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->pliegues_abdominal}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Muslo:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->pliegues_muslo}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Pantorrilla:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->pliegues_pantorrilla}}
                </div>
            </div>
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Perimetros</div>
        <div class="examinacionesAntropometricas-container-column">
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Brazo Relajado:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->perimetro_brazo_relajado}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Brazo Flexionado:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->perimetro_brazo_flexionado}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Cintura Minima:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->perimetro_cintura_minima}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Cadera:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->perimetro_cadera}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Muslo:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->perimetro_muslo}}
                </div>
            </div>
            <div class="examinacionesAntropometricas-container-column-row">
                <div class="examinacionesAntropometricas-container-column-row-subtitle">Pantorrilla:</div>
                <div class="examinacionesAntropometricas-container-column-row-content">
                    {{$examinacionAntropometrica->perimetro_pantorrilla}}
                </div>
            </div>
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Indice cintura cadera:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{$examinacionAntropometrica->indice_cintura_cadera}}
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Indice masa grasa:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{$examinacionAntropometrica->indice_masa_grasa}}
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Indice masa muscular:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{$examinacionAntropometrica->indice_masa_muscular}}
        </div>
    </div>
    <div class="examinacionesAntropometricas-container-row">
        <div class="examinacionesAntropometricas-container-row-title">Sumatoria 6 pliegues:</div>
        <div class="examinacionesAntropometricas-container-row-content readonly-field">
            {{$examinacionAntropometrica->suma_pliegues}}
        </div>
    </div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop