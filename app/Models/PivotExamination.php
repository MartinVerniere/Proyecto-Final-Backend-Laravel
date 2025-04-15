<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;

class PivotExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'cervical_C4_C5',
        'dorsal_D8',
        'lumbar_L3',
        'raquis_escoliotico',
        'raquis_rectificado',
        'raquis_cifolordotico',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public function añadirExaminacionPivot($request) {
        $examination = new PivotExamination;

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->cervical_C4_C5 = $request->input('cervical_C4_C5');
        $examination->dorsal_D8 = $request->input('dorsal_D8');
        $examination->lumbar_L3 = $request->input('lumbar_L3');
        $examination->raquis_escoliotico = $request->input('raquis_escoliotico');
        $examination->raquis_rectificado = $request->input('raquis_rectificado');
        $examination->raquis_cifolordotico = $request->input('raquis_cifolordotico');

        $examination->save();
    }

    public function eliminarExaminacionPivot($request) {
        $examination = $request->ExaminacionPivot;
        $examination = PivotExamination::find($id);
        $examination->delete();
    }
}
