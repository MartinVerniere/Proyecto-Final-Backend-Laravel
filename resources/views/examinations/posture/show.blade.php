@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Examinación Postural</h3>

    {{-- Datos generales --}}
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $examination->consultation->getNombrePaciente() }}</p>
            <p><strong>Fecha:</strong> {{ $examination->fecha_realizacion }}</p>
        </div>
    </div>

	{{-- Medidas básicas --}}
    <div class="card mb-4">
        <div class="card-header">Medidas</div>
        <div class="card-body">
            <p><strong>Talla paciente:</strong> {{ $examination->talla_paciente }} cm</p>
			<p><strong>Talla paciente sentado:</strong> {{ $examination->talla_paciente_sentado }} cm</p>
            <p><strong>Peso paciente:</strong> {{ $examination->peso_paciente }} kg</p>
			<p><strong>Presion arterial:</strong> {{ $examination->presion_arterial_maxima_paciente }}/{{ $examination->presion_arterial_minima_paciente }} mmHg</p>
        </div>
    </div>

	{{-- Imagenes --}}
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

    {{-- Cabeza --}}
    @if($examination->analisisCabeza)
    <div class="card mb-4">
        <div class="card-header">Cabeza</div>
        <div class="card-body">
            <p><strong>Plano:</strong> {{ $examination->analisisCabeza->plano }}</p>
            <p><strong>Inclinación:</strong> {{ $examination->analisisCabeza->inclinacion }}</p>
        </div>
    </div>
    @endif

    {{-- Hombros --}}
    @if($examination->analisisHombrosEscapular)
    <div class="card mb-4">
        <div class="card-header">Hombros y escápulas</div>
        <div class="card-body">
            <p><strong>Inclinación:</strong> {{ $examination->analisisHombrosEscapular->inclinacion }}</p>
            <p><strong>Escápula:</strong> {{ $examination->analisisHombrosEscapular->escapula }}</p>
            <p><strong>Hombro:</strong> {{ $examination->analisisHombrosEscapular->hombro }}</p>
        </div>
    </div>
    @endif

    {{-- Pelvis --}}
    @if($examination->analisisPelvis)
    <div class="card mb-4">
        <div class="card-header">Pelvis</div>
        <div class="card-body">
            <p><strong>EIAS:</strong> {{ $examination->analisisPelvis->eias }}</p>
            <p><strong>EIPS:</strong> {{ $examination->analisisPelvis->eips }}</p>
            <p><strong>Relación:</strong> {{ $examination->analisisPelvis->relacion }}</p>
            <p><strong>Rotación:</strong> {{ $examination->analisisPelvis->rotacion }}</p>
        </div>
    </div>
    @endif

    {{-- Rodillas --}}
    @if($examination->analisisRodilla)
    <div class="card mb-4">
        <div class="card-header">Rodillas</div>
        <div class="card-body">
            <p><strong>Genu:</strong> {{ $examination->analisisRodilla->genu }}</p>
            <p><strong>Recurvatum:</strong> {{ $examination->analisisRodilla->recurvatum }}</p>
        </div>
    </div>
    @endif

    {{-- Pivot --}}
    @if($examination->analisisPivot)
    <div class="card mb-4">
        <div class="card-header">Pivot</div>
        <div class="card-body">
            <p><strong>Cervical:</strong> {{ $examination->analisisPivot->cervical }}</p>
            <p><strong>Dorsal:</strong> {{ $examination->analisisPivot->dorsal }}</p>
            <p><strong>Lumbar:</strong> {{ $examination->analisisPivot->lumbar }}</p>
            <p><strong>Raquis:</strong> {{ $examination->analisisPivot->raquis }}</p>
        </div>
    </div>
    @endif

    {{-- Observaciones --}}
    @if($examination->observaciones)
    <div class="card mb-4">
        <div class="card-header">Observaciones</div>
        <div class="card-body">
            {{ $examination->observaciones }}
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
