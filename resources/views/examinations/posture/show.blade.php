@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Postural</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $examinacionPostura->consultation->getNombrePaciente() }}</p>
            <p><strong>Fecha:</strong> {{ $examinacionPostura->fecha_realizacion }}</p>
        </div>
    </div>

    {{-- ================= IMÁGENES + KEYPOINTS ================= --}}

	@php
		function mapKeypointsNameXY($kp) {
			if (is_string($kp)) {
				$kp = json_decode($kp, true);
			}

			if (!is_array($kp)) {
				return [];
			}

			$mapped = [];

			foreach ($kp as $point) {
				if (!isset($point['name'], $point['x'], $point['y'])) {
					continue;
				}

				$mapped[$point['name']] = [
					'x' => $point['x'],
					'y' => $point['y'],
				];
			}

			return $mapped;
		}

		$imagenes = [
			[
				'title' => 'Frontal',
				'img' => $examinacionPostura->imagen_frontal,
				'kp'  => mapKeypointsNameXY($examinacionPostura->keypoints_frontal),
			],
			[
				'title' => 'Lateral derecha',
				'img' => $examinacionPostura->imagen_lateral_derecha,
				'kp'  => mapKeypointsNameXY($examinacionPostura->keypoints_lateral_derecha),
			],
			[
				'title' => 'Lateral izquierda',
				'img' => $examinacionPostura->imagen_lateral_izquierda,
				'kp'  => mapKeypointsNameXY($examinacionPostura->keypoints_lateral_izquierda),
			],
			[
				'title' => 'Posterior',
				'img' => $examinacionPostura->imagen_trasera,
				'kp'  => mapKeypointsNameXY($examinacionPostura->keypoints_trasera),
			],
		];
	@endphp

	<div class="card mb-4">
		<div class="card-header">
			Imágenes posturales
		</div>

		<div class="card-body">
			<div class="row g-4">
				@foreach($imagenes as $data)
					@if($data['img'])
					<div class="col-12">

						<div class="border rounded p-3">
							<h6 class="mb-3">{{ $data['title'] }}</h6>

							<div class="row align-items-start">
								{{-- Imagen --}}
								<div class="col-md-6 text-center">
									<img src="{{ $data['img'] }}"
										class="img-fluid rounded border">
								</div>

								{{-- Keypoints --}}
								<div class="col-md-6">
									<small class="fw-bold">Keypoints</small>

									@if(is_array($data['kp']) && count($data['kp']))
										<div class="small mt-2 font-monospace" style="line-height: 1.4;">
											@foreach($data['kp'] as $name => $coords)
												<div>
													<strong>{{ $name }}:</strong>
													({{ number_format($coords['x'], 1) }},
													{{ number_format($coords['y'], 1) }})
												</div>
											@endforeach
										</div>
									@else
										<p class="text-muted small mt-2">Sin keypoints</p>
									@endif
								</div>
							</div>

						</div>

					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>

    {{-- ================= SUBMODELOS ================= --}}

    {{-- Cabeza --}}
    @if($examinacionPostura->analisisCabeza)
    <div class="card mb-4">
        <div class="card-header">Cabeza</div>
        <div class="card-body">
            <p><strong>Plano:</strong> {{ $examinacionPostura->analisisCabeza->plano }}</p>
            <p><strong>Inclinación:</strong> {{ $examinacionPostura->analisisCabeza->inclinacion }}</p>
        </div>
    </div>
    @endif

    {{-- Hombros --}}
    @if($examinacionPostura->analisisHombrosEscapular)
    <div class="card mb-4">
        <div class="card-header">Hombros y escápulas</div>
        <div class="card-body">
            <p><strong>Inclinación:</strong> {{ $examinacionPostura->analisisHombrosEscapular->inclinacion }}</p>
            <p><strong>Escápula:</strong> {{ $examinacionPostura->analisisHombrosEscapular->escapula }}</p>
            <p><strong>Hombro:</strong> {{ $examinacionPostura->analisisHombrosEscapular->hombro }}</p>
        </div>
    </div>
    @endif

    {{-- Pelvis --}}
    @if($examinacionPostura->analisisPelvis)
    <div class="card mb-4">
        <div class="card-header">Pelvis</div>
        <div class="card-body">
            <p><strong>EIAS:</strong> {{ $examinacionPostura->analisisPelvis->eias }}</p>
            <p><strong>EIPS:</strong> {{ $examinacionPostura->analisisPelvis->eips }}</p>
            <p><strong>Relación:</strong> {{ $examinacionPostura->analisisPelvis->relacion }}</p>
            <p><strong>Rotación:</strong> {{ $examinacionPostura->analisisPelvis->rotacion }}</p>
        </div>
    </div>
    @endif

    {{-- Rodillas --}}
    @if($examinacionPostura->analisisRodilla)
    <div class="card mb-4">
        <div class="card-header">Rodillas</div>
        <div class="card-body">
            <p><strong>Genu:</strong> {{ $examinacionPostura->analisisRodilla->genu }}</p>
            <p><strong>Recurbatum:</strong> {{ $examinacionPostura->analisisRodilla->recurbatum }}</p>
        </div>
    </div>
    @endif

    {{-- Pivot --}}
    @if($examinacionPostura->analisisPivot)
    <div class="card mb-4">
        <div class="card-header">Pivot</div>
        <div class="card-body">
            <p><strong>Cervical:</strong> {{ $examinacionPostura->analisisPivot->cervical }}</p>
            <p><strong>Dorsal:</strong> {{ $examinacionPostura->analisisPivot->dorsal }}</p>
            <p><strong>Lumbar:</strong> {{ $examinacionPostura->analisisPivot->lumbar }}</p>
            <p><strong>Raquis:</strong> {{ $examinacionPostura->analisisPivot->raquis }}</p>
        </div>
    </div>
    @endif

    {{-- Observaciones --}}
    @if($examinacionPostura->observaciones)
    <div class="card mb-4">
        <div class="card-header">Observaciones</div>
        <div class="card-body">
            {{ $examinacionPostura->observaciones }}
        </div>
    </div>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
        Volver
    </a>

</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
@stop
