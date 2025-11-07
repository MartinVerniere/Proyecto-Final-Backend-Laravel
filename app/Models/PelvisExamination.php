<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class PelvisExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'eias',
        'eips',
        'relacion',
        'rotacion',
		'keypoints',
		'imagen'
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination(){
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionPelvis($request){
        $examination = new PelvisExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->eias = $request->input('eias');
        $examination->eips = $request->input('eips');
        $examination->relacion = $request->input('relacion');
        $examination->rotacion = $request->input('rotacion');
		$examination->keypoints = $request->input('keypoints');

		$imagen = $request->file('imagen');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'.Str::slug($request->input('id_examinacion_postura')).'_pelvis.'.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/pelvis/imagenes',$nombre_archivo);
		$examination->imagen = $result->getSecurePath();

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionPelvis($request) {
        $examination = $request->ExaminacionPelvis;
        $examinationElem = PelvisExamination::find($id);
        $examinationElem->delete();
    }
}
