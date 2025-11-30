<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;

class ShouldersExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'inclinacion',
        'escapula',
        'hombro',
        //'triangulo_de_talle',
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionHombrosEscapular($request) {
        $examination = new ShouldersExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->inclinacion = $request->input('inclinacion');
        $examination->escapula = $request->input('escapula');
        $examination->hombro = $request->input('hombro');
        //$examination->triangulo_de_talle = $request->input('triangulo_de_talle');

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionHombrosEscapular($request) {
        $examination = $request->ExaminacionHombrosEscapular;
        $examinationElem = ShouldersExamination::find($id);
        $examinationElem->delete();
    }
}
