@extends('master')
@section('content')
<div class="examination-container">
    <h1>Examinación Postura</h1>
    <div class="examination-row">
        <div class="row-title">ID:</div>
        <div class="row-content readonly-field">
            {{ $examinacionPostura->id }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Paciente:</div>
        <div class="row-content readonly-field">
            {{ $examinacionPostura->consultation->getNombrePaciente() }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Fecha Realización:</div>
        <div class="row-content readonly-field">
            {{ $examinacionPostura->fecha_realizacion }}
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Cabeza:</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Plano:</div>
                <div class="row-content">{{ $examinacionPostura->analisisCabeza->plano }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Inclinacion:</div>
                <div class="row-content">{{ $examinacionPostura->analisisCabeza->inclinacion }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Mirada:</div>
                <div class="row-content">{{ $examinacionPostura->analisisCabeza->mirada }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Caries:</div>
                <div class="row-content">{{ $examinacionPostura->analisisCabeza->caries }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Oclusion:</div>
                <div class="row-content">{{ $examinacionPostura->analisisCabeza->oclusion }}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Hombros y escapular:</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Inclinacion:</div>
                <div class="row-content">{{ $examinacionPostura->analisisHombrosEscapular->inclinacion }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Musculatura:</div>
                <div class="row-content">{{ $examinacionPostura->analisisHombrosEscapular->musculatura }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Escapula:</div>
                <div class="row-content">{{ $examinacionPostura->analisisHombrosEscapular->escapula }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Hombro:</div>
                <div class="row-content">{{ $examinacionPostura->analisisHombrosEscapular->hombro }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Triangulo de talle:</div>
                <div class="row-content">{{ $examinacionPostura->analisisHombrosEscapular->triangulo_de_talle }}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Pelvis:</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">EIAS:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPelvis->eias }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">EIPS:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPelvis->eips }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Relacion:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPelvis->relacion }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Rotacion:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPelvis->rotacion }}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Rodilla:</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Genu:</div>
                <div class="row-content">{{ $examinacionPostura->analisisRodilla->genu }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Morfotipo torsional:</div>
                <div class="row-content">{{ $examinacionPostura->analisisRodilla->morfotipo_torsional }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Tipologia de rotulas:</div>
                <div class="row-content">{{ $examinacionPostura->analisisRodilla->tipologia_rotulas }}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Pies:</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Eje posterior:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPies->eje_posterior }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Eje anterior:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPies->eje_anterior }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Tipologia:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPies->tipologia }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Dedos en garra:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPies->dedos_en_garra }}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Pivot:</div>
        <div class="examination-column column-table">
            <div class="column-row">
                <div class="row-subtitle">Cervical C4-C5:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPivot->cervical_C4_C5 }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Dorsal D8:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPivot->dorsal_D8 }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Lumbar L3:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPivot->lumbar_L3 }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Raquis escoliotico:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPivot->raquis_escoliotico }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Raquis rectificado:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPivot->raquis_rectificado }}</div>
            </div>
            <div class="column-row">
                <div class="row-subtitle">Raquis cifolordotico:</div>
                <div class="row-content">{{ $examinacionPostura->analisisPivot->raquis_cifolordotico }}</div>
            </div>
        </div>
    </div>
    <div class="examination-row">
        <div class="row-title">Observaciones:</div>
        <div class="row-content readonly-field">
            {{ $examinacionPostura->observaciones }}
        </div>
</div>
@stop