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
        'cervical',
        'dorsal',
        'lumbar',
        'raquis',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionPivot($request) {
        $examination = new PivotExamination;

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->cervical = $request->input('cervical');
        $examination->dorsal = $request->input('dorsal');
        $examination->lumbar = $request->input('lumbar');
        $examination->raquis = $request->input('raquis');

        $examination->save();

        return $examination->id;
    }

	public static function actualizarExaminacionPivot($request, $id) {
        $examination = PivotExamination::find($id);

        $examination->cervical = $request->input('cervical');
        $examination->dorsal = $request->input('dorsal');
        $examination->lumbar = $request->input('lumbar');
        $examination->raquis = $request->input('raquis');

        $examination->save();

        return $examination->id;
    }

    public static function eliminarExaminacionPivot($id) {
        $examination = PivotExamination::find($id);
        $examination->delete();
    }
}
