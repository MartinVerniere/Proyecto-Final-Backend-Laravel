@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Editar Examinación Antropogénica</h3>

    <form action="{{ route('anthropogenical.update', $examination->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Datos generales --}}
        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Paciente:</strong> {{ $examination->consultation->getNombrePaciente() }}</p>
                <div class="mb-3">
                    <label for="fecha_realizacion" class="form-label">Fecha de realización</label>
                    <input type="date" class="form-control" id="fecha_realizacion" name="fecha_realizacion" value="{{ $examination->fecha_realizacion }}">
                </div>
            </div>
        </div>

        {{-- Medidas básicas --}}
        <div class="card mb-4">
            <div class="card-header">Medidas</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Talla paciente (cm)</label>
                    <input type="number" class="form-control" name="talla_paciente" value="{{ $examination->talla_paciente }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Talla paciente sentado (cm)</label>
                    <input type="number" class="form-control" name="talla_paciente_sentado" value="{{ $examination->talla_paciente_sentado }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Peso paciente (kg)</label>
                    <input type="number" class="form-control" name="peso_paciente" value="{{ $examination->peso_paciente }}">
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label class="form-label">Presión arterial máxima</label>
                        <input type="number" class="form-control" name="presion_arterial_maxima_paciente" value="{{ $examination->presion_arterial_maxima_paciente }}">
                    </div>
                    <div class="col">
                        <label class="form-label">Presión arterial mínima</label>
                        <input type="number" class="form-control" name="presion_arterial_minima_paciente" value="{{ $examination->presion_arterial_minima_paciente }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Longitud de pierna (cm)</label>
                    <input type="number" class="form-control" name="longitud_pierna" value="{{ $examination->longitud_pierna }}">
                </div>
            </div>
        </div>

        {{-- Datos familiares --}}
        <div class="card mb-4">
            <div class="card-header">Tallas familiares</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Talla padre (cm)</label>
                    <input type="number" class="form-control" name="talla_padre" value="{{ $examination->talla_padre }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Talla madre (cm)</label>
                    <input type="number" class="form-control" name="talla_madre" value="{{ $examination->talla_madre }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Talla adulta estimada (cm)</label>
                    <input type="number" class="form-control" name="talla_adulta" value="{{ $examination->talla_adulta }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Talla objetiva genética (cm)</label>
                    <input type="number" class="form-control" name="talla_objetiva_genetica" value="{{ $examination->talla_objetiva_genetica }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Talla faltante por crecer (cm)</label>
                    <input type="number" class="form-control" name="talla_falta_crecer" value="{{ $examination->talla_falta_crecer }}">
                </div>
            </div>
        </div>

        {{-- Índices --}}
        <div class="card mb-4">
            <div class="card-header">Índices antropogenicos</div>
            <div class="card-body">
                
                <div class="mb-3">
                    <label class="form-label">Nivel de actividad</label>
                    <select class="form-select" name="categoria_nivel_de_actividad">
                        @foreach(['Sedentaria','Liviana','Moderada','Intensa','Extremada'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_nivel_de_actividad == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor nivel de actividad</label>
                    <input type="number" class="form-control" name="valor_nivel_de_actividad" value="{{ $examination->valor_nivel_de_actividad }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor EER</label>
                    <input type="number" class="form-control" name="valor_EER" value="{{ $examination->valor_EER }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tasa metabólica basal</label>
                    <input type="number" class="form-control" name="tasa_metabolica_basal" value="{{ $examination->tasa_metabolica_basal }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gasto energético total estimado</label>
                    <input type="number" class="form-control" name="gasto_energetico_total_estimado" value="{{ $examination->gasto_energetico_total_estimado }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">IRMI</label>
                    <input type="number" class="form-control" name="valor_IRMI" value="{{ $examination->valor_IRMI }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría IRMI</label>
                    <select class="form-select" name="categoria_IRMI">
                        @foreach(['0','1','2'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_IRMI == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Índice córmico</label>
                    <input type="number" class="form-control" name="valor_indice_cormico" value="{{ $examination->valor_indice_cormico }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría índice córmico</label>
                    <select class="form-select" name="categoria_indice_cormico">
                        @foreach(['Corto','Medio','Largo'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_indice_cormico == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">IMC</label>
                    <input type="number" class="form-control" name="valor_indice_masa_corporal" value="{{ $examination->valor_indice_masa_corporal }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría IMC</label>
                    <select class="form-select" name="categoria_indice_masa_corporal">
                        @foreach(['Peso insuficiente','Normopeso','Sobrepeso tipo I','Sobrepeso tipo II','Obesidad tipo I','Obesidad tipo II','Obesidad tipo III'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_indice_masa_corporal == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estadio Tanner</label>
                    <select class="form-select" name="estadio_tanner">
                        @foreach(['I','II','III','IV','V'] as $option)
                            <option value="{{ $option }}" @selected($examination->estadio_tanner == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Índice madurativo</label>
                    <input type="number" class="form-control" name="valor_indice_madurativo" value="{{ $examination->valor_indice_madurativo }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Edad PHV</label>
                    <input type="number" class="form-control" name="valor_edad_PHV" value="{{ $examination->valor_edad_PHV }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría edad PHV</label>
                    <select class="form-select" name="categoria_edad_PHV">
                        @foreach(['Temprano','Normal','Tardio'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_edad_PHV == $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>

</div>
@stop


@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous">
@stop
