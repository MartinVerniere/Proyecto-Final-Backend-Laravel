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
        'recurbatum',
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionRodilla($request) {
        $examination = new KneeExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->genu = $request->input('genu');
		$examination->recurbatum = $request->input('recurbatum');

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionRodilla($request) {
        $examination = $request->ExaminacionRodilla;
        $examinationElem = KneeExamination::find($id);
        $examinationElem->delete();
    }
}
