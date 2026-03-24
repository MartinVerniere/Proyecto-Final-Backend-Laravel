<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;

class HeadExamination extends Model
{
    use HasFactory;

    protected $fillable= [
        'id_examinacion_postura',
        'plano',
        'inclinacion',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionCabeza($request) {
        $examination = new HeadExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->plano = $request->input('plano');
        $examination->inclinacion = $request->input('inclinacion');

		$examination->save();

        return $examination->id;
    }

	public static function actualizarExaminacionCabeza($request, $id) {
        $examination = HeadExamination::find($id);

        $examination->plano = $request->input('plano');
        $examination->inclinacion = $request->input('inclinacion');

		$examination->save();

        return $examination->id;
    }
}
