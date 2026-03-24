@extends('master')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Editar Examinación de Condición Física</h3>

    <form action="{{ route('posture.update', $examination->id) }}" method="POST">
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
				<div class="mb-3">
					<label for="plano" class="form-label">Plano</label>
					<select class="form-select" name="plano" id="plano">
						@foreach(['Adelantado', 'Neutro', 'Retrasado'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisCabeza->plano == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="inclinacion" class="form-label">Inclinación</label>
					<select class="form-select" name="inclinacion" id="inclinacion">
						@foreach(['Inclinacion derecha', 'Normal', 'Inclinacion izquierda'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisCabeza->inclinacion == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		@endif

		{{-- Hombros --}}
		@if($examination->analisisHombrosEscapular)
		<div class="card mb-4">
			<div class="card-header">Hombros y escápulas</div>
			<div class="card-body">
				<div class="mb-3">
					<label for="inclinacion_hombros" class="form-label">Inclinación</label>
					<select class="form-select" name="inclinacion_hombros" id="inclinacion_hombros">
						@foreach(['Inclinacion derecha', 'Normal', 'Inclinacion izquierda'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisHombrosEscapular->inclinacion == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="escapula" class="form-label">Escápula</label>
					<select class="form-select" name="escapula" id="escapula">
						@foreach(['Rotacion medial', 'Rotacion lateral'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisHombrosEscapular->escapula == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="hombro" class="form-label">Hombro</label>
					<select class="form-select" name="hombro" id="hombro">
						@foreach(['Antepulsion', 'Normal', 'Retropulsion'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisHombrosEscapular->hombro == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		@endif

		{{-- Pelvis --}}
		@if($examination->analisisPelvis)
		<div class="card mb-4">
			<div class="card-header">Pelvis</div>
			<div class="card-body">
				<div class="mb-3">
					<label for="eias" class="form-label">EIAS</label>
					<select class="form-select" name="eias" id="eias">
						@foreach(['Inclinacion izquierda', 'Normal', 'Inclinacion derecha'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPelvis->eias == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="eips" class="form-label">EIPS</label>
					<select class="form-select" name="eips" id="eips">
						@foreach(['Inclinacion izquierda', 'Normal', 'Inclinacion derecha'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPelvis->eips == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="relacion" class="form-label">Relación</label>
					<select class="form-select" name="relacion" id="relacion">
						@foreach(['Anteversion', 'Neutra', 'Retroversion'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPelvis->relacion == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="rotacion" class="form-label">Rotación</label>
					<select class="form-select" name="rotacion" id="rotacion">
						@foreach(['Izquierda', 'Neutra', 'Derecha'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPelvis->rotacion == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		@endif

		{{-- Rodillas --}}
		@if($examination->analisisRodilla)
		<div class="card mb-4">
			<div class="card-header">Rodillas</div>
			<div class="card-body">
				<div class="mb-3">
					<label for="genu" class="form-label">Genu</label>
					<select class="form-select" name="genu" id="genu">
						@foreach(['Varo', 'Valgo', 'Normal'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisRodilla->genu == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="recurvatum" class="form-label">Recurvatum</label>
					<select class="form-select" name="recurvatum" id="recurvatum">
						@foreach(['Recurvatum', 'Flexo', 'Normal'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisRodilla->recurvatum == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		@endif

		{{-- Pivot --}}
		@if($examination->analisisPivot)
		<div class="card mb-4">
			<div class="card-header">Pivot</div>
			<div class="card-body">
				<div class="mb-3">
					<label for="cervical" class="form-label">Cervical</label>
					<select class="form-select" name="cervical" id="cervical">
						@foreach(['Lordotico', 'Normal', 'Rectificado', 'Cifotico'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPivot->cervical == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="dorsal" class="form-label">Dorsal</label>
					<select class="form-select" name="dorsal" id="dorsal">
						@foreach(['Lordotico', 'Normal', 'Rectificado', 'Cifotico'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPivot->dorsal == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="lumbar" class="form-label">Lumbar</label>
					<select class="form-select" name="lumbar" id="lumbar">
						@foreach(['Lordotico', 'Normal', 'Rectificado', 'Cifotico'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPivot->lumbar == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-3">
					<label for="raquis" class="form-label">Raquis</label>
					<select class="form-select" name="raquis" id="raquis">
						@foreach(['Escoliotico', 'Rectificado'] as $option)
							<option value="{{ $option }}" @selected($examination->analisisPivot->raquis == $option)>{{ $option }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		@endif

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
