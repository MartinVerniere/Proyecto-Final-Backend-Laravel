@extends('master')
@section('content')
<div class="container py-4">
	<h3 class="mb-4">Detalles de la Consulta</h3>
	{{-- Información básica --}}
	<div class="card mb-4">
		<div class="card-body">
			<p><strong>Paciente:</strong> {{ $consultation->getNombrePaciente() }}</p>
			<p><strong>Fecha de realización:</strong> {{ $consultation->fecha_realizacion }}</p>
			<p><strong>Talla:</strong> {{ $consultation->talla }} cm</p>
			<p><strong>Talla sentado:</strong> {{ $examinacionAntropogenica->talla_sentado }} cm</p>
			<p><strong>Peso:</strong> {{ $consultation->peso }} kg</p>			
			<p><strong>Presion arterial:</strong> {{ $examinacionAntropogenica->presion_arterial }} mmHg</p>
			<p><strong>Deporte:</strong> {{ $consultation->deporte ?? '—' }}</p>
			<p><strong>Club:</strong> {{ $consultation->club ?? '—' }}</p>
			<p><strong>Posición:</strong> {{ $consultation->posicion ?? '—' }}</p>
		</div>
	</div>

	{{-- Examinaciones --}}
	<div class="card">
		<div class="card-header">
			Examinaciones asociadas
		</div>

		<div class="card-body d-flex flex-wrap gap-2">

			@if ($consultation->anthropogenicalExamination)
				<a href="{{ route('consultations.anthropogenical', $consultation) }}"
				class="btn btn-primary">
					Examinación Antropogénica
				</a>
			@else
				<button class="btn btn-secondary" disabled>
					Examinación Antropogénica
				</button>
			@endif

			@if ($consultation->anthropometricalExamination)
				<a href="{{ route('consultations.anthropometrical', $consultation) }}"
				class="btn btn-primary">
					Examinación Antropométrica
				</a>
			@else
				<button class="btn btn-secondary" disabled>
					Examinación Antropométrica
				</button>
			@endif

			@if ($consultation->physicalConditionExamination)
				<a href="{{ route('consultations.physical', $consultation) }}"
				class="btn btn-primary">
					Examinación Física
				</a>
			@else
				<button class="btn btn-secondary" disabled>
					Examinación Física
				</button>
			@endif

			@if ($consultation->postureExamination)
				<a href="{{ route('consultations.posture', $consultation) }}"
				class="btn btn-primary">
					Examinación Postural
				</a>
			@else
				<button class="btn btn-secondary" disabled>
					Examinación Postural
				</button>
			@endif

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