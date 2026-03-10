<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Http\Resources\AnthropogenicalExaminationResource;
use App\Models\AnthropogenicalExamination;

class AnthropogenicalExaminationAPIController extends Controller {

    public function showAnthropogenicalExamination($id){
        return new AnthropogenicalExaminationResource(AnthropogenicalExamination::find($id));
    }

    public function storeAnthropogenicalExamination(Request $request){
        $validated = $this->validateNuevaExaminacionAntropogenica($request);
        if ($validated) {
            $consulta_asociada = Consultation::findorfail($request->id_consulta);
            if (!$consulta_asociada->anthropogenicalExamination){
                AnthropogenicalExamination::añadirExaminacionAntropogenica($request);
                return response()->json(['message' => 'Examen antropogenico creado correctamente'], 200);
            }
            return response()->json(['error' => 'La consulta ya tenia una examinacion antropogenica asociada']);
        }
        else return response()->json(['error' => $validated], 400);
    }

    private function validateNuevaExaminacionAntropogenica(Request $request){
        $validated = $request->validate([
            'id_consulta' => 'required|exists:consultations,id',
            'fecha_realizacion' => 'required|date',
            'talla_paciente' => 'required|numeric',
			'talla_paciente_sentado' => 'required|numeric',
            'peso_paciente' => 'required|numeric',
			'presion_arterial_paciente' => 'required|numeric',
            'longitud_pierna' => 'required|numeric',
			'nivel_de_actividad' => 'required|numeric',
			'valor_EER' => 'required|numeric',
			'tasa_metabolica_basal' => 'required|numeric',
			'gasto_energetico_total_estimado' => 'required|numeric',
            'talla_padre' => 'required|numeric',
            'talla_madre' => 'required|numeric',
            'talla_adulta' => 'required|numeric',
            'talla_objetiva_genetica' => 'required|numeric',
            'talla_falta_crecer' => 'required|numeric',
            'valor_IRMI' => 'required|numeric', 
            'categoria_IRMI' => 'required|in:0,1,2',
            'valor_indice_cormico' => 'required|numeric',
            'categoria_indice_cormico' => 'required|in:Corto,Medio,Largo',
            'valor_indice_masa_corporal' => 'required|numeric',
            'categoria_indice_masa_corporal' => 'required|in:Peso insuficiente,Normopeso,Sobrepeso tipo I,Sobrepeso tipo II,Obesidad tipo I,Obesidad tipo II,Obesidad tipo III',
            'estadio_tanner' => 'required|in:I,II,III,IV,V',
            'valor_indice_madurativo' => 'required|numeric',
            'valor_edad_PHV' => 'required|numeric',
            'categoria_edad_PHV' => 'required|in:Temprano,Normal,Tardio',
        ]);
        return $validated;
    }   
}