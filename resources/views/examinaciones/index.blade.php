@extends('master')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Examinaciones:</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped content-table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Fecha de realizacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($examinaciones as $examinacion)
                <tr>
                    <td>{{ $examinacion->id }}</td>
                    <td>{{ $examinacion->getNombrePaciente() }}</td>
                    <td>{{ $examinacion->fecha_realizacion }}</td>
                    <td class="table-acciones-list">
                        <form action="{{ route('examinaciones.examinacionFisicaAsociada', $examinacion->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Examinacion Fisica</button>
                        </form>
                        <form action="{{ route('examinaciones.examinacionAntropogenicaAsociada', $examinacion->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Examinacion Antropogenica</button>
                        </form>
                        <form action="{{ route('examinaciones.examinacionAntropometricaAsociada', $examinacion->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Examinacion Antropometrica</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop