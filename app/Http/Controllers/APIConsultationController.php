<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\KneeExamination;
use App\Models\FeetExamination;
use App\Models\PivotExamination;
use App\Http\Resources\ConsultationResource;

class APIConsultationController extends Controller
{
    public function index(){
        return ConsultationResource::collection(Consultation::all());
    }

    public function indexByPatient($id_paciente) {
        return ConsultationResource::collection(Consultation::where('id_paciente', $id_paciente)->get());
    }

    public function show($id) {
        return new ConsultationResource(Consultation::find($id));
    }

    public function store(Request $request) {
        $anthropogenicalExamination = $request->examinacionAntropogenica;
        $anthropometricalExamination = $request->examinacionAntropometrica;
        $physicalConditionExamination = $request->examinacionCondicionFisica;
        $postureExamination = $request->examinacionPostura;

        $validatedConsultation = $this->validateNuevaConsulta($request);
    
        if ($validatedConsultation) {
            if ($anthropogenicalExamination) {
                $validatedAnthropogenicalExamination = $this->validateNuevaExaminacionAntropogenica($request);
                if (!$validatedAnthropogenicalExamination) {
                    return response()->json(['error' => $validatedAnthropogenicalExamination], 400);
                }
            }

            if ($anthropometricalExamination) {
                $validatedAnthropometricalExamination = $this->validateNuevaExaminacionAntropometrica($request);
                if (!$validatedAnthropometricalExamination) {
                    return response()->json(['error' => $validatedAnthropometricalExamination], 400);
                }
            }

            if ($physicalConditionExamination) {
                $validatedPhysicalConditionExamination = $this->validateNuevaExaminacionCondicionFisica($request);
                if (!$validatedPhysicalConditionExamination) {
                    return response()->json(['error' => $validatedPhysicalConditionExamination], 400);
                }
            }

            if ($postureExamination) {
                $validatedPostureExamination = $this->validateNuevaExaminacionPostura($request);
                if (!$validatedPostureExamination) {
                    return response()->json(['error' => $validatedPostureExamination], 400);
                }
            }

            $ultima_consulta_id = Consultation::agregarConsulta($request);

            if ($anthropogenicalExamination) {
                $dataAnthropogenicalExamination = [
                    'id_consulta' => $ultima_consulta_id,
                    'fecha_realizacion' => $request->fecha_realizacion,
                    'talla_paciente' => $request->talla_paciente,
                    'peso_paciente' => $request->peso_paciente,
                    'longitud_pierna' => $request->examinacionAntropogenica['longitud_pierna'],
                    'talla_padre' => $request->examinacionAntropogenica['talla_padre'],
                    'talla_madre' => $request->examinacionAntropogenica['talla_madre'],
                    'talla_adulta' => $request->examinacionAntropogenica['talla_adulta'],
                    'talla_objetiva_genetica' => $request->examinacionAntropogenica['talla_objetiva_genetica'],
                    'talla_falta_crecer' => $request->examinacionAntropogenica['talla_falta_crecer'],
                    'valor_IRMI' => $request->examinacionAntropogenica['valor_IRMI'],
                    'categoria_IRMI' => $request->examinacionAntropogenica['categoria_IRMI'],
                    'valor_indice_cormico' => $request->examinacionAntropogenica['valor_indice_cormico'],
                    'categoria_indice_cormico' => $request->examinacionAntropogenica['categoria_indice_cormico'],
                    'valor_indice_masa_corporal' => $request->examinacionAntropogenica['valor_indice_masa_corporal'],
                    'categoria_indice_masa_corporal' => $request->examinacionAntropogenica['categoria_indice_masa_corporal'],
                    'valor_estadio_tanner' => $request->examinacionAntropogenica['valor_estadio_tanner'],
                    'categoria_estadio_tanner' => $request->examinacionAntropogenica['categoria_estadio_tanner'],
                    'valor_indice_madurativo' => $request->examinacionAntropogenica['valor_indice_madurativo'],
                    'valor_edad_PHV' => $request->examinacionAntropogenica['valor_edad_PHV'],
                    'categoria_edad_PHV' => $request->examinacionAntropogenica['categoria_edad_PHV'],
                ];
                AnthropogenicalExamination::añadirExaminacionAntropogenica(new Request($dataAnthropogenicalExamination));
            }

            if ($anthropometricalExamination) {
                $dataAnthropometricalExamination = [
                    'id_consulta' => $ultima_consulta_id,
                    'fecha_realizacion' => $request->fecha_realizacion,
                    'talla_paciente' => $request->talla_paciente,
                    'peso_paciente' => $request->peso_paciente,
                    'pliegues_triceps' => $request->examinacionAntropometrica['pliegues_triceps'],
                    'pliegues_subescapular' => $request->examinacionAntropometrica['pliegues_subescapular'],
                    'pliegues_supraespinal' => $request->examinacionAntropometrica['pliegues_supraespinal'],
                    'pliegues_abdominal' => $request->examinacionAntropometrica['pliegues_abdominal'],
                    'pliegues_muslo' => $request->examinacionAntropometrica['pliegues_muslo'],
                    'pliegues_pantorrilla' => $request->examinacionAntropometrica['pliegues_pantorrilla'],
                    'perimetro_brazo_relajado' => $request->examinacionAntropometrica['perimetro_brazo_relajado'],
                    'perimetro_brazo_flexionado' => $request->examinacionAntropometrica['perimetro_brazo_flexionado'],
                    'perimetro_cintura_minima' => $request->examinacionAntropometrica['perimetro_cintura_minima'],
                    'perimetro_cadera' => $request->examinacionAntropometrica['perimetro_cadera'],
                    'perimetro_muslo' => $request->examinacionAntropometrica['perimetro_muslo'],
                    'perimetro_pantorrilla' => $request->examinacionAntropometrica['perimetro_pantorrilla'],
                    'valor_indice_cintura_cadera' => $request->examinacionAntropometrica['valor_indice_cintura_cadera'],
                    'categoria_indice_cintura_cadera' => $request->examinacionAntropometrica['categoria_indice_cintura_cadera'],
                    'valor_indice_masa_grasa' => $request->examinacionAntropometrica['valor_indice_masa_grasa'],
                    'categoria_indice_masa_grasa' => $request->examinacionAntropometrica['categoria_indice_masa_grasa'],
                    'valor_indice_masa_muscular' => $request->examinacionAntropometrica['valor_indice_masa_muscular'],
                    'categoria_indice_masa_muscular' => $request->examinacionAntropometrica['categoria_indice_masa_muscular'],
                    'suma_pliegues' => $request->examinacionAntropometrica['suma_pliegues'],
                ];
                AnthropometricalExamination::añadirExaminacionAntropometrica(new Request($dataAnthropometricalExamination));
            }

            if ($physicalConditionExamination) {
                $dataPhysicalConditionExamination = [
                    'id_consulta' => $ultima_consulta_id,
                    'fecha_realizacion' => $request->fecha_realizacion,
                    'valor_fuerza_presion_manual' => $request->examinacionCondicionFisica['valor_fuerza_presion_manual'],
                    'categoria_fuerza_presion_manual' => $request->examinacionCondicionFisica['categoria_fuerza_presion_manual'],
                    'valor_fuerza_explosiva' => $request->examinacionCondicionFisica['valor_fuerza_explosiva'],
                    'categoria_fuerza_explosiva' => $request->examinacionCondicionFisica['categoria_fuerza_explosiva'],
                    'valor_mobilidad_tobillo' => $request->examinacionCondicionFisica['valor_mobilidad_tobillo'],
                    'categoria_mobilidad_tobillo' => $request->examinacionCondicionFisica['categoria_mobilidad_tobillo'],
                ];
                PhysicalConditionExamination::añadirExaminacionFisica(new Request($dataPhysicalConditionExamination));
            }

            if ($postureExamination) {
                $dataPostureExamination = [
                    'id_consulta' => $ultima_consulta_id,
                    'fecha_realizacion' => $request->fecha_realizacion,
                    'observaciones' => "OBSERVACIONES",
                ];
                $ultima_examinacion_postura_id = PostureExamination::añadirExaminacionPostura(new Request($dataPostureExamination));

                $dataHeadExamination = [
                    'id_examinacion_postura' => $ultima_examinacion_postura_id,
                    'plano' => $request->examinacionPostura['plano_cabeza'],
                    'inclinacion' => $request->examinacionPostura['inclinacion_cabeza'],
                    'mirada' => $request->examinacionPostura['mirada_cabeza'],
                    'caries' => $request->examinacionPostura['caries_cabeza'],
                    'oclusion' => $request->examinacionPostura['oclusion_cabeza'],
                ];

                HeadExamination::añadirExaminacionCabeza(new Request($dataHeadExamination));

                $dataShouldersExamination = [
                    'id_examinacion_postura' => $ultima_examinacion_postura_id,
                    'inclinacion' => $request->examinacionPostura['inclinacion_hombros'],
                    'musculatura' => $request->examinacionPostura['musculatura_hombros'],
                    'escapula' => $request->examinacionPostura['escapula_hombros'],
                    'hombro' => $request->examinacionPostura['hombro_hombros'],
                    'triangulo_de_talle' => $request->examinacionPostura['triangulo_de_talle_hombros'],
                ];

                ShouldersExamination::añadirExaminacionHombrosEscapular(new Request($dataShouldersExamination));

                $dataPelvisExamination = [
                    'id_examinacion_postura' => $ultima_examinacion_postura_id,
                    'eias' => $request->examinacionPostura['eias_pelvis'],
                    'eips' => $request->examinacionPostura['eips_pelvis'],
                    'relacion' => $request->examinacionPostura['relacion_pelvis'],
                    'rotacion' => $request->examinacionPostura['rotacion_pelvis'],
                ];

                PelvisExamination::añadirExaminacionPelvis(new Request($dataPelvisExamination));

                $dataKneeExamination = [
                    'id_examinacion_postura' => $ultima_examinacion_postura_id,
                    'genu' => $request->examinacionPostura['genu_rodilla'],
                    'morfotipo_torsional' => $request->examinacionPostura['morfotipo_torsional_rodilla'],
                    'tipologia_rotulas' => $request->examinacionPostura['tipologia_rotulas_rodilla'],
                ];

                KneeExamination::añadirExaminacionRodilla(new Request($dataKneeExamination));

                $dataFeetExamination = [
                    'id_examinacion_postura' => $ultima_examinacion_postura_id,
                    'eje_posterior' => $request->examinacionPostura['eje_posterior_pie'],
                    'eje_anterior' => $request->examinacionPostura['eje_anterior_pie'],
                    'tipologia' => $request->examinacionPostura['tipologia_pie'],
                    'dedos_en_garra' => $request->examinacionPostura['dedos_en_garra_pie'],
                ];

                FeetExamination::añadirExaminacionPies(new Request($dataFeetExamination));

                $dataPivotExamination = [
                    'id_examinacion_postura' => $ultima_examinacion_postura_id,
                    'cervical_C4_C5' => $request->examinacionPostura['cervical_C4_C5_pivot'],
                    'dorsal_D8' => $request->examinacionPostura['dorsal_D8_pivot'],
                    'lumbar_L3' => $request->examinacionPostura['lumbar_L3_pivot'],
                    'raquis_escoliotico' => $request->examinacionPostura['raquis_escoliotico_pivot'],
                    'raquis_cifolordotico' => $request->examinacionPostura['raquis_cifolordotico_pivot'],
                    'raquis_rectificado' => $request->examinacionPostura['raquis_rectificado_pivot'],
                ];

                PivotExamination::añadirExaminacionPivot(new Request($dataPivotExamination));
            }
        
            return response()->json(['message' => 'Consulta creada correctamente'], 200);
        }
        else {
            return response()->json(['error' => $validatedConsultation], 400);
        }
    }

    private function validateNuevaConsulta(Request $request) {
        $validated = $request->validate([
            'id_paciente' => 'required|exists:patients,id',
            'fecha_realizacion' => 'required|date',
            'talla_paciente' => 'required|numeric',
            'peso_paciente' => 'required|numeric',
            'deporte' => 'sometimes|string',
            'horas_gimnasio' => 'sometimes|integer',
            'dias_gimnasio' => 'sometimes|integer',
            'horas_semana_gimnasio' => 'sometimes|integer',
            'horas_entrenamiento' => 'sometimes|integer',
            'dias_entrenamiento' => 'sometimes|integer',
            'horas_semana_entrenamiento' => 'sometimes|integer',
            'club' => 'sometimes|string',
            'posicion' => 'sometimes|string',
            'antecedentes_personales' => 'sometimes|text',
            'antecedentes_familiares' => 'sometimes|text',
            'antecedentes_lesiones' => 'sometimes|text',
            'estudios_laboratorio' => 'sometimes|text',
            'observaciones_estudios_laboratorio' => 'sometimes|string',
            'estudio_cardiologico' => 'sometimes|text',
            'observaciones_estudio_cardiologico' => 'sometimes|string',
            'desayuna' => 'sometimes|boolean',
            'almuerza' => 'sometimes|boolean',
            'merienda' => 'sometimes|boolean',
            'cena' => 'sometimes|boolean',
            'hidratacion' => 'sometimes|numeric',
            'anotaciones' => 'sometimes|text',
        ]);
        return $validated;
    }

    private function validateNuevaExaminacionAntropogenica(Request $request){
        $validated = $request->validate([
            'fecha_realizacion' => 'required|date',
            'examinacionAntropogenica.longitud_pierna' => 'required|numeric',
            'examinacionAntropogenica.talla_padre' => 'required|numeric',
            'examinacionAntropogenica.talla_madre' => 'required|numeric',
            'examinacionAntropogenica.talla_adulta' => 'required|numeric',
            'examinacionAntropogenica.talla_objetiva_genetica' => 'required|numeric',
            'examinacionAntropogenica.talla_falta_crecer' => 'required|numeric',
            'examinacionAntropogenica.valor_IRMI' => 'required|numeric', 
            'examinacionAntropogenica.categoria_IRMI' => 'required|in:0,1,2',
            'examinacionAntropogenica.valor_indice_cormico' => 'required|numeric',
            'examinacionAntropogenica.categoria_indice_cormico' => 'required|in:Corto,Medio,Largo',
            'examinacionAntropogenica.valor_indice_masa_corporal' => 'required|numeric',
            'examinacionAntropogenica.categoria_indice_masa_corporal' => 'required|in:Peso insuficiente,Normopeso,Sobrepeso tipo I,Sobrepeso tipo II,Obesidad tipo I,Obesidad tipo II,Obesidad tipo III',
            'examinacionAntropogenica.valor_estadio_tanner' => 'required|numeric',
            'examinacionAntropogenica.categoria_estadio_tanner' => 'required|in:I,II,III,IV,V',
            'examinacionAntropogenica.valor_indice_madurativo' => 'required|numeric',
            'examinacionAntropogenica.valor_edad_PHV' => 'required|numeric',
            'examinacionAntropogenica.categoria_edad_PHV' => 'required|in:Temprano,Normal,Tardio',
        ]);
        return $validated;
    }

    private function validateNuevaExaminacionAntropometrica(Request $request){
        $validated = $request->validate([
            'fecha_realizacion' => 'required|date',
            'examinacionAntropometrica.pliegues_triceps' => 'required|integer',
            'examinacionAntropometrica.pliegues_subescapular' => 'required|integer',
            'examinacionAntropometrica.pliegues_supraespinal' => 'required|integer',
            'examinacionAntropometrica.pliegues_abdominal' => 'required|integer',
            'examinacionAntropometrica.pliegues_muslo' => 'required|integer',
            'examinacionAntropometrica.pliegues_pantorrilla' => 'required|integer',
            'examinacionAntropometrica.perimetro_brazo_relajado' => 'required|numeric',
            'examinacionAntropometrica.perimetro_brazo_flexionado' => 'required|numeric',
            'examinacionAntropometrica.perimetro_cintura_minima' => 'required|numeric',
            'examinacionAntropometrica.perimetro_cadera' => 'required|numeric',
            'examinacionAntropometrica.perimetro_muslo' => 'required|numeric',
            'examinacionAntropometrica.perimetro_pantorrilla' => 'required|numeric',
            'examinacionAntropometrica.valor_indice_cintura_cadera' => 'required|numeric',
            'examinacionAntropometrica.categoria_indice_cintura_cadera' => 'required|in:Bajo,Moderado,Alto,Muy alto',
            'examinacionAntropometrica.valor_indice_masa_grasa' => 'required|numeric',
            'examinacionAntropometrica.categoria_indice_masa_grasa' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'examinacionAntropometrica.valor_indice_masa_muscular' => 'required|numeric',
            'examinacionAntropometrica.categoria_indice_masa_muscular' => 'required|in:Bajo,Moderado,Alto',
            'examinacionAntropometrica.suma_pliegues' => 'required|integer',
        ]);
        return $validated;
    }

    private function validateNuevaExaminacionCondicionFisica(Request $request){
        $validated = $request->validate([
            'fecha_realizacion' => 'required|date',
            'examinacionCondicionFisica.valor_fuerza_presion_manual' => 'required|numeric',
            'examinacionCondicionFisica.categoria_fuerza_presion_manual' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'examinacionCondicionFisica.valor_fuerza_explosiva' => 'required|numeric',
            'examinacionCondicionFisica.categoria_fuerza_explosiva' => 'required|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'examinacionCondicionFisica.valor_mobilidad_tobillo' => 'required|numeric',
            'examinacionCondicionFisica.categoria_mobilidad_tobillo' => 'required|in:Rigidez,Bien',
        ]);
        return $validated;
    }

    private function validateNuevaExaminacionPostura(Request $request){
        $validated = $request->validate([
            'fecha_realizacion' => 'required|date',
            'examinacionPostura.plano_cabeza' => 'required|in:Adelantado,Neutro,Retrasado',
            'examinacionPostura.inclinacion_cabeza' => 'required|in:SI,NO',
            'examinacionPostura.mirada_cabeza' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
            'examinacionPostura.caries_cabeza' => 'required|in:SI,NO',
            'examinacionPostura.oclusion_cabeza' => 'required|in:Bien,Mal',
            'examinacionPostura.inclinacion_hombros' => 'required|in:Inclinacion derecha,Normal,Inclinacion izquierda',
            'examinacionPostura.musculatura_hombros' => 'required|in:Hipertonica,Normal,Hipotonica',
            'examinacionPostura.escapula_hombros' => 'required|in:Rotacion medial,Rotacion lateral,Angulo inferior izquierdo,Angulo inferior derecho,Aladas,Alineadas',
            'examinacionPostura.hombro_hombros' => 'required|in:Antepulsion,Normal,Retropulsion',
            'examinacionPostura.triangulo_de_talle_hombros' => 'required|in:Normal,Aumentado',
            'examinacionPostura.eias_pelvis' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
            'examinacionPostura.eips_pelvis' => 'required|in:Inclinacion izquierda,Normal,Inclinacion derecha',
            'examinacionPostura.relacion_pelvis' => 'required|in:Anteversion,Neutra,Retroversion',
            'examinacionPostura.rotacion_pelvis' => 'required|in:Izquierda,Neutra,Derecha',
            'examinacionPostura.genu_rodilla' => 'required|in:Varo,Valgo,Recurbatum,Flexo,Normal',
            'examinacionPostura.morfotipo_torsional_rodilla' => 'required|in:SI,NO',
            'examinacionPostura.tipologia_rotulas_rodilla' => 'required|in:Convexa,Normal,Divergente',
            'examinacionPostura.eje_posterior_pie' => 'required|in:Supinador,Neutro,Pronador',
            'examinacionPostura.eje_anterior_pie' => 'required|in:Valgo,Neutra,Varo',
            'examinacionPostura.tipologia_pie' => 'required|in:Egipcio,Griego,Romano',
            'examinacionPostura.dedos_en_garra_pie' => 'required|in:SI,NO',
            'examinacionPostura.cervical_C4_C5_pivot' => 'required|in:Hiperlordosis,Normal,Rectificado',
            'examinacionPostura.dorsal_D8_pivot' => 'required|in:Lordotico,Normal,Cifotico',
            'examinacionPostura.lumbar_L3_pivot' => 'required|in:Hiperlordosis,Normal,Rectificado',
            'examinacionPostura.raquis_escoliotico_pivot' => 'required|in:SI,NO',
            'examinacionPostura.raquis_rectificado_pivot' => 'required|in:SI,NO',
            'examinacionPostura.raquis_cifolordotico_pivot' => 'required|in:SI,NO',
        ]);
        return $validated;
    }
}
