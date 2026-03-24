@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Editar Examinación Antropométrica</h3>

    <form action="{{ route('anthropometrical.update', $examination->id) }}" method="POST">
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

        {{-- Medidas --}}
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
                <div class="row">
                    <div class="col">
                        <label class="form-label">Presión arterial máxima</label>
                        <input type="number" class="form-control" name="presion_arterial_maxima_paciente" value="{{ $examination->presion_arterial_maxima_paciente }}">
                    </div>
                    <div class="col">
                        <label class="form-label">Presión arterial mínima</label>
                        <input type="number" class="form-control" name="presion_arterial_minima_paciente" value="{{ $examination->presion_arterial_minima_paciente }}">
                    </div>
                </div>

            </div>
        </div>

        {{-- Pliegues --}}
        <div class="card mb-4">
            <div class="card-header">Pliegues</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Tríceps</label>
                    <input type="number" class="form-control" name="pliegues_triceps" value="{{ $examination->pliegues_triceps }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Subescapular</label>
                    <input type="number" class="form-control" name="pliegues_subescapular" value="{{ $examination->pliegues_subescapular }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Supraespinal</label>
                    <input type="number" class="form-control" name="pliegues_supraespinal" value="{{ $examination->pliegues_supraespinal }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Abdominal</label>
                    <input type="number" class="form-control" name="pliegues_abdominal" value="{{ $examination->pliegues_abdominal }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Muslo</label>
                    <input type="number" class="form-control" name="pliegues_muslo" value="{{ $examination->pliegues_muslo }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pantorrilla</label>
                    <input type="number" class="form-control" name="pliegues_pantorrilla" value="{{ $examination->pliegues_pantorrilla }}">
                </div>

				<div class="divider"></div>
				
				<div class="mb-3">
					<label class="form-label">Sumatoria de 6 pliegues</label>
					<input type="number" class="form-control" name="suma_pliegues" value="{{ $examination->suma_pliegues }}">
				</div>
            </div>
        </div>

        {{-- Perímetros --}}
        <div class="card mb-4">
            <div class="card-header">Perímetros</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Brazo relajado (cm)</label>
                    <input type="number" class="form-control" name="perimetro_brazo_relajado" value="{{ $examination->perimetro_brazo_relajado }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Brazo flexionado (cm)</label>
                    <input type="number" class="form-control" name="perimetro_brazo_flexionado" value="{{ $examination->perimetro_brazo_flexionado }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cintura mínima (cm)</label>
                    <input type="number" class="form-control" name="perimetro_cintura_minima" value="{{ $examination->perimetro_cintura_minima }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cadera (cm)</label>
                    <input type="number" class="form-control" name="perimetro_cadera" value="{{ $examination->perimetro_cadera }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Muslo (cm)</label>
                    <input type="number" class="form-control" name="perimetro_muslo" value="{{ $examination->perimetro_muslo }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pantorrilla (cm)</label>
                    <input type="number" class="form-control" name="perimetro_pantorrilla" value="{{ $examination->perimetro_pantorrilla }}">
                </div>

            </div>
        </div>

        {{-- Índices --}}
        <div class="card mb-4">
            <div class="card-header">Índices corporales</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Índice cintura-cadera</label>
                    <input type="number" class="form-control" name="valor_indice_cintura_cadera" value="{{ $examination->valor_indice_cintura_cadera }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_indice_cintura_cadera">
                        @foreach(['Bajo','Moderado','Alto','Muy alto'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_indice_cintura_cadera == $option)>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Índice de masa grasa</label>
                    <input type="number" class="form-control" name="valor_indice_masa_grasa" value="{{ $examination->valor_indice_masa_grasa }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_indice_masa_grasa">
                        @foreach(['Muy bajo','Bajo','Medio','Alto','Muy alto'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_indice_masa_grasa == $option)>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Índice de masa muscular</label>
                    <input type="number" class="form-control" name="valor_indice_masa_muscular" value="{{ $examination->valor_indice_masa_muscular }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_indice_masa_muscular">
                        @foreach(['Bajo','Moderado','Alto'] as $option)
                            <option value="{{ $option }}" @selected($examination->categoria_indice_masa_muscular == $option)>
                                {{ $option }}
                            </option>
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
