<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;

class KneeExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'genu',
        'recurvatum',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionRodilla($request) {
        $examination = new KneeExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->genu = $request->input('genu');
		$examination->recurvatum = $request->input('recurvatum');

        $examination->save();

        return $examination->id;
    }

    public static function actualizarExaminacionRodilla($request, $id) {
        $examination = KneeExamination::find($id);

        $examination->genu = $request->input('genu');
		$examination->recurvatum = $request->input('recurvatum');

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionRodilla($id) {
        $examinationElem = KneeExamination::find($id);
        $examinationElem->delete();
    }
}
