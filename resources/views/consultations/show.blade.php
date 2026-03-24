@extends('master')
@section('content')
<div class="container py-4">
	<h3 class="mb-4">Detalles de la Consulta</h3>
	{{-- OBLIGATORIA --}}
	{{-- Información básica --}}
	<div class="card mb-4">
		<div class="card-header">Datos generales</div>
		<div class="card-body">
			<p><strong>Paciente:</strong> {{ $consultation->getNombrePaciente() }}</p>
			<p><strong>Fecha de realización:</strong> {{ $consultation->fecha_realizacion }}</p>
			<p><strong>Talla:</strong> {{ $consultation->talla }} cm</p>
			<p><strong>Talla sentado:</strong> {{ $consultation->talla_sentado }} cm</p>
			<p><strong>Peso:</strong> {{ $consultation->peso }} kg</p>			
			<p><strong>Presion arterial:</strong> {{ $consultation->presion_arterial_maxima }}/{{ $consultation->presion_arterial_minima }} mmHg</p>

		</div>
	</div>

	{{-- OPCIONAL --}}
	{{-- Deporte --}}
	<div class="card mb-4">
		<div class="card-header">Deporte</div>
		<div class="card-body">
			<p><strong>Deporte:</strong> {{ $consultation->deporte ?? '-' }}</p>
			<p><strong>Club:</strong> {{ $consultation->club ?? '-' }}</p>
			<p><strong>Posición:</strong> {{ $consultation->posicion ?? '-' }}</p>
		</div>
	</div>

	{{-- Gimnasio --}}
	<div class="card mb-4">
		<div class="card-header">Gimnasio</div>
		<div class="card-body">
			<p><strong>Horas gimnasio:</strong> {{ $consultation->horas_gimnasio ?? '-' }}</p>
			<p><strong>Dias gimnasio:</strong> {{ $consultation->dias_gimnasio ?? '-' }}</p>
			<p><strong>Horas gimnasio semana:</strong> {{ $consultation->horas_semana_gimnasio ?? '-' }}</p>
		</div>
	</div>

	{{-- Entrenamiento --}}
	<div class="card mb-4">
	<div class="card-header">Entrenamiento</div>
		<div class="card-body">
			<p><strong>Horas entrenamiento:</strong> {{ $consultation->horas_entrenamiento ?? '-' }}</p>
			<p><strong>Dias entrenamiento:</strong> {{ $consultation->dias_entrenamiento ?? '-' }}</p>
			<p><strong>Horas entrenamiento semana:</strong> {{ $consultation->horas_semana_entrenamiento ?? '-' }}</p>
		</div>
	</div>

	{{-- Historial medico --}}
	<div class="card mb-4">
	<div class="card-header">Historial medico</div>
		<div class="card-body">
			<p><strong>Antecedentes personales:</strong> {{ $consultation->antecedentes_personales ?? '-' }}</p>
			<p><strong>Antecedentes familiares:</strong> {{ $consultation->antecedentes_familiares ?? '-' }}</p>
			<p><strong>Antecedentes de lesiones:</strong> {{ $consultation->antecedentes_lesiones ?? '-' }}</p>
		</div>
	</div>

	{{-- Historial estudios --}}
	<div class="card mb-4">
	<div class="card-header">Historial de estudios</div>
		<div class="card-body">
			<p><strong>Estudios laboratorio:</strong> {{ $consultation->estudios_laboratorio ?? '-' }}</p>
			<p><strong>Observaciones estudios laboratorio:</strong> {{ $consultation->observaciones_estudios_laboratorio ?? '-' }}</p>
			<p><strong>Estudios cardiologicos:</strong> {{ $consultation->estudios_cardiologicos ?? '-' }}</p>
			<p><strong>Observaciones estudios cardiologicos:</strong> {{ $consultation->observaciones_estudios_cardiologicos ?? '-' }}</p>
		</div>
	</div>

	{{-- Alimentacion --}}
	<div class="card mb-4">
	<div class="card-header">Alimentacion</div>
		<div class="card-body">
			<p><strong>Desayuna:</strong> {{ $consultation->desayuna == 1 ? 'SI' : 'NO' }}</p>
			<p><strong>Almuerza:</strong> {{ $consultation->almuerza == 1 ? 'SI' : 'NO' }}</p>
			<p><strong>Merienda:</strong> {{ $consultation->merienda == 1 ? 'SI' : 'NO' }}</p>
			<p><strong>Cena:</strong> {{ $consultation->cena == 1 ? 'SI' : 'NO' }}</p>
			<p><strong>Observaciones:</strong> {{ $consultation->observaciones_alimentacion ?? '-' }}</p>
		</div>
	</div>

	{{-- Observaciones --}}
	<div class="card mb-4">
		<div class="card-body">
			<p><strong>Observaciones:</strong> {{ $consultation->anotaciones ?? '-' }}</p>
		</div>
	</div>

	{{-- Examinaciones --}}
	<div class="card">
		<div class="card-header">
			Examinaciones asociadas
		</div>

		<div class="card-body d-flex flex-column gap-3">
			<div class="d-flex gap-2 align-items-center">
				<span>Examinación Antropogenical:</span>
				@if ($consultation->anthropogenicalExamination)
					<a href="{{ route('anthropogenical.show', $consultation->anthropogenicalExamination) }}" class="btn btn-primary btn-sm">
						Ver
					</a>
					<a href="{{ route('anthropogenical.edit', $consultation->anthropogenicalExamination) }}" class="btn btn-warning btn-sm">
						Editar
					</a>
					<form action="{{ route('anthropogenical.destroy', $consultation->anthropogenicalExamination) }}" method="POST" class="d-inline"
						onsubmit="return confirm('¿Estás seguro que quieres eliminar esta examen?');">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm" onClick=>
							Eliminar
						</button>
					</form>
				@else
					<button class="btn btn-secondary btn-sm" disabled>
						No creada
					</button>
				@endif
			</div>

			<div class="d-flex gap-2 align-items-center">
				<span>Examinación Antropométrica:</span>
				@if ($consultation->anthropometricalExamination)
					<a href="{{ route('anthropometrical.show', $consultation->anthropometricalExamination) }}" class="btn btn-primary btn-sm">
						Ver
					</a>
					<a href="{{ route('anthropometrical.edit', $consultation->anthropometricalExamination) }}" class="btn btn-warning btn-sm">
						Editar
					</a>
					<form action="{{ route('anthropometrical.destroy', $consultation->anthropometricalExamination) }}" method="POST" class="d-inline"
						onsubmit="return confirm('¿Estás seguro que quieres eliminar esta examen?');">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm" onClick=>
							Eliminar
						</button>
					</form>
				@else
					<button class="btn btn-secondary btn-sm" disabled>
						No creada
					</button>
				@endif
			</div>

			<div class="d-flex gap-2 align-items-center">
				<span>Examinación Física:</span>
				@if ($consultation->physicalConditionExamination)
					<a href="{{ route('physical.show', $consultation) }}" class="btn btn-primary btn-sm">
						Ver
					</a>
					<a href="{{ route('physical.edit', $consultation->physicalConditionExamination) }}" class="btn btn-warning btn-sm">
						Editar
					</a>
					<form action="{{ route('physical.destroy', $consultation->physicalConditionExamination) }}" method="POST" class="d-inline"
						onsubmit="return confirm('¿Estás seguro que quieres eliminar esta examen?');">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm" onClick=>
							Eliminar
						</button>
					</form>
				@else
					<button class="btn btn-secondary btn-sm" disabled>
						No creada
					</button>
				@endif
			</div>

			<div class="d-flex gap-2 align-items-center">
				<span>Examinación Postural:</span>
				@if ($consultation->postureExamination)
					<a href="{{ route('posture.show', $consultation->postureExamination) }}" class="btn btn-primary btn-sm">
						Ver
					</a>
					<a href="{{ route('posture.edit', $consultation->postureExamination) }}" class="btn btn-warning btn-sm">
						Editar
					</a>
					<form action="{{ route('posture.destroy', $consultation->postureExamination) }}" method="POST" class="d-inline"
						onsubmit="return confirm('¿Estás seguro que quieres eliminar esta examen?');">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm" onClick=>
							Eliminar
						</button>
					</form>
				@else
					<button class="btn btn-secondary btn-sm" disabled>
						No creada
					</button>
				@endif
			</div>

		</div>
	</div>

	{{-- Volver --}}
	<div class="mt-4">
		<a href="{{ route('consultations.index') }}" class="btn btn-outline-secondary">
			Volver
		</a>
	</div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
@stop