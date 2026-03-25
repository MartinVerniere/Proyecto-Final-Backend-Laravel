@extends('master')
@section('content')
<div class="container py-4">
    <h3 class="mb-4">Editar Consulta</h3>

    <form action="{{ route('consultations.update', $consultation) }}" method="POST" onsubmit="return confirm('Si ha modificado la fecha de consulta, las edades calculadas con las fechas en las examinaciones no serán modificadas. Por lo tanto, las examinaciones podrían tener valores **desactualizados** en los atributos. ¿Está seguro de que desea continuar?')">
        @csrf
        @method('PUT')

        {{-- Datos generales --}}
        <div class="card mb-4">
            <div class="card-header">Datos generales</div>
            <div class="card-body">
                <p><strong>Paciente:</strong> {{ $consultation->getNombrePaciente() }}</p>

                <div class="mb-3">
                    <label for="fecha_realizacion" class="form-label">Fecha de realización</label>
                    <input type="date" class="form-control" id="fecha_realizacion" name="fecha_realizacion" value="{{ old('fecha_realizacion', $consultation->fecha_realizacion) }}">
                </div>

                <div class="mb-3">
                    <label for="talla" class="form-label">Talla (cm)</label>
                    <input type="number" class="form-control" id="talla" name="talla" value="{{ old('talla', $consultation->talla) }}">
                </div>

                <div class="mb-3">
                    <label for="talla_sentado" class="form-label">Talla sentado (cm)</label>
                    <input type="number" class="form-control" id="talla_sentado" name="talla_sentado" value="{{ old('talla_sentado', $consultation->talla_sentado) }}">
                </div>

                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input type="number" class="form-control" id="peso" name="peso" value="{{ old('peso', $consultation->peso) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Presión arterial (mmHg)</label>
                    <div class="d-flex gap-2">
                        <input type="number" class="form-control" name="presion_arterial_maxima" placeholder="Máxima" value="{{ old('presion_arterial_maxima', $consultation->presion_arterial_maxima) }}">
                        <input type="number" class="form-control" name="presion_arterial_minima" placeholder="Mínima" value="{{ old('presion_arterial_minima', $consultation->presion_arterial_minima) }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Deporte --}}
        <div class="card mb-4">
            <div class="card-header">Deporte</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="deporte" class="form-label">Deporte</label>
                    <input type="text" class="form-control" id="deporte" name="deporte" value="{{ old('deporte', $consultation->deporte) }}">
                </div>
                <div class="mb-3">
                    <label for="club" class="form-label">Club</label>
                    <input type="text" class="form-control" id="club" name="club" value="{{ old('club', $consultation->club) }}">
                </div>
                <div class="mb-3">
                    <label for="posicion" class="form-label">Posición</label>
                    <input type="text" class="form-control" id="posicion" name="posicion" value="{{ old('posicion', $consultation->posicion) }}">
                </div>
            </div>
        </div>

        {{-- Gimnasio --}}
        <div class="card mb-4">
            <div class="card-header">Gimnasio</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="horas_gimnasio" class="form-label">Horas gimnasio</label>
                    <input type="number" class="form-control" id="horas_gimnasio" name="horas_gimnasio" value="{{ old('horas_gimnasio', $consultation->horas_gimnasio) }}">
                </div>
                <div class="mb-3">
                    <label for="dias_gimnasio" class="form-label">Días gimnasio</label>
                    <input type="number" class="form-control" id="dias_gimnasio" name="dias_gimnasio" value="{{ old('dias_gimnasio', $consultation->dias_gimnasio) }}">
                </div>
                <div class="mb-3">
                    <label for="horas_semana_gimnasio" class="form-label">Horas gimnasio por semana</label>
                    <input type="number" class="form-control" id="horas_semana_gimnasio" name="horas_semana_gimnasio" value="{{ old('horas_semana_gimnasio', $consultation->horas_semana_gimnasio) }}">
                </div>
            </div>
        </div>

        {{-- Entrenamiento --}}
        <div class="card mb-4">
            <div class="card-header">Entrenamiento</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="horas_entrenamiento" class="form-label">Horas entrenamiento</label>
                    <input type="number" class="form-control" id="horas_entrenamiento" name="horas_entrenamiento" value="{{ old('horas_entrenamiento', $consultation->horas_entrenamiento) }}">
                </div>
                <div class="mb-3">
                    <label for="dias_entrenamiento" class="form-label">Días entrenamiento</label>
                    <input type="number" class="form-control" id="dias_entrenamiento" name="dias_entrenamiento" value="{{ old('dias_entrenamiento', $consultation->dias_entrenamiento) }}">
                </div>
                <div class="mb-3">
                    <label for="horas_semana_entrenamiento" class="form-label">Horas entrenamiento por semana</label>
                    <input type="number" class="form-control" id="horas_semana_entrenamiento" name="horas_semana_entrenamiento" value="{{ old('horas_semana_entrenamiento', $consultation->horas_semana_entrenamiento) }}">
                </div>
            </div>
        </div>

        {{-- Historial médico --}}
        <div class="card mb-4">
            <div class="card-header">Historial médico</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="antecedentes_personales" class="form-label">Antecedentes personales</label>
                    <textarea class="form-control" id="antecedentes_personales" name="antecedentes_personales">{{ old('antecedentes_personales', $consultation->antecedentes_personales) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="antecedentes_familiares" class="form-label">Antecedentes familiares</label>
                    <textarea class="form-control" id="antecedentes_familiares" name="antecedentes_familiares">{{ old('antecedentes_familiares', $consultation->antecedentes_familiares) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="antecedentes_lesiones" class="form-label">Antecedentes de lesiones</label>
                    <textarea class="form-control" id="antecedentes_lesiones" name="antecedentes_lesiones">{{ old('antecedentes_lesiones', $consultation->antecedentes_lesiones) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Historial de estudios --}}
        <div class="card mb-4">
            <div class="card-header">Historial de estudios</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="estudios_laboratorio" class="form-label">Estudios laboratorio</label>
                    <textarea class="form-control" id="estudios_laboratorio" name="estudios_laboratorio">{{ old('estudios_laboratorio', $consultation->estudios_laboratorio) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="observaciones_estudios_laboratorio" class="form-label">Observaciones estudios laboratorio</label>
                    <input type="text" class="form-control" id="observaciones_estudios_laboratorio" name="observaciones_estudios_laboratorio" value="{{ old('observaciones_estudios_laboratorio', $consultation->observaciones_estudios_laboratorio) }}">
                </div>
                <div class="mb-3">
                    <label for="estudios_cardiologicos" class="form-label">Estudios cardiológicos</label>
                    <textarea class="form-control" id="estudios_cardiologicos" name="estudios_cardiologicos">{{ old('estudios_cardiologicos', $consultation->estudios_cardiologicos) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="observaciones_estudios_cardiologicos" class="form-label">Observaciones estudios cardiológicos</label>
                    <input type="text" class="form-control" id="observaciones_estudios_cardiologicos" name="observaciones_estudios_cardiologicos" value="{{ old('observaciones_estudios_cardiologicos', $consultation->observaciones_estudios_cardiologicos) }}">
                </div>
            </div>
        </div>

        {{-- Alimentación --}}
        <div class="card mb-4">
            <div class="card-header">Alimentación</div>
            <div class="card-body">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="desayuna" name="desayuna" value="1" {{ $consultation->desayuna ? 'checked' : '' }}>
                    <label class="form-check-label" for="desayuna">Desayuna</label>
                </div>
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="almuerza" name="almuerza" value="1" {{ $consultation->almuerza ? 'checked' : '' }}>
                    <label class="form-check-label" for="almuerza">Almuerza</label>
                </div>
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="merienda" name="merienda" value="1" {{ $consultation->merienda ? 'checked' : '' }}>
                    <label class="form-check-label" for="merienda">Merienda</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="cena" name="cena" value="1" {{ $consultation->cena ? 'checked' : '' }}>
                    <label class="form-check-label" for="cena">Cena</label>
                </div>

                <div class="mb-3">
                    <label for="hidratacion" class="form-label">Hidratación (litros)</label>
                    <input type="number" class="form-control" id="hidratacion" name="hidratacion" value="{{ old('hidratacion', $consultation->hidratacion) }}">
                </div>

                <div class="mb-3">
                    <label for="observaciones_alimentacion" class="form-label">Observaciones</label>
                    <textarea class="form-control" id="observaciones_alimentacion" name="observaciones_alimentacion">{{ old('observaciones_alimentacion', $consultation->observaciones_alimentacion) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Observaciones generales --}}
        <div class="card mb-4">
            <div class="card-header">Observaciones</div>
            <div class="card-body">
                <textarea class="form-control" id="anotaciones" name="anotaciones">{{ old('anotaciones', $consultation->anotaciones) }}</textarea>
            </div>
        </div>

        {{-- Botones --}}
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{ route('consultations.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop