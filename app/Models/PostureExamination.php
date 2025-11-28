<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\KneeExamination;
use App\Models\PivotExamination;

class PostureExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'fecha_realizacion',
        'observaciones',
		'imagen_frontal',
		'imagen_lateral_derecha',
		'imagen_lateral_izquierda',
		'imagen_trasera',
		'keypoints_frontal',
		'keypoints_lateral_derecha',
		'keypoints_lateral_izquierda',
		'keypoints_trasera',
    ];

    public function consultation() {
        return $this->belongsTo(Consultation::class, 'id_consulta');
    }

    public function analisisCabeza() {
        return $this->hasOne(HeadExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisHombrosEscapular() {
        return $this->hasOne(ShouldersExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisPelvis() {
        return $this->hasOne(PelvisExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisRodilla() {
        return $this->hasOne(KneeExamination::class, 'id_examinacion_postura', 'id');
    }

    public function analisisPivot() {
        return $this->hasOne(PivotExamination::class, 'id_examinacion_postura', 'id');
    }

    public static function añadirExaminacionPostura($request) {
        $examination = new PostureExamination();

        $examination->id_consulta = $request->input('id_consulta');
        $examination->fecha_realizacion = $request->input('fecha_realizacion');
        $examination->observaciones = $request->input('observaciones');

		$examination->keypoints_frontal = $request->input('keypoints_frontal');
		$examination->keypoints_lateral_derecha = $request->input('keypoints_lateral_derecha');
		$examination->keypoints_lateral_izquierda = $request->input('keypoints_lateral_izquierda');
		$examination->keypoints_trasera = $request->input('keypoints_trasera');

		// Imagen frontal
		$imagen = $request->file('imagen_frontal');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'
			.Str::slug($request->input('id_examinacion_postura'))
			.'_frontal.'
			.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/frontal/imagenes',$nombre_archivo);
		$examination->imagen_frontal = $result->getSecurePath();

		// Imagen lateral derecha
		$imagen = $request->file('imagen_lateral_derecha');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'
			.Str::slug($request->input('id_examinacion_postura'))
			.'_lateral_derecha.'
			.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/lateral_derecha/imagenes',$nombre_archivo);
		$examination->imagen_lateral_derecha = $result->getSecurePath();

		// Imagen lateral izquierda
		$imagen = $request->file('imagen_lateral_izquierda');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'
			.Str::slug($request->input('id_examinacion_postura'))
			.'_lateral_izquierda.'
			.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/lateral_izquierda/imagenes',$nombre_archivo);
		$examination->imagen_lateral_izquierda = $result->getSecurePath();

		// Imagen trasera
		$imagen = $request->file('imagen_trasera');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'
			.Str::slug($request->input('id_examinacion_postura'))
			.'_trasera.'
			.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/trasera/imagenes',$nombre_archivo);
		$examination->imagen_trasera = $result->getSecurePath();

        $examination->save();

        return $examination->id;
    }

    public function quitarExaminacionPostura($request) {
        $examination = $request->ExaminacionPostura;
        $examinationElem = PostureExamination::find($id);
        $examinationElem->delete();
    }

}
